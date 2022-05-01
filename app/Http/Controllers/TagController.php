<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    
    public function store(Request $request, Tag $tag)
    {

        $tag = new Tag();
        $tag->tag = $request->get('tag');
        
        $tag->save();
        return back();

    }
}
