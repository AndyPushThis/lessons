<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest;
use App\Http\Requests\Comment\UpdateRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(StoreRequest $request): RedirectResponse
    {
        $comment = Comment::query()->create($request->validated());
        return to_route('posts.show', ['post'=> $comment->post_id]);;
    }

    public function update(UpdateRequest $request, Comment $comment): RedirectResponse
    {
        Gate::authorize('commentOwner', $comment);
        $comment->update($request->validated());
        return to_route('posts.show', ['post'=> $comment->post_id]);;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        Gate::authorize('commentOwner', $comment);
        $comment->delete();
        return to_route('posts.show', ['post'=> $comment->post_id]);
    }
}
