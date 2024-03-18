<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        $follower=auth()->user();

        $follower->followings()->attach($user);

        Log::channel('admin')->info('User followed', ['follower_id' => $follower->id, 'followed_id' => $user->id]);

        return redirect()->route('users.show',$user->id)->with('success','User followed successfully!');
    }
    public function unfollow(User $user)
    {
        $follower=auth()->user();

        $follower->followings()->detach($user);

        Log::channel('admin')->info('User unfollowed', ['follower_id' => $follower->id, 'unfollowed_id' => $user->id]);

        return redirect()->route('users.show',$user->id)->with('success','User unfollowed successfully!');
    }
}
