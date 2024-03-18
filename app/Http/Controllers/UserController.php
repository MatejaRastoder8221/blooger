<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $posts=$user->posts()->paginate(5);
        return view('users.show',['user'=>$user,'posts'=>$posts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if(auth()->id() !== $user->id && !auth()->user()->is_admin){
            abort(404);
        }
        $posts=$user->posts()->paginate(5);
        $editing=true;
        return view('users.edit',['user'=>$user,'editing'=>$editing,'posts'=>$posts]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $validated=\request()->validate([
            'name'=>'required|min:3|max:40',
            'bio'=>'nullable|min:1|max:255',
            'image'=>'image'
        ]);

        if(\request()->has('image')){
            $imagePath=\request('image')->store('profile','public');
            $validated['image']=$imagePath;
            if($user->image !== null) Storage::disk('public')->delete($user->image);
        }

        $user->update($validated);

        Log::channel('admin')->info('User profile updated', ['user_id' => $user->id]);

        return redirect()->route('profile');
    }
    public function destroy(User $user){
        if(auth()->id() !== $user->id && !auth()->user()->is_admin){
            abort(403);
        }
        else{
            Log::channel('admin')->info('User deleted', ['user_id' => $user->id]);

            $user->delete();
            return redirect()->back();
        }

    }

    public function profile()
    {
        return $this->show(auth()->user());
    }


}
