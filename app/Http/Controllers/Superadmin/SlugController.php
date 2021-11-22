<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\City;
use App\Location;
use App\Lake;
use App\River;
use App\Sea;
use App\Type;
use Str;
class SlugController extends Controller
{
    public function checkSlug(Request $request)
    {
    	$current_model = $request->model;
    	$item = $request->item;
    	$id = $request->id;
    	$slug = Str::slug($item);
        $models = [
            'App\City',
            'App\Location',
            'App\Lake',
            'App\River',
            'App\Sea',
            'App\Type'
        ];
        $find = $current_model::where('slug',$slug)->where('id','!=',$id)->first();
        if($find){
            return 'exist';
        }
        $models = array_diff($models, [$current_model]);
        foreach ($models as $key => $model) {
            $find = $model::where('slug',$slug)->first();
            if($find){
                return 'exist';
            }
        }
        return $slug;
    }
}
