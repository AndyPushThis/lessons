<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    public function commentOwner(User $user, Comment $comment): bool
    {
        return $user->id === $comment->user_id;
    }
}
