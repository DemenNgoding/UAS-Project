<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mockery\Generator\StringManipulation\Pass\Pass;

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

    public function show_regist()
    {
        return view('RegisterProfile');
    }

    public function create(){
        return view('RegisterProfile');
    }

    public function store(Request $request){
        
        // $user = User::find($id);
        // $update['user_id'] = Auth::id();
        // dd($user);
        // dd($request);
        // $request->validate([
        //     'name'=>'required',
        //     'gender' => 'required',
        //     'birth_date' => 'required',
        //     'bio' => 'required',
        //     'city' => 'required',
        // ]);

        

        // $update->name = $request->name;
        // $update->gender = $request->gender;
        // $update->birth_date = $request->birth_date;
        // $update->bio = $request->bio;
        // $update->city = $request->city;

        // $update = User::find($id);

        // $update->save();

        // $request->update($request->all());

        // return redirect()->route('home')
        //     ->with('success', 'Post updated successfully.');

        $data = new User;

        $data['user_id'] = Auth::id();

        $data->bio = $request->bio;
        $data->gender = $request->gender;
        $data->birth_date = $request->birth_date;
        $data->city = $request->city;
        $data->username = $request->username;


        $data->save();

        return redirect()->back()->with('success', 'Profile Created Successfully');
    }

    public function registerProfile (Request $request) {
        $request->validate([
            "username"=>"required",
            "bio"=> "required",
            "gender"=> "required", 
            "birth_date"=> "required", 
            "city"=> "required", 
        ]);
    }
}
