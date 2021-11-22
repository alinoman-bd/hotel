<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sea;
class SeaController extends Controller
{
    public function index()
    {
    	$data['seas'] = Sea::all();
    	return view('superadmin.sea.index',$data);
    }
    public function getSeaById(Request $request){
    	$sea = Sea::find($request->id);
    	return view('superadmin.sea.edit-sea',compact('sea'))->render();
    }
    public function updateSea(Request $request)
    {
    	$sea = Sea::find($request->id);
    	$sea->name = $request->name;
    	$sea->slug = $request->slug;
    	$sea->seo_title = $request->seo_title;
    	$sea->seo_tag = $request->seo_tag;
    	$sea->seo_keyword = $request->seo_keyword;
    	$sea->seo_description = $request->seo_description;
    	$sea->save();
    	$seas = Sea::all();
    	return view('superadmin.include.sea-table',compact('seas'))->render();

    }
}
