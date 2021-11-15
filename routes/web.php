<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\UserController as UserUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');




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

