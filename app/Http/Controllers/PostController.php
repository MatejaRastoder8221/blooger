<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function show(Post $post)
    {
        //dd($post->comments());
        return view('posts.show',['post'=>$post]);
    }
    public function store()
    {
        //dump(request()->get('postContent',''));

//        \request()->validate([
//            'content'=>'required|min:10|max:240'
//        ]);
//                koristeci $fillable ili $guarded ovde mozemo da radimo i mass assignment sa request()->all
//                da bi zastitili fillable polja kao sto su like od malicioznih izmena mozemo da unosimo
//                 $valiated=request()-validate([blabla]); var koji proslejuje samo validiran sadrzaj iz forme
//                 $guarded=[] izbegava sve mass assign provere !ne raditi to!

        $validated=\request()->validate([
            'content'=>'required|min:3|max:240'
        ]);

        $validated['user_id']=auth()->id();

        $post=Post::create($validated);

        Log::channel('admin')->info('Post created', ['user_id' => auth()->id(), 'post_id' => $post->id]);

        return redirect()->route('dashboard')->with('success','Post was uploaded successfully!');
    }

    //ovde je mogao da se odradi route model binding ovako
//    public function destroy(Post $id){
//        $id->delete();

    public function destroy(Request $request,Post $post){
        if(auth()->id() !== $post->user_id && !auth()->user()->is_admin){
            abort(403);
        }
        else{
            //        dump("radi");
//        $post=Post::where('id',$id)->firstOrFail();
            $post->delete();

            $referer = $request->headers->get('referer'); // Get the previous URL

            if (strpos($referer, '/admin') !== false) {
                // If the request is from admin panel
                return Redirect::back();
            } else {
                // If the request is from any other page
                Log::channel('admin')->info('Post deleted', ['user_id' => auth()->id(), 'post_id' => $post->id, 'deleted_by' => Auth::id()]);

                return redirect()->route('dashboard')->with('success','Post deleted successfully!');
            }
        }

    }

    public function edit(Post $post)
    {
//        if(auth()->id() !== $post->user_id){
//            abort(403);
//        }
        if(!Gate::allows('post_edit',$post)){
            abort(403);
        }
        $edit=true;
        return view('posts.show',['edit'=>$edit,'post'=>$post]);
    }

    public function update(Post $post)
    {
//        \request()->validate([
//            'content'=>'required|min:3|max:240'
//        ]);
//        $post->content=\request()->get('content','');
//        $post->save();
//        return redirect()->route('posts.show',$post->id)-with('success','Post edited successfully!');
        if(auth()->id() !== $post->user_id){
            abort(404);
        }
        else{
            $validated=\request()->validate([
                'content'=>'required|min:3|max:240'
            ]);
            $post->update($validated);

            Log::channel('admin')->info('Post updated', ['user_id' => auth()->id(), 'post_id' => $post->id, 'updated_by' => Auth::id()]);

            return redirect()->route('posts.show',$post->id)->with('success','Post was edited successfully!');
        }
    }
}
