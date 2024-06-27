<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index() {
        return view("profile");
    }

    /**
     * Show user based on their id
     */
    public function show($user_id)
    {
        $user = User::find($user_id);
        return view('Profile.ShowProfile', compact('user'));
    }
}
