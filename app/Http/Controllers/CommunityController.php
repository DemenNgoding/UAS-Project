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
    public function search(Request $request){
        if($request->has('search')){
            $search = $request->search;
            $data = Community::where('community_name', 'like', "%{$search}%")
                             ->orWhere('category', 'like', "%{$search}%")
                             ->paginate(5);
        }else{
            $data = Community::paginate(5);
        }
        return view('Home', ['community'=>$data]);
    }

    public function index(){
        
        return view('community.index');
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
        $data = new Community;

        $data['creator_id'] = Auth::id();

        $data->community_name = $request->community_name;
        $data->category = $request->category;
        $data->description = $request->description;
        $data->city = $request->city;
        $data->members = $request->members;
        $data->date_created = now();
        
        $data->save();

        return redirect()->back()->with('success', 'Community Created Successfully');
    }

    // public function search(Request $request) {

    //     if(request('search')) {
    //         $communities = Community::where('community_name', 'like', '%' .request('search') . '%')->get();
    //     } else {
    //         $communities = Community::all();
    //     }

    //     return view('/communities');
    // }

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
