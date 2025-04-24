<?php

namespace App\Http\Controllers\comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'body' => 'required|string|max:250',
        ]);

        Comment::create([
            'body' => $validatedData['body'],
            'user_id' => Auth::id(),
            'article_id' => $request["id"]
        ]);

        return redirect()->route('blog.show', $request['id'])
            ->with('success', 'Commentaire ajouté avec succès.');
    }
}
