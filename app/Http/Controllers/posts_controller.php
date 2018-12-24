<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\tag;
use App\User;
use Image;
use DB;

class posts_controller extends Controller
{
    public function homePage(){

    	$users_statistics = DB::table('users')->count();
    	$posts_statistics = DB::table('posts')->count();
    	$comments_statistics = DB::table('comments')->count();
		$posts = Post::latest()->paginate(3);
		$tags = Tag::all();

    	return view('home', compact('posts', 'tags', 'users_statistics', 'posts_statistics', 'comments_statistics'));
    }

    public function storePost(Request $request){

			
			$request->validate([

				'title' 	=>	'bail|required',
				'body'		=>	'required',

			]);
			
			$user = Auth::user();

    		$post = new Post;
    		$post->title 		= 	request('title');
    		$post->body 		=	strip_tags(request('body'));
			$post->user_id		=	$user->id;
			$post->slug         =   str_replace(' ', '-', strtoupper($post->title));


    		// Uploaud the post image if any

    		if($request->hasFile('img')){

    				$photo = $request->img;
    				$fileName = time() . '.' . $photo->getClientOriginalName();
    				$location = public_path('img/' . $fileName);
    				Image::make($photo)->resize(800, 400)->save($location);
    				$post->img = $fileName;
    		}

			$post->save();
			
			$post->tags()->sync($request->tags);
			//$post->tags()->syncWithoutDetaching($request->tags);

    		return redirect('/posts')->with('success', 'The Post Has Published Successfully!');

	}
	
	public function singlePost(Post $post){

		$users_statistics = DB::table('users')->count();
    	$posts_statistics = DB::table('posts')->count();
    	$comments_statistics = DB::table('comments')->count();
		$tags = Tag::all();
		return view('single', compact('post', 'tags', 'users_statistics', 'posts_statistics', 'comments_statistics'));
		
	}
	public function writePost(){
		$tags = Tag::all();
		return view('write', compact('tags'));
	}

		public function showEdit(Post $post){

			$tags = Tag::all();
			return view('edit', compact('post', 'tags'));
		}

		public function editPost(Request $request, $post){
			
			$request->validate([

				'title' 	=>	'required',
				'body'		=>	'required',

			]);

			$posts = Post::find($post);
			$posts->title 		= 	request('title');
			$posts->body 		= 	strip_tags(request('body'));	
			
			$posts->save();

			$posts->tags()->sync($request->tags);

		return redirect('/posts/' . $posts->id)->with('success', 'the post has been updated successfully!');
		
	}

	public function deletePost($post){

		$posts = Post::find($post);
		$posts->delete();

		return redirect('/posts')->with('error', 'The Post Has Been Deleted!');

	}

	


}