<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Requests\Tag\IdArrayRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


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
        $posts = Post::query()
            ->with('category', 'tags', 'user')
            ->paginate(4);
        return view('posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(StoreRequest $request, IdArrayRequest $tagsRequest): RedirectResponse
    {
        $validated = $request->validated();

        if($cover = $request->file('cover')){
            $filename= rand(111111, 999999). '.' . $cover->getClientOriginalExtension();
            Storage::putFileAs('covers', $cover, $filename);
            $validated['cover'] = 'storage/covers/' . $filename;
        }
        $post=Post::query()->create($validated);
        $post->tags()->attach($tagsRequest->tags);
        return to_route('posts.show', compact('post'));

    }

    public function show(Post $post): View
    {
        $post->load('category', 'tags', 'comments.user');
        return view('posts.show',compact('post'));

    }
    public function edit(Post $post): View
    {
        Gate::authorize('postOwner', $post);
        $post->load('tags');
        $categories= Category::all();
        return view('posts.edit',compact('post', 'categories'));

    }
    public function update(Post $post, UpdateRequest $request, IdArrayRequest $tagsRequest): RedirectResponse
    {
        Gate::authorize('postOwner', $post);

        $validated = $request->validated();

        if($cover = $request->file('cover')){
            $filename= rand(111111, 999999). '.' . $cover->getClientOriginalExtension();
            Storage::putFileAs('covers', $cover, $filename);
            $validated['cover'] = 'storage/covers/' . $filename;
        }

        $post->update($validated);
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
