<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Tag\IdArrayRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with('category', 'tags')->get();
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
        $post->load('tags');
        $categories= Category::all();
        return view('posts.edit',compact('post', 'categories'));

    }
    public function update(Post $post, StoreRequest $request, IdArrayRequest $tagsRequest): RedirectResponse
    {
        $post->update($request->validated());
        $post->tags()->sync($tagsRequest->tags);
        return to_route('posts.index');

    }

    public function destroy(Post $post): RedirectResponse
    {
            $post->delete();

        return to_route('posts.index');
    }
    //
}
