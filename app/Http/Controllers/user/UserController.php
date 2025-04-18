<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function updateAvatar(Request $request) {

        $user = User::findOrFail(Auth::id());
        $fileName = $request->file('img_avatar')->getClientOriginalName();

        if($user->img_avatar) {

            Storage::disk('public')->delete('uploads/' . $user->img_avatar);

            $user->update([
                'img_avatar' => $fileName
            ]);

            $request->file('img_avatar')
                ->storeAs('uploads', $fileName, 'public');

            return redirect()->route('dashboard');
        }
        else {

            $user->update([
                'img_avatar' => $fileName
            ]);

            $request->file('img_avatar')
                ->storeAs('uploads', $fileName, 'public');

            return redirect()->route('dashboard');
        }
    }
}
