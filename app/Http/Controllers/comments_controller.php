<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\comment;

class comments_controller extends Controller
{
    
    public function storeComment(Request $request ,Post $post){


        $request->validate([

            'body' => 'min:3',

        ]);

        $userid = Auth::id();
        $comment = new Comment();
        
        $comment->body          =       $request->body;
        $comment->post_id       =       $post->id;
        $comment->user_id       =       $userid;
        $comment->save();
        return back();
    }
}


/*
Comment::create([

    'body'      =>      request('body'),
    'post_id'   =>      $post->id,
    'user_id'   =>      $user,

]);
*/
