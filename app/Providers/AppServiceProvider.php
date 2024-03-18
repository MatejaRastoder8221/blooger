<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Define a view composer for the dashboard view
        View::composer('dashboard', function ($view) {
            // Fetch top users specifically for the dashboard view
            $topUsers = $this->getTopUsers();
            // Pass the topUsers to the dashboard view
            $view->with('topUsers', $topUsers);
        });

        // Define a view composer for other views
        View::composer('*', function ($view) {
            // Fetch top users for all views
            $topUsers = $this->getTopUsers();
            // Pass the topUsers to the view
            $view->with('topUsers', $topUsers);
        });
    }

    private function getTopUsers()
    {
        // Retrieve the currently authenticated user
        $loggedInUser = Auth::user();

        // Initialize an array to store IDs to be excluded
        $excludeIds = [];

        // If user is logged in, add their ID to the list of IDs to be excluded
        if ($loggedInUser) {
            $excludeIds[] = $loggedInUser->id;

            // Add IDs of users the logged-in user follows to the list of IDs to be excluded
            $followingsIds = $loggedInUser->followings()->pluck('id')->toArray();
            $excludeIds = array_merge($excludeIds, $followingsIds);
        }

        // Fetch top 3 users with the most posts, excluding the logged-in user and users they follow
        $topUsersQuery = User::query()
            ->whereNotIn('id', $excludeIds)
            ->orderByDesc(DB::raw('(SELECT COUNT(*) FROM posts WHERE posts.user_id = users.id)'))
            ->limit(6);

        return $topUsersQuery->get();
    }
}
