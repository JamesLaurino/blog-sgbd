<?php

namespace App\Http\Controllers\friend;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function store(Request $request) {

        $validatedData = $request->validate([
            'friend_id' => 'required|min:1',
        ]);

        Friend::create([
            'friend_id' => $validatedData['friend_id'],
            'user_id' => Auth::id()
        ]);

        return redirect()->route('blog.publicPage', Auth::id())
            ->with('success', 'Amis ajouté avec succès.');
    }

    public function destroy(Request $request) {

        $validatedData = $request->validate([
            'friend_id' => 'required|min:1',
        ]);

        $friend = Friend::where("user_id", "=", Auth::id())
            ->where("friend_id", "=", $validatedData["friend_id"]);

        $friend->delete();

        return redirect()->route('blog.publicPage', Auth::id())
            ->with('success', 'Amis désabonné avec succès.');
    }
}
