<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ValidatedInput;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Community.AddCommunity');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->validated();
        // $data['user_id'] = Auth::id();
        // Community::create($data);
        // Log::debug("masuk sini");


        $request->validate([
            'community_name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'city' => 'required',
        ]);

        // $data = $request->safe()->only(['community_name', 'description', 'category', 'city']);

        //$data = new Community;

        Community::create([
            'community_name' => $request->community_name, 
            'description' => $request->description,
            'category' => $request -> category,
            'city'=> $request -> city,  
        ]);

        // $data->community_name = $request->community_name;
        // $data->description = $request->description;
        // $data->category = $request->category;
        // $data->city = $request->city;

        //$data->save();

        // $table->string('community_name');
        // $table->string('category');
        // $table->integer('members');
        // $table->integer('creator_id');
        // $table->text('description');
        // $table->string('city');
        // $table->date('date_created');

        // Community::create([
        //     'id' => Auth::id(),
        //     'name' => 
        // ]);

        return view('Home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
