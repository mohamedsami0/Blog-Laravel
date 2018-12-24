<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use  App\tag;
use App\Post;

class search_controller extends Controller
{

	public function searchQueary(){

		$tags = Tag::all();

		$q = Input::get ( 'q' );

		if($q != ''){

	    	$post = Post::where('title','LIKE','%'.$q.'%')->orWhere('body','LIKE','%'.$q.'%')->get();


		   if(count($post) > 0){

		    return view('search', compact('tags'))->withDetails($post)->withQuery ( $q );
		    		
		    }else return redirect()->back()->with( 'error' , 'No Details found. Try to search again !');
				
	
}else{

	return redirect()->back()->with('error', 'search field can not be empty !');
}
}
}
