<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;


// Welcome Route
Route::get('/', [SessionController::class,'index']);

// Login Route
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [SessionController::class,'login']);

// Register Route
Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [SessionController::class,'register']);

// Home Route
Route::get('/home', function () {
    return view('home');
});

// Post Route
Route::get('/create_post', function () {
    return view('createpost');
});
Route::post('/create_post', [PostController::class, 'create_post'])->name('create_post');
Route::get('/view_post', [PostController::class, 'view_post']);

// Profile Route
route::get('/profile', [ProfileController::class,'index']);

// Logout Route
route::get('/logout', [SessionController::class,'logout']);