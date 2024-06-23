<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

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

// Profile Route
route::get('/profile', [ProfileController::class,'index']);

// Logout Route
route::get('/logout', [SessionController::class,'logout']);