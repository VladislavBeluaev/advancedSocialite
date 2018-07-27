<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {	
	    	return view('users.card')->with(['user'=>
	    		
	    	User::with('web_profile')->find($user->id)
	    ]);
    }
}