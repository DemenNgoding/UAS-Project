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

use App\Http\Controllers\EventController;

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/fetch', [EventController::class, 'fetchEvents'])->name('events.fetch');
Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');


Route::middleware('auth')->group(function () {
    
    // Profile Route
    route::get('/profile/{user_id}', [ProfileController::class,'show']);
    
    route::get('regProfile', [ProfileController::class, 'create']);

    route::post('/regProfile', [ProfileController::class, 'store']);

    // Add Community Route
    // route::get('/addcommunity', [CommunityController::class, 'create']);

    // Add Community Route
    
    // Logout Route
    route::get('/logout', [SessionController::class,'logout']);
    
    // Home Route
    Route::get('/home', function () {
        return view('home');
    });
    
});

route::get('/create_community/{user_id}', function() {
    return view('Community.CreateCommunity');
});

route::post('/create_community/{user_id}', [CommunityController::class, 'store'])->name('create_community');

// Post Route
Route::get('/create_post/{user_id}', function () {
    return view('Post.createpost');
});
Route::post('/create_post/{user_id}', [PostController::class, 'create_post'])->name('create_post');
Route::get('/view_post', [PostController::class, 'view_post']);
Route::get('/edit_post/{user_id}', [PostController::class, 'edit_post']);
Route::post('/update_post/{user_id}', [PostController::class, 'update_post']);
Route::get('/delete_post/{user_id}', [PostController::class, 'delete_post']);
Route::post('like_post/{id}', [PostController::class, 'like_post'])->name('like_post');
Route::post('unlike_post/{id}', [PostController::class, 'unlike_post'])->name('unlike_post');


// Profile Route
route::get('/profile', [ProfileController::class,'index']);

// Logout Route
route::get('/logout', [SessionController::class,'logout']);
