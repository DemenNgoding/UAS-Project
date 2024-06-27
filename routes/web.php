<?php

use App\Http\Controllers\CommunityController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::middleware(['guest'])->group(function () {
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
});




Route::middleware('auth')->group(function () {
    
    // Profile Route
    route::get('/profile/{user_id}', [ProfileController::class,'show']);
    
    // Add Community Route
    route::get('/addcommunity', [CommunityController::class, 'create']);

    // Add Community Route
    route::get('/addcommunity/save/{community_id}', [CommunityController::class, 'store']);
    
    // Logout Route
    route::get('/logout', [SessionController::class,'logout']);

    // Operator Route
    Route::get('/operator', [OperatorController::class,'index'])->middleware('UserAccess:operator');
    
    // Home Route
    Route::get('/home', function () {
        return view('home');
    });

});

Route::group(['middleware'=>'Userbanned'], function(){
    // Welcome Route
    Route::get('/', [SessionController::class,'index']);    
});
