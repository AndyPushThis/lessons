<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

//Route::get('/', [PostController::class, 'index'])->name('posts.index');
//Route::get('/create', [PostController::class, 'create'])->name('posts.create');
//Route::post('/store', [PostController::class, 'store'])->name('posts.store');
//Route::get('/{post}',[PostController::class, 'show'])->name('posts.show');
//Route::get('/edit/{post}',[PostController::class, 'edit'])->name('posts.edit');
//Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
//Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::redirect('/', 'posts');
Route::resource('posts', PostController::class);

