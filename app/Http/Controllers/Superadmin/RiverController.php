<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\River;
class RiverController extends Controller
{
    public $item_per_page = 30;  

    public function index(Request $request)
    {
    	$data['rivers'] = River::paginate($this->item_per_page);
        $data['page'] = $request->page;
        $data['item'] = $this->item_per_page;
        if($request->ajax()){
            return view('superadmin.include.river-table',$data);
        }
    	return view('superadmin.river.index',$data);
    }
    public function getRiverById(Request $request){
    	$river = River::find($request->id);
    	return view('superadmin.river.edit-river',compact('river'))->render();
    }
    public function updateRiver(Request $request)
    {
    	$river = River::find($request->id);
    	$river->name = $request->name;
    	$river->slug = $request->slug;
    	$river->seo_title = $request->seo_title;
    	$river->seo_tag = $request->seo_tag;
    	$river->seo_keyword = $request->seo_keyword;
    	$river->seo_description = $request->seo_description;
    	$river->save();
    }
}
