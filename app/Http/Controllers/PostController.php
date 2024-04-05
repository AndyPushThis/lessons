<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Tag\IdArrayRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
           new Middleware('auth', except: ['index', 'show'])
        ];
    }

    public function index(): View
    {
        $posts = Post::with('category', 'tags', 'user')->get();
        return view('posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(StoreRequest $request, IdArrayRequest $tagsRequest): RedirectResponse
    {
        $post=Post::query()->create($request->validated());
        $post->tags()->attach($tagsRequest->tags);
        return to_route('posts.show', compact('post'));

    }

    public function show(Post $post): View
    {
        $post->load('category', 'tags');
        return view('posts.show',compact('post'));

    }
    public function edit(Post $post): View
    {
        Gate::authorize('postOwner', $post);
        $post->load('tags');
        $categories= Category::all();
        return view('posts.edit',compact('post', 'categories'));

    }
    public function update(Post $post, StoreRequest $request, IdArrayRequest $tagsRequest): RedirectResponse
    {
        Gate::authorize('postOwner', $post);
        $post->update($request->validated());
        $post->tags()->sync($tagsRequest->tags);
        return to_route('posts.index');

    }

    public function destroy(Post $post): RedirectResponse
    {
        Gate::authorize('postOwner', $post);
        $post->delete();

        return to_route('posts.index');
    }
    //
}
