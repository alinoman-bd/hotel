<?php

namespace App\Http\Controllers\Vendor;

use App\Resource;
use Cookie;
use Helper;
use App\Room;
use App\City;
use App\Location;
use App\Lake;
use App\River;
use App\Sea;
use App\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Str;

class ResourceController extends Controller
{
    public $city_id;
    public $location_id;
    public $lake_id;
    public $river_id;
    public $sea_id;
    public $type_id;

    public function index(Request $request,$p1=null,$p2=null,$p3=null,$p4=null,$p5=null)
    {
  
        $var = [$p1,$p2,$p3,$p4,$p5];
        $items = $this->identifyVariable( $var );

        $city_id     = @$items['city_id'];
        $location_id = @$items['location_id'];
        $lake_id     = @$items['lake_id'];
        $rive_id     = @$items['river_id'];
        $sea_id      = @$items['sea_id'];
        $type_id     = @$items['type_id'];

        //return @$items['sea_name'];
        $data['resources'] = Resource::with(['types' => function($q) use($type_id){
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


       // dd($data['resources']->toArray());    
    	return view('vendor.search-result', $data,compact('items'));

    }

    public function identifyVariable( $data )
    {
        $all_item = [];
        foreach ($data as $key => $var) {
            $item = $var;
            if($var){
                if (strpos($var, '-') !== false) {
                    $item = str_replace("-"," ", $var);
                }
            }

            $city = City::where('name',$item)->first();
            if($city){
                $all_item['city_id'] = $city->id;
                $all_item['city_name'] = $item;
                $all_item['city_name1'] = $var;
            }
            $location = Location::where('name',$item)->first();
            if($location){
                $all_item['location_id'] = $location->id;
                $all_item['location_name'] = $item;
                $all_item['location_name1'] = $var;
            }
            $lake = Lake::where('name',$item)->where('location_id',@$all_item['location_id'])->first();
            if($lake){
                $all_item['lake_id'] = $lake->id;
                $all_item['lake_name'] = $item;
                $all_item['lake_name1'] = $var;
            }
            $river = River::where('name',$item)->where('location_id',@$all_item['location_id'])->first();
            if($river){
                $all_item['river_id'] = $river->id;
                $all_item['river_name'] = $item;
                $all_item['river_name1'] = $var;
            }
            $type = Type::where('name',$item)->first();
            if($type){
                $all_item['type_id'] = $type->id;
                $all_item['type_name'] = $item;
                $all_item['type_name1'] = $var;
            }
            $sea = Sea::where('name',$item)->first();
            if($sea){
                $all_item['sea_id'] = $sea->id;
                $all_item['sea_name'] = $item;
                $all_item['sea_name1'] = $var;
            }

        }
        
        return $all_item;

        
    }
    public function resourceDetails( $name, $id )
    {
        
    	$data['resource'] = Resource::with('recourceImage','facilities','rooms.bedType','city','location')->where('id', $id)->first();
        $data['viewed'] = Helper::getViewed();
        if($data['viewed']){
            $data['viewed'] = $data['viewed']->toArray();
        }else{
            $data['viewed'] = [];
        }
        $data['vip1'] = Helper::sameLocationVip($data['resource'], 5, 1);
        $data['vip2'] = Helper::sameLocationVip($data['resource'], 6, 2);
        //dd($data['vip1']);

    	return view('vendor.details',$data);
    }
    
    public function singleRoom(Request $request)
    {
        $room_id = $request->room_id;
        $rec_id = $request->rec_id;
        $room = Room::where('id', $room_id)->with('images','bedType')->first();
        //dd($room->toArray());
        $resource = Resource::where('id',$rec_id)->with('facilities')->first();

        //dd($resource->toArray());
        return view('vendor.inc.modal.details-room-modal',compact('room','resource'))->render();
    }

     

    public function testData()
    {
        $seas = Sea::all();
        $types = Type::all();
        $lakes = Lake::all();
        $rivers = River::all();
        $locations = Location::all();
        $cities = City::all();

        // foreach ($cities as $key => $city) {
        //     $check = City::where('slug',$city->slug)->where('id','!=',$city->id)->first();
        //     if($check){
        //         echo $city->slug;
        //     }
        // }
        // foreach ($locations as $key => $location) {
        //     $check = Location::where('slug',$location->slug)->where('id','!=',$location->id)->first();
        //     if($check){
        //         echo $location->slug;
        //     }
        // }

        // foreach ($lakes as $key => $lake) {
        //     $check = Lake::where('slug',$lake->slug)->where('id','!=',$lake->id)->first();
        //     if($check){
        //         echo $lake->slug;
        //     }
        // }

        // foreach ($rivers as $key => $river) {
        //     $check = River::where('slug',$river->slug)->where('id','!=',$river->id)->first();
        //     if($check){
        //         echo $river->id.$river->slug.'</br>';
        //     }
        // }

        //  foreach ($seas as $key => $sea) {
        //     $check = Sea::where('slug',$sea->slug)->where('id','!=',$sea->id)->first();
        //     if($check){
        //         echo $sea->id.$sea->slug.'</br>';
        //     }
        // }

        // foreach ($types as $key => $type) {
        //     $check = Type::where('slug',$type->slug)->where('id','!=',$type->id)->first();
        //     if($check){
        //         echo $type->id.$type->slug.'</br>';
        //     }
        // }



        



        //foreach ($seas as $key => $sea) {
            // $type = Type::where('name', $sea->name)->first();
            // if($type){
            //     echo 'Type ='. $type->name.' Sea = '.$sea->name;
            // }

            // $river = River::where('slug', $sea->slug)->first();
            // if($river){
            //     echo 'River ='. $river->slug.' Sea = '.$sea->id.' '.$sea->slug.'</br>';
            // }

            // $lake = Lake::where('slug', $sea->slug)->first();
            // if($lake){
            //     echo 'Lake ='. $lake->slug.' Sea = '.$sea->id .$sea->slug.'</br>';
            // }

            // $location = Location::where('slug', $sea->slug)->first();
            // if($location){
            //     echo 'Location ='. $location->slug.' Sea = '.$sea->id.$sea->slug.'</br>';
            // }

            // $city = City::where('slug', $sea->slug)->first();
            // if($city){
            //     echo 'City ='. $city->slug.' Sea = '.$sea->id.$sea->slug.'</br>';
            // }

       // }

        // foreach ($types as $key => $type) {
        //     $sea = Sea::where('name', $type->name)->first();
        //     if($sea){
        //         echo 'Sea ='. $sea->name.' Type = '.$sea->name;
        //     }

        //     $river = River::where('name', $type->name)->first();
        //     if($river){
        //         echo 'River ='. $river->name.' Type = '.$type->name.'</br>';
        //     }

        //     $lake = Lake::where('name', $type->name)->first();
        //     if($lake){
        //         echo 'Lake ='. $lake->name.' Type = '.$type->name.'</br>';
        //     }

        //     $location = Location::where('name', $type->name)->first();
        //     if($location){
        //         echo 'Location ='. $location->name.' Type = '.$type->name.'</br>';
        //     }

        //     $city = City::where('name', $type->name)->first();
        //     if($city){
        //         echo 'City ='. $city->name.' Type = '.$type->name.'</br>';
        //     }
        // }

        //foreach ($lakes as $key => $lake) {
            // $sea = Sea::where('name', $lake->name)->first();
            // if($sea){
            //     echo 'Sea ='. $sea->name.' lake = '.$lake->name;
            //     echo '</br>';
            // }


            // $river = River::where('name', $lake->name)->first();
            // if($river){
            //     echo 'River ='. $river->name.' lake = '.$lake->name.'</br>';
            //     echo '</br>';
            // }

            // $type = Type::where('name', $lake->name)->first();
            // if($type){
            //     echo 'Lake ='. $type->name.' lake = '.$lake->name.'</br>';
            //     echo '</br>';
            // }

            // $location = Location::where('slug', $lake->slug)->first();
            // if($location){
            //     echo 'Location ='. $location->slug.' lake = '.$lake->id.' '.$lake->slug.'</br>';
            //     echo '</br>';
            // }

         //    $city = City::where('slug', $lake->slug)->first();
         //    if($city){
         //        echo 'City ='. $city->slug.' lake = '.$lake->slug.'</br>';
         //        echo '</br>';
         //    }
         // }

        // foreach ($rivers as $key => $river) {
        //     $sea = Sea::where('name', $river->name)->first();
        //     if($sea){
        //         echo 'Sea ='. $sea->name.' river = '.$river->name;
        //         echo '</br>';
        //     }


        //     $lake = Lake::where('slug', $river->slug)->first();
        //     if($lake){
        //         echo 'lake ='. $lake->slug.' river = '.$river->id.' '.$river->slug.'</br>';
        //         echo '</br>';
        //     }

        //     $type = Type::where('name', $river->name)->first();
        //     if($type){
        //         echo 'Lake ='. $type->name.' river = '.$river->name.'</br>';
        //         echo '</br>';
        //     }

        //     $location = Location::where('slug', $river->slug)->first();
        //     if($location){
        //         echo 'Location ='. $location->slug.' river = '.$river->id.$river->slug.'</br>';
        //         echo '</br>';
        //     }

        //     $city = City::where('slug', $river->slug)->first();
        //     if($city){
        //         echo 'City ='. $city->slug.' river = '.$river->slug.'</br>';
        //         echo '</br>';
        //     }
        // }

        // foreach ($locations as $key => $location) {
        //     $sea = Sea::where('name', $location->name)->first();
        //     if($sea){
        //         echo 'Sea ='. $sea->name.' location = '.$location->name;
        //         echo '</br>';
        //     }


        //     $lake = River::where('name', $location->name)->first();
        //     if($lake){
        //         echo 'lake ='. $lake->name.' location = '.$location->name.'</br>';
        //         echo '</br>';
        //     }

        //     $type = Type::where('name', $location->name)->first();
        //     if($type){
        //         echo 'Lake ='. $type->name.' location = '.$location->name.'</br>';
        //         echo '</br>';
        //     }

        //     $river = River::where('name', $location->name)->first();
        //     if($river){
        //         echo 'River ='. $river->name.' location = '.$location->name.'</br>';
        //         echo '</br>';
        //     }

        //     $city = City::where('slug', $location->slug)->first();
        //     if($city){
        //         echo 'City ='. $city->slug.' location = '.$location->id .' '.$location->slug.'</br>';
        //         echo '</br>';
        //     }
        // }

        // foreach ($cities as $key => $city) {
        //     $sea = Sea::where('name', $city->name)->first();
        //     if($sea){
        //         echo 'Sea ='. $sea->name.' city = '.$city->name;
        //         echo '</br>';
        //     }


        //     $lake = River::where('name', $city->name)->first();
        //     if($lake){
        //         echo 'lake ='. $lake->name.' city = '.$city->name.'</br>';
        //         echo '</br>';
        //     }

        //     $type = Type::where('name', $city->name)->first();
        //     if($type){
        //         echo 'Lake ='. $type->name.' city = '.$city->name.'</br>';
        //         echo '</br>';
        //     }

        //     $river = River::where('name', $city->name)->first();
        //     if($river){
        //         echo 'River ='. $river->name.' city = '.$city->name.'</br>';
        //         echo '</br>';
        //     }

        //     $location = Location::where('name', $city->name)->first();
        //     if($location){
        //         echo 'location ='. $location->name.' city = '.$city->name.'</br>';
        //         echo '</br>';
        //     }
        // }
    } 

    

}
