<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(Request $request)
    {
    	$login_data = ['email' => $request->email, 'password' => $request->password];

    	if(Auth::attempt($login_data)) {
    		$user = Auth::user();
    		$token = $user->createToken('API TOKEN')->accessToken;


    		return controller::success($token);
    	} else {
    		return controller:: error('Email or Password is Incorrect');
    	}
    }
}
