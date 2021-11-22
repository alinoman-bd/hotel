<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lake;
class LakeController extends Controller
{
    public $item_per_page = 30;  

    public function index(Request $request)
    {
    	$data['lakes'] = Lake::paginate($this->item_per_page);
        $data['page'] = $request->page;
        $data['item'] = $this->item_per_page;
        if($request->ajax()){
            return view('superadmin.include.lake-table',$data);
        }
    	return view('superadmin.lake.index',$data);
    }
    public function getLakeById(Request $request){
    	$lake = Lake::find($request->id);
    	return view('superadmin.lake.edit-lake',compact('lake'))->render();
    }
    public function updateLake(Request $request)
    {
    	$lake = Lake::find($request->id);
    	$lake->name = $request->name;
    	$lake->slug = $request->slug;
    	$lake->seo_title = $request->seo_title;
    	$lake->seo_tag = $request->seo_tag;
    	$lake->seo_keyword = $request->seo_keyword;
    	$lake->seo_description = $request->seo_description;
    	$lake->save();
    }
}
