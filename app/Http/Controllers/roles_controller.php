<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class roles_controller extends Controller
{
    public function showAdmin(){

        $users = User::all();

        return view('admin', compact('users'));
    }

    public function addRole(Request $request){

        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();

        if ($request['role-user']){

            $user->roles()->attach(Role::where('name', 'user')->first());
        }
        
        if ($request['role-author']){

            $user->roles()->attach(Role::where('name', 'author')->first());
        }

        if ($request['role-admin']){

            $user->roles()->attach(Role::where('name', 'admin')->first());
        }

        return redirect()->back();

    }

    public function showAccessDenied(){

        return view('AccessDenied');
    }
}
