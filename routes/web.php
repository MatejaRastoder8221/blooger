<?php

//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//use app\Http\Controllers\PagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('/feed',[,'index'])->name('feed');
//
Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/feed', \App\Http\Controllers\FeedController::class)->name('feed')->middleware('auth');

Route::resource('posts', \App\Http\Controllers\PostController::class)->except(['index', 'create', 'show'])->middleware('auth');

Route::resource('posts', \App\Http\Controllers\PostController::class)->only(['show']);

//comments

Route::post('/posts/{post}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('posts.comments.store')->middleware('auth');

//register
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'store']);

//login

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'authenticate']);

Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::resource('users',\App\Http\Controllers\UserController::class)->only('edit','update','destroy')->middleware('auth');
Route::resource('users',\App\Http\Controllers\UserController::class)->only('show');

Route::get('profile',[\App\Http\Controllers\UserController::class,'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow',[\App\Http\Controllers\FollowerController::class,'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow',[\App\Http\Controllers\FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('posts/{post}/like',[\App\Http\Controllers\PostLikeController::class,'like'])->middleware('auth')->name('posts.like');
Route::post('posts/{post}/unlike',[\App\Http\Controllers\PostLikeController::class,'unlike'])->middleware('auth')->name('posts.unlike');

Route::get('/admin', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware('auth','admin')->name('admin.dashboard');
Route::get('/admin/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->middleware('auth','admin')->name('admin.users');
Route::get('/admin/posts', [\App\Http\Controllers\Admin\PostController::class, 'index'])->middleware('auth','admin')->name('admin.posts');
Route::get('/admin/comments', [\App\Http\Controllers\Admin\CommentController::class, 'index'])->middleware('auth','admin')->name('admin.comments');
Route::delete('/admin/comments/{comment}/destroy', [\App\Http\Controllers\Admin\CommentController::class, 'destroy'])->middleware('auth','admin')->name('admin.comments.destroy');

Route::get('/author', [\App\Http\Controllers\AuthorController::class, 'index'])->name('author');
Route::get('/admin/author', [\App\Http\Controllers\AuthorController::class, 'admin'])->name('admin.author');

