<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Models\Article;
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

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view("blogs.show",["article" => $article]);
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
