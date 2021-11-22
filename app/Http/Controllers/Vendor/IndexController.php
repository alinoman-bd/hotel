<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Resource;
use Helper;
use App\Room;
use App\City;
use App\Location;
use App\Lake;
use App\River;
use App\Sea;
use App\Type;
use Cookie;

class IndexController extends Controller
{
    public function index(Request $request, $p1 = null, $p2 = null)
    {
    	if($p1 == null && $p2 == null){
    		$data['vip1'] = Helper::getVip1(6);
    		$data['vip2'] = Helper::getVip2(6);
    		return view('vendor.index', $data);
    	}


    	$data['resource'] = Resource::with('recourceImage','facilities','rooms.bedType','city','location')->where('slug', $p1)->first();
    	if($data['resource']){

    		$data['viewed'] = Helper::getViewed();
	        if($data['viewed']){
	            $data['viewed'] = $data['viewed']->toArray();
	        }else{
	            $data['viewed'] = []; 
	        }
	        $data['vip1'] = Helper::sameLocationVip($data['resource'], 5, 1);
	        $data['vip2'] = Helper::sameLocationVip($data['resource'], 6, 2);
	    	return view('vendor.details',$data);
    	}
        

    	$var = [$p1,$p2];
        $items = $this->identifyVariable( $var );
        $data['resources'] = $this->searchData( $items );
        return view('vendor.search-result', $data,compact('items'));
    	
    }

    public function identifyVariable( $vars )
    {
    	$items = [];
    	foreach ($vars as $item) {
    		if($item){
	    		$city = City::where('slug',$item)->first();
	            if($city){
	                $items['city'] = $city;
	            }
	            $location = Location::where('slug',$item)->first();
	            if($location){
	                $items['location'] = $location;
	            }
	            $lake = Lake::where('slug',$item)->first();
	            if($lake){
	                $items['lake'] = $lake;
	            }
	            $river = River::where('slug',$item)->first();
	            if($river){
	                $items['river'] = $river;
	            }
	            $type = Type::where('slug',$item)->first();
	            if($type){
	                $items['type'] = $type;
	            }
	            $sea = Sea::where('slug',$item)->first();
	            if($sea){
	                $items['sea'] = $sea;
	            }
	        }
    	}
    	return $items;
    }

    public function searchData( $item )
    {
    	$city_id     = @$item['city']->id;
        $location_id = @$item['location']->id;
        $lake_id     = @$item['lake']->id;
        $rive_id     = @$item['river']->id;
        $sea_id      = @$item['sea']->id;
        $type_id     = @$item['type']->id;

        return Resource::with(['types' => function($q) use($type_id){
                $q->where('type_id',$type_id);
           	}])
            ->when($type_id, function ($q) use ($type_id) {
                return $q->WhereHas('types',function($q1) use($type_id){
                    $q1->where('type_id',$type_id);
                });
            })
            ->when($city_id != null && $sea_id == null, function ($q) use ($city_id) {
                return $q->where('city_id', $city_id);
            })
            ->when($location_id != null && $sea_id == null, function ($q) use ($location_id) {
                return $q->where('location_id', $location_id);
            })
            ->when($lake_id != null && $sea_id == null, function ($q) use ($lake_id) {
                return $q->where('lake_id', $lake_id);
            })
            ->when($rive_id != null && $sea_id == null, function ($q) use ($rive_id) {
                return $q->where('river_id', $rive_id);
            })
            ->when($sea_id != null, function ($q) use ($sea_id) {
                return $q->where('sea_id', $sea_id);
            })
            ->where('is_active', 1)
            ->orderBy('package_id','asc')
            ->paginate(30);
    }

    public function filterMenu(){
        $location_lake = view('vendor.inc.menu.location_lake')->render();
        $location_river = view('vendor.inc.menu.location_river')->render();
 
        return response()->json(['location_lake'=>$location_lake, 'location_river'=>$location_river]);
    }
 
    
    

    
}
