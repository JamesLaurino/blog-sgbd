<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Models\Article;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view("blogs.index",["articles" => $articles]);
    }
}
