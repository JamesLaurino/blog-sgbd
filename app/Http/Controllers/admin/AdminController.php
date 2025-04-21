<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function create()
    {
        return view("admin.add-form");
    }

    public function index()
    {
        $articles = Article::orderBy("created_at","DESC")->paginate(5);
        return view("admin.index", ["articles" => $articles]);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view("admin.show",["article" => $article]);
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view("admin.edit",["article" => $article]);
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $pathLink = $article->img_path;

        $article->delete();
        Storage::disk('public')->delete('uploads/' . $pathLink);

        return redirect()->route('admin.index')
            ->with('success', 'Article supprimé avec succès.');
    }

    public function update(Request $request)
    {
        if($request["img_path"]) {

            $request->validate([
                'title' => 'required|max:15',
                'body' => 'required|string|min:4',
                'img_path' => 'required|max:2048|mimes:jpg,png'
            ]);

            $fileName = $request->file('img_path')->getClientOriginalName();

            $article = Article::findOrFail($request["id"]);
            Storage::disk('public')->delete('uploads/' . $article->img_path);

            $article->update([
                'title' => $request["title"],
                'body' => $request["body"],
                'img_path' => $fileName
            ]);

            $request->file('img_path')->storeAs('uploads', $fileName, 'public');
        }
        else {

            $request->validate([
                'title' => 'required|max:15',
                'body' => 'required|string|min:4',
            ]);

            $article = Article::findOrFail($request["id"]);

            $article->update([
                'title' => $request["title"],
                'body' => $request["body"],
            ]);
        }

        return redirect()->route('admin.index')
            ->with('success', 'Article modifié avec succès.');
    }
}
