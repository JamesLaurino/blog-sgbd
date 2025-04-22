<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Friend;
use App\Models\Star;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view("blogs.index",["articles" => $articles]);
    }

    public function publicPage($id)
    {
        $articles = Article::all()
        ->where("user_id", $id);

        $user = User::findOrFail($id);
        $authUser = Auth::id();

        $friends = Friend::where(function ($query) use ($id, $authUser) {
            $query->where('user_id', $id)
                ->where('friend_id', $authUser);
        })->orWhere(function ($query) use ($id, $authUser) {
            $query->where('user_id', $authUser)
                ->where('friend_id', $id);
        })->get();


        $myFriends = Friend::with(['user', 'friend'])
            ->where('user_id', $authUser)
            ->orWhere('friend_id', $authUser)
            ->get();


        return view("blogs.public-page",[
            "articles" => $articles,
            "user" => $user,
            "friends" => $friends,
            "myFriends" => $myFriends
        ]);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        $stars = Star::with('user')->where('article_id', $id)->get();
        $user = User::where("id", "=", $article->user_id)->first();

        return view("blogs.show",[
            "article" => $article,
            "stars" => $stars,
            "user" => $user
        ]);
    }

    public function edit($id)
    {
        $articles = Article::all();
        return view("blogs.index",["articles" => $articles]);
    }

    public function destroy($id)
    {
        $articles = Article::all();
        return view("blogs.index",["articles" => $articles]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:25',
            'body' => 'required|string|max:25',
            'img_path' => 'required|max:2048|mimes:jpg,png'
        ]);

        $fileName = $request->file('img_path')->getClientOriginalName();

        Article::create([
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
            'img_path' => $fileName,
            'user_id' => Auth::id()
        ]);


        $request->file('img_path')->storeAs('uploads', $fileName, 'public');

        return redirect()->route('blog.index')
            ->with('success', 'Article crée avec succès.');
    }
}
