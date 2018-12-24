<?php

namespace App\Http\Controllers;

use App\tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        $tags = Tag::all();

        return view('tags.show', compact('tags'))->withTag($tag);
    }

    public function storeTag(Request $request){

        $this->validate( $request,['tag'   =>  'min:3|unique:tags']);

        $tags = new Tag();
        $tags->tag          = $request->input('tag');
        $tags->save();
        return redirect()->back()->with('success', 'your tag has been added to the tag list');

    }
}

   