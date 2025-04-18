<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blog\BlogController;
use App\Http\Controllers\admin\AdminController;

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

Route::get('/blog', [BlogController::class,'index'])->name('blog.index');

Route::get('/blog/{id}/show', [BlogController::class,'show'])->name('blog.show');

Route::get('/blog/{id}/edit', [BlogController::class,'edit'])->name('blog.edit');

Route::POST("/blog", [BlogController::class,'create'])
    ->middleware("auth")
    ->name('blog.create');



Route::get("/admin/add", [AdminController::class,'add'])
    ->middleware("auth")
    ->name('admin.add');

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
