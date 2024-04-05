<li class="comment" style="margin-left: {{ $margin }}px">
    <div class="comment-body">
        <div class="comment-author">
            <img alt='' src='{{ asset('images/blog/users/1.jpg') }}' width="50" height="50">
        </div>
        <cite class="fn"><a href="#">{{ $comment->user->name }}</a></cite>
        <div class="comment-meta">
            @auth
            <h6><a href="#">{{ $comment->created_at->diffForHumans() }}</a> /
                <span class='comment-reply-link' onclick="showReplyForm('{{ $comment->id }}')" style="cursor: pointer;">Reply</span>@can('commentOwner', $comment) /
                <span class='comment-reply-link' onclick="showEditForm('{{ $comment->id }}')" style="cursor: pointer;">Edit</span> /
                <span class='comment-reply-link' onclick="document.querySelector('#deleteComment-{{ $comment->id }}').submit()" style="cursor: pointer;"
                >Delete</span>@endcan
            </h6>
            @endauth
        </div>
        <p>
            {{ $comment->text }}
        </p>
    </div>
    @auth
    <form action="{{ route('comments.destroy', compact('comment')) }}"
          id="deleteComment-{{ $comment->id }}"
          method="post">

        @csrf
        @method('delete')
    </form>
    <div id="editForm-{{ $comment->id }}" class="clearafix responseForm" hidden>
        <div class="comment-reply-form clearfix">
            <form action="{{ route('comments.update', compact('comment')) }}" method="post" class="form-horizontal">
                @csrf
                @method('put')
                <div class="comment-form-comment control-group">
                    <div class="controls">
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                        <textarea id="comment" name="text" cols="50" rows="4" required aria-required="true"
                        >{{ $comment->text }}</textarea>
                    </div>
                </div>
                <div class="form-submit">
                    <div class="controls">
                        <button class="transition button" type="submit">Update</button>
                        <input type='hidden' name='comment_post_ID' value='30' id='comment_post_ID'> <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="responseForm-{{ $comment->id }}" class="clearafix responseForm" hidden>
        <div class="comment-reply-form clearfix">
            <form action="{{ route('comments.store') }}" method="post" id="commentform" class="form-horizontal" name="commentform">
                @csrf
                <div class="comment-form-comment control-group">
                    <div class="controls">
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                        <textarea id="comment" name="text" cols="50" rows="4" required aria-required="true" placeholder="Your comment here.."
                        ></textarea>
                    </div>
                </div>
                <div class="form-submit">
                    <div class="controls">
                        <button class="transition button" type="submit">Post Comment</button>
                        <input type='hidden' name='comment_post_ID' value='30' id='comment_post_ID'> <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endauth
</li>
@foreach($comment->comments as $comment)
    <x-blog.comment :$comment :$post :margin="$margin + 60" />
@endforeach
