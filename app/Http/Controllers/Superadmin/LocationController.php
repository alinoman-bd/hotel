<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;
class LocationController extends Controller
{
    public $item_per_page = 30;  

    public function index(Request $request)
    {
    	$data['locations'] = Location::paginate($this->item_per_page);
        $data['page'] = $request->page;
        $data['item'] = $this->item_per_page;
        if($request->ajax()){
            return view('superadmin.include.location-table',$data);
        }
    	return view('superadmin.location.index',$data);
    }
    public function getLocationById(Request $request){
    	$location = Location::find($request->id);
    	return view('superadmin.location.edit-location',compact('location'))->render();
    }
    public function updateLocation(Request $request)
    {

    	$location = Location::find($request->id);
    	$location->name = $request->name;
    	$location->slug = $request->slug;
    	$location->seo_title = $request->seo_title;
    	$location->seo_tag = $request->seo_tag;
    	$location->seo_keyword = $request->seo_keyword;
    	$location->seo_description = $request->seo_description;
    	$location->save();
    	$locations = Location::all();
    }
}
