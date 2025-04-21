<?php

namespace App\Http\Controllers\star;

use App\Http\Controllers\Controller;
use App\Models\Star;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StarController extends Controller
{
    public function update(Request $request)
    {
        dd($request["quantity"] . " " . $request["article_id"]);

        //todo make the update

        return redirect()->route('blog.show')
            ->with('success', 'Rating crée avec succès.');
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'quantity' => 'required|max:5',
            'article_id' => 'required|min:1',
        ]);

        Star::create([
            'quantity' => $validatedData['quantity'],
            'article_id' => $validatedData['article_id'],
            'user_id' => Auth::id()
        ]);

        return redirect()->route('blog.show', $request['article_id'])
            ->with('success', 'Rating crée avec succès.');
    }
}
