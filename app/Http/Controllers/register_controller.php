<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class register_controller extends Controller
{
    public function showRegisterPage(){

    	return view('register');
    }

    public function storeUsers(Request $request){

		$request->validate([

			'name' 	=>	'required',
			'email'		=>	'required',
			'password'		=>	'required',

		]);
		
		$user = new User;
    	$user->name 		= 	$request->name;
    	$user->email 		= 	$request->email;
    	$user->password 	= 	bcrypt($request->password);
		$user->save();
		
		// User Role
		$user->roles()->attach(Role::where('name', 'user')->first());

    	// Login
    	auth()->login($user);
    	// Return
    	return redirect('/posts')->with('success', 'you have been registered successfully!');
    }
}
