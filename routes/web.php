<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\NewuserController;
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
   
});
// User ////////////////////////////////////////////////////////////////////////
Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth', 'user', 'verified']], function () {
    Route::get('dashboard', [UserController::class,'index'])->name('dashboard');
    
   
});

