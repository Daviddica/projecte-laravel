<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Post;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        return view('profile')->with('user',$user);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function edit(User $user)
    {   
        $user=Auth::user();

        return view('profile.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
        $validateData=$request->validate([
            'username' => 'string',
            'email' => 'string'

        ]);

        // $validateData['user_id']=Auth::user()->id;
        //$validateData['contents']=$request->contents;
        //ddd($validateData);
        $user->update($validateData);
        return back();

    }

}
