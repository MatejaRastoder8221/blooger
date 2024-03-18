<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function index()
    {
        if(!Gate::allows('admin')){
            abort(403);
        }

        $comments=Comment::latest()->paginate(10);

        return view('admin.comments.index',['comments'=>$comments]);
    }

    public function destroy(Comment $comment)
    {
        if(!Gate::allows('admin')){
            abort(403);
        }

        $comment->delete();

        Log::channel('admin')->info('Comment deleted by user', ['comment_id' => $comment->id, 'deleted_by' => Auth::id()]);

        return redirect()->back()->with('success','Comment deleted successfully!');
    }
}
