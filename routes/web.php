<?php

use App\Http\Controllers\comment\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blog\BlogController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\user\UserController;
use \App\Http\Controllers\star\StarController;
use App\Http\Controllers\friend\FriendController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*************** BLOG ***************/

Route::get('/blog', [BlogController::class,'index'])->name('blog.index');

Route::get('/blog/{id}/show', [BlogController::class,'show'])->name('blog.show');

Route::get('/blog/{id}/edit', [BlogController::class,'edit'])->name('blog.edit');

Route::get("/blog/public/{id}/user", [BlogController::class, "publicPage"])
    ->middleware("auth")
    ->name('blog.publicPage');

Route::POST("/blog", [BlogController::class,'store'])
    ->middleware("auth")
    ->name('blog.store');

/*************** RATING ***************/

Route::POST("/rating", [StarController::class,'store'])
    ->middleware("auth")
    ->name('rating.store');

Route::PUT("/rating", [StarController::class,'update'])
    ->middleware("auth")
    ->name('rating.update');

/*************** FRIEND **************/

Route::POST("/friend", [FriendController::class, "store"])
    ->middleware("auth")
    ->name("friend.store");

Route::DELETE("/friend", [FriendController::class, "destroy"])
    ->middleware("auth")
    ->name("friend.destroy");


/*************** OTHER ***************/

Route::PUT("/user", [UserController::class,'updateAvatar'])
    ->middleware("auth")
    ->name('user.updateAvatar');

Route::POST("/comment", [CommentController::class,'create'])
    ->middleware("auth")
    ->name('comment.create');

/*************** ADMIN ******************/
Route::get("/admin/add", [AdminController::class,'create'])
    ->middleware("auth")
    ->name('admin.create');

Route::get("/admin/{id}/show", [AdminController::class,'show'])
    ->middleware("auth")
    ->name('admin.show');

Route::get("/admin/{id}/edit", [AdminController::class,'edit'])
    ->middleware("auth")
    ->name('admin.edit');

Route::put("/admin", [AdminController::class,'update'])
    ->middleware("auth")
    ->name('admin.update');

Route::get("/admin", [AdminController::class,'index'])
    ->middleware("auth")
    ->name('admin.index');

Route::delete("/admin/{id}", [AdminController::class,'destroy'])
    ->middleware("auth")
    ->name('admin.destroy');


require __DIR__.'/auth.php';
