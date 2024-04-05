<?php
use App\Http\Controllers as Web;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Route::get('/', [PostController::class, 'index'])->name('posts.index');
//Route::get('/create', [PostController::class, 'create'])->name('posts.create');
//Route::post('/store', [PostController::class, 'store'])->name('posts.store');
//Route::get('/{post}',[PostController::class, 'show'])->name('posts.show');
//Route::get('/edit/{post}',[PostController::class, 'edit'])->name('posts.edit');
//Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
//Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::redirect('/', 'posts');
Route::resource('posts', Web\PostController::class);
Route::resource('comments', Web\CommentController::class)
    ->only(['store', 'update', 'destroy'])
    ->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

