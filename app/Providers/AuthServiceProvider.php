<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin',function (User $user) : bool{
           return (bool) $user->is_admin;
        });

        Gate::define('post_delete',function (User $user,Post $post) : bool{
           return ($user->is_admin || $user->id === $post->user_id);
        });

        Gate::define('post_edit',function (User $user, Post $post) : bool{
            return ($user->is_admin || $user->id === $post->user_id);
        });
    }
}
