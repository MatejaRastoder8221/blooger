<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function like(Post $post)
    {
        $likeUser=auth()->user();

        $likeUser->likes()->attach($post);

        return redirect()->back()->withInput();
    }
    public function unlike(Post $post)
    {
        $likeUser=auth()->user();

        $likeUser->likes()->detach($post);

        return redirect()->back()->withInput();
    }
}
