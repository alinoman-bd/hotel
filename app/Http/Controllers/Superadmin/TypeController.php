<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    public function index()
    {
    	$data['types'] = Type::all();
    	return view('superadmin.type.index',$data);
    }
    public function getTypeById(Request $request){
    	$type = Type::find($request->id);
    	return view('superadmin.type.edit-type',compact('type'))->render();
    }
    public function updateType(Request $request)
    {

    	$type = Type::find($request->id);
    	$type->name = $request->name;
    	$type->slug = $request->slug;
    	$type->seo_title = $request->seo_title;
    	$type->seo_tag = $request->seo_tag;
    	$type->seo_keyword = $request->seo_keyword;
    	$type->seo_description = $request->seo_description;
    	$type->save();
    	$types = Type::all();
    	return view('superadmin.include.type-table',compact('types'))->render();

    }
}
