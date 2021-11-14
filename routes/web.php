<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\NewuserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::middleware(['auth', 'admin','verified'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class,'index'])->name('dashboard');
    Route::resource('admin/user', 'App\Http\Controllers\NewuserController')->except(['create', 'show', 'edit', 'store']);
    Route::resource('admin/category', 'App\Http\Controllers\Admin\CategoryController')->except(['create', 'show', 'edit']);
    Route::resource('admin/post', 'App\Http\Controllers\Admin\PostController');
});
// User ////////////////////////////////////////////////////////////////////////
Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth', 'user', 'verified']], function () {
    Route::get('dashboard', [UserController::class,'index'])->name('dashboard');
    
   
});

