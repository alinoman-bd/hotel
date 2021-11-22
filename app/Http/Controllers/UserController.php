<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\User;
use App\Resource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
        $id = Auth::user()->id;
    	$data['resources'] = Resource::where('user_id',$id)->get();
    	//dd($data['resources']->toArray());
        return view('profile', compact('data'));
    }

    public function superAdminLogout()
    {
    	$id = Session::get('superadmin');
    	Auth::loginUsingId($id);
    	Session::forget('superadmin');
        return redirect(route('superadmin'));
    }

    public function resourceStatus(Request $request)
    {
        $rc = Resource::find($request->resource);
        $rc->is_active = $request->status;
        $rc->save();
        $data['resources'] = Resource::where('user_id', auth()->user()->id)->get();
        return view('vendor.inc.profile.listing-table', compact('data'))->render();
    }
}
