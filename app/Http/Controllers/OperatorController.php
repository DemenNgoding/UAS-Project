<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;

class OperatorController extends Controller
{
    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index() {
        $users = User::get();
        return view("operator", compact("users"));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    /**
      * Show the form for creating a new resource.
      *
      * @return Response
      */

    public function ban(Request $request)

    {

        $input = $request->all();

        if(!empty($input['id'])){

            $user = User::find($input['id']);

            $user->bans()->create([
                'expired_at' => '+1 month',
                'comment'=>$request->baninfo
            ]);
        }

        return redirect()->route('users.index')->with('success','Ban Successfully..');
    }
 
 
     /**
      * Show the form for creating a new resource.
      *
      * @return Response
      */
 
     public function revoke($id)
     {
         if(!empty($id)){
             $user = User::find($id);
             $user->unban();
         }
         return redirect()->route('users.index')->with('success','User Revoke Successfully.');
 
     }
}
