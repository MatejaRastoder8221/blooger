<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $posts=Post::with('user','comments.user')->orderBy('created_at','DESC');


        if(\request()->has('search')){
            $posts=$posts->where('content','like','%'.\request()->get('search','').'%');
        }

        //        STAVLJENO U GLOBALNU BLADE VAR OVO SVAKAKO NIJE RADILO $topUsers=User::withCount('posts')->orderBy('created_at','DESC')->limit(3)->get();

        return view('dashboard',['posts'=>$posts->paginate(5)]);
    }
}
