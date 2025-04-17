<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Article;

class AdminController extends Controller
{
    public function add()
    {
        return view("admin.add-form");
    }

    public function index()
    {
        $articles = Article::orderBy("created_at","DESC")->paginate(5);
        return view("admin.index", ["articles" => $articles]);
    }
}
