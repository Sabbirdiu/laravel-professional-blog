<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\UserController as UserUserController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('posts/', [HomeController::class, 'post'])->name('posts');
Route::get('post/{slug}', [HomeController::class, 'singlepost'])->name('post');
Route::get('categories/', [HomeController::class, 'categories'])->name('categories');

Route::get('search/',  [HomeController::class, 'search'])->name('search');


Route::middleware(['auth', 'admin','verified'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class,'index'])->name('dashboard');
    Route::resource('admin/user',UserController::class)->except(['create', 'show', 'edit', 'store']);
    Route::resource('admin/category', CategoryController::class)->except(['create', 'show', 'edit']);
    Route::resource('admin/post', PostController::class);
    Route::get('admin/profile',[UserUserController::class,'showProfile'])->name('profile');
    Route::put('admin/profile',[UserUserController::class,'updateProfile'])->name('profile.update');
    Route::put('admin/profile/password', [UserUserController::class,'changePassword'])->name('profile.password');
});
// User ////////////////////////////////////////////////////////////////////////
Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth', 'user', 'verified']], function () {
    Route::get('dashboard', [UserController::class,'index'])->name('dashboard');
    
   
});

// View Composer
// View::composer('layouts.frontend.partials.sidebar', function ($view) {
//     $categories = Category::all()->take(10);
//     $tags = Tag::all();
//     $latestpost = Post::latest()->take(3)->get();
//     return $view->with('categories', $categories)->with('latestpost', $latestpost)->with('tags', $tags);
// });
