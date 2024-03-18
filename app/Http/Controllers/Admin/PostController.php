<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
//        moze i this authorize('admin')
        if(!Gate::allows('admin')){
            abort(403);
        }

        $posts=Post::latest()->paginate(10);

        return view('admin.posts.index',['posts'=>$posts]);
    }
}
