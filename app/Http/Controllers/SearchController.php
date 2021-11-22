<?php

namespace App\Http\Controllers;

use Helper;
use App\Search;
use App\Resource;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        //$data['resources'] = $this->getFavorite();
        $val = $request->q;
        $data['searches'] = Search::where('title','like','%'.$val.'%')->orWhere('short_title','like','%'.$val.'%')->with(['resources.city', 'resources.location'])->paginate(30);

        //dd($data['searches']->toArray());
        $data['vip1'] = Helper::getVip1(6);
        $data['main_search'] = $request->q;
        return view('vendor.search', $data);
         
    }

    public function suggestion(Request $request)
    {
    	$val  = $request->val;
    	$searches = Search::where('title','like','%'.$val.'%')->orWhere('short_title','like','%'.$val.'%')->groupBy('title')->get()->pluck('title');
    	return view('vendor.inc.suggestion-content',compact('searches'));
    }
}
