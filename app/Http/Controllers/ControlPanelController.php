<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Post;
use App\User;

class ControlPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users=User::all();
        // return view('controlpanel',['user'=>$user]);
        return view('controlpanel',compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function edit(User $user)
    {   
        $user=Auth::user();

        return view('controlpanel.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Post $post)
    {
        $validateData=$request->validate([
            'username' => 'string',
            'email' => 'string'

        ]);

        // $validateData['user_id']=Auth::user()->id;
        //$validateData['contents']=$request->contents;
        //ddd($validateData);
        $post->update($validateData);
        return redirect('/controlpanel');

    }

}
