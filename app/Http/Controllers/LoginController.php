<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
    	$credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            if(Auth::user()->is_admin == 1){
                return route('vendors.all');
            }else{
                return route('superadmin');
            }
            

        }else{

        	return response()->json(['error'=> 'These credentials do not match our records']);
        }
    }
}
