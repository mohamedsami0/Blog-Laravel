<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactUs;

class contact extends Controller
{
    public function showContact(){

        return view('/contact');
    }


    public function sendMail(Request $request) {

        $request->validate([

            'name'      =>  'required',
            'email'     =>  'required',
            'body'      =>  'required|min:10'
        ]);

        $name   =    $request->input('name');
        $email  =    $request->input('email');
        $body   =    $request->input('body');

        Mail::to('mido77385@gmail.com')->send(new contactUs($name, $email, $body));
        

        return redirect('/contact')->with('success', 'your message has been sent successfully!');


    }


}
