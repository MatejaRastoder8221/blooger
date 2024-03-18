<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'bio',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class)->latest();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class,'user_follower','user_id','follower_id')->withTimestamps();
    }

    public function followings()
    {
        return $this->belongsToMany(User::class,'user_follower','follower_id','user_id')->withTimestamps();
    }

    public function getImageURL()
    {
        if($this->image){
            return url('storage/'.$this->image);
        }
        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed=".$this->name;
    }

    public function follows(User $user)
    {
        return $this->followings()->where('user_id',$user->id)->exists();
    }

    public function likes()
    {
        return $this->belongsToMany(Post::class,'like_post')->withTimestamps();
    }

    public function likesPost(Post $post)
    {
        return $this->likes()->where('post_id',$post->id)->exists();
    }
}
