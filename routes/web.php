<?php

use App\Http\Controllers\CommunityController;
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




Route::middleware('auth')->group(function () {
    
    // Profile Route
    route::get('/profile/{user_id}', [ProfileController::class,'show']);
    
    // Add Community Route
    route::get('/addcommunity', [CommunityController::class, 'store']);
    
    // Logout Route
    route::get('/logout', [SessionController::class,'logout']);
    
    // Home Route
    Route::get('/home', function () {
        return view('home');
    });
    

});
