<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    // public function index(Request $request){

    //     if($request->has('search')){
    //         $search = $request->search;
    //         $data = Community::where('community_name', 'like', '%'.$search.'%')
    //                          ->orWhere('category', 'like', '%'.$search.'%');
    //                          //->paginate(1);
    //     }else{
    //         //$data = Community::paginate(1);
    //     }
    
    //     return view('Home.blade', compact('data'));
    // }
    
    // public function index(){
        
    //     return view('community.index');
    // }

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
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        Community::create($data);

        
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

    public function search(Request $request) {

        if(request('search')) {
            $communities = Community::where('community_name', 'like', '%' .request('search') . '%')->get();
        } else {
            $communities = Community::all();
        }

        return view('/communities');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //show the searching reco
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
