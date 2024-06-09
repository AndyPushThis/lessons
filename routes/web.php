<?php
use \App\Http\Controllers\Admin as Admin;
use App\Http\Controllers\Web as Web;
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
Route::get('locale', [Web\LocaleController::class, 'setLocale'])->name('locale');

Route::resource('posts', Web\PostController::class)->middleware('locale');
Route::resource('comments', Web\CommentController::class)
    ->only(['store', 'update', 'destroy'])
    ->middleware('auth');

Route::group(['prefix' => 'subscriptions', 'as' => 'subscriptions.'], function () {
    Route::post('/', [Web\SubscriptionController::class, 'store'])->name('store');
    Route::delete('/', [Web\SubscriptionController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth'], 'as' => 'admin.'], function (){
    Route::get('/',[Admin\AdminController::class, 'index'])->name('index');
    Route::resource('tags', Admin\TagController::class)->except('show');
    Route::resource('categories', Admin\CategoryController::class)->except('show');
    Route::resource('users', Admin\UserController::class)->except('show', 'store', 'create');
});
Route::get('admin',[Admin\AdminController::class, 'index'])->name('admin.index')->middleware('admin', 'auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

