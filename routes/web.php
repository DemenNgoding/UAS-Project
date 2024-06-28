<?php

use App\Http\Controllers\CommunityController;
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




Route::middleware('auth')->group(function () {
    
    // Profile Route
    route::get('/profile/{user_id}', [ProfileController::class,'show']);
    
    // route::post('/storeProfile', [ProfileController::class, 'store'])->name('profile.store');

    // route::get('/regProfile', [ProfileController::class, 'create']);


    // Add Community Route
    route::get('/addcommunity', [CommunityController::class, 'create'])->name('community.create');

    // Add Community Route
    Route::post('/addcommunity/save', [CommunityController::class, 'store'])->name('community.store');
    
    // Logout Route
    route::get('/logout', [SessionController::class,'logout']);
    
    // Home Route
    Route::get('/home', function () {
        return view('home');
    });

});

Route::get('/reg_profile', [ProfileController::class,'show_regist']);
Route::post('/reg_profile/{user_id}', [ProfileController::class, 'store'])->name('reg_profile');

// Post Route
Route::get('/create_post/{user_id}', function () {
    return view('createpost');
});
Route::post('/create_post/{user_id}', [PostController::class, 'create_post'])->name('create_post');
Route::get('/view_post', [PostController::class, 'view_post']);
Route::get('/edit_post/{user_id}', [PostController::class, 'edit_post']);
Route::post('/update_post/{user_id}', [PostController::class, 'update_post']);

// Profile Route
route::get('/profile', [ProfileController::class,'index']);

// Logout Route
route::get('/logout', [SessionController::class,'logout']);
