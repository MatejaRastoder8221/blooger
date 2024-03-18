<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
//        moze i this authorize('admin')
        if(!Gate::allows('admin')){
            abort(403);
        }

        $users=User::latest()->paginate(10);

        return view('admin.users.index',['users'=>$users]);
    }
}
