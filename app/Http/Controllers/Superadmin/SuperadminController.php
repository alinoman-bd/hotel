<?php

namespace App\Http\Controllers\Superadmin;

use Auth;
use App\Package;
use App\Resource;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
	public $item_per_page = 30;

    public function index(Request $request)
    {
    	$data['resources'] = Resource::with('user','package')->orderBy('id','DESC')->paginate($this->item_per_page);
    	if($data['resources']){
    		$data['resources']->toArray();
    	}
    	$data['page'] = $request->page;
    	$data['item'] = $this->item_per_page;
    	if($request->ajax()){
        	return view('superadmin.include.resource-table',$data);
        }

    	//dd($data['resources']->toArray());
    	return view('superadmin.index',$data);
    }

    public function changeStatus(Request $request)
    {
    	$rc = Resource::find($request->rec_id);
    	$rc->is_active = $request->status;
    	$rc->save();
    }

    public function vipResource(Request $request)
    {
    	$data['resource'] = Resource::with('user','package')->where('id',$request->rec_id)->first()->toArray();
    	$data['packages'] = Package::all();

    	return view('superadmin.include.vip-modal-content',$data);
    }

    public function makeVip(Request $request)
    {
    	$rc = Resource::find($request->rec_id);
    	$rc->package_id = $request->vipId;
    	$rc->save();
    }

    public function loginAsAdmin($id)
    {

        Session::put('superadmin',Auth::user()->id);
        Auth::loginUsingId($id);
        return redirect(route('vendors.all'));
        //return redirect(route(''))
    }
}
