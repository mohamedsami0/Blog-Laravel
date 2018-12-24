<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sissons_controller extends Controller
{
    public function showLoginPage(){

    	return view('login');
    }

    public function login_store(){


    	// Login
    	if(!auth()->attempt(request(['email', 'password' ]))){

    			return back()->withErrors([

    				'massage' => 'Email or Password are Not correct',
    			]);
    	}
    	

    	// Redirect
    	return redirect('/posts')->with('success', 'you have been logined successfully!');

    }

    public function logout(){

    	//Logout

    	auth()->logout();

    	// Redirect

    	return redirect('/posts');
    }

}
