<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        \request()->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->post_id = $post->id;
        $comment->content = \request()->get('content');
        $comment->save();

        Log::channel('admin')->info('User posted a comment', ['user_id' => auth()->id(), 'post_id' => $post->id, 'comment_id' => $comment->id]);

        return Redirect::back()->with('success', 'Comment posted successfully!');
    }
}
