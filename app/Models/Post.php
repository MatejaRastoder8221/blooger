<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $withCount=['likes'];

    protected $fillable = [
        'content',
        'user_id',
    ];

    public function comments()
    {
        return $this->HasMany(Comment::class,'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class,'like_post')->withTimestamps();
    }
}
