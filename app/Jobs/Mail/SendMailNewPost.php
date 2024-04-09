<?php

namespace App\Jobs\Mail;

namespace App\Jobs\Mail;

use App\Mail\Blog\NewPost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMailNewPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public User $reader,
        public Post $post
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //Mail::to($this->reader->email)
        Mail::to('andreymark111@gmail.com')->send(new NewPost($this->post));
        //
    }
}
