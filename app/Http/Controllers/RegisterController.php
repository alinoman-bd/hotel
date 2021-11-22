<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use App\User;
use Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function index()
    {
    	return view('auth.register');
    }
    public function register(Request $request)
    {
		$validator = Validator::make($request->all(), [ 
            'name' => 'required',
	        'last_name' => 'required',
	        'adderss' => 'required',
	        'phone' => 'required',
	        'email' => 'required | email | unique:users,email',
	        'password' => 'required| min:4| max:8 |confirmed',
	        'password_confirmation' => 'required| min:4'
        ]);

		if ($validator->fails()) {
	        return redirect()->back()->withErrors($validator)->withInput();
	    }

	    $user = new User;
	    $user->name = $request->name;
	    $user->surname = $request->last_name;
	    $user->email = $request->email;
	    $user->phone = $request->phone;
	    $user->password = Hash::make($request->password);
	    $user->address = $request->adderss;
	    $user->is_admin = 1;
	    $user->code = $request->code;
	    $user->pvm_code = $request->pvm_code;
	    $user->save();

	    $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            return redirect(route('vendors.all'));
        }

    }
}
