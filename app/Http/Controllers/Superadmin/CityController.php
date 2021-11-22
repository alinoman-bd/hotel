<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\City;
class CityController extends Controller
{
    public function index()
    {
    	$data['cities'] = City::all();
    	return view('superadmin.city.index',$data);
    }
    public function getCityById(Request $request){
    	$city = City::find($request->id);
    	return view('superadmin.city.edit-city',compact('city'))->render();
    }
    public function updateCity(Request $request)
    {

    	$city = City::find($request->id);
    	$city->name = $request->name;
    	$city->slug = $request->slug;
    	$city->seo_title = $request->seo_title;
    	$city->seo_tag = $request->seo_tag;
    	$city->seo_keyword = $request->seo_keyword;
    	$city->seo_description = $request->seo_description;
    	$city->save();
    	$cities = City::all();
    	return view('superadmin.include.city-table',compact('cities'))->render();

    }
}
