<?php

namespace App\Http\Views\Composer\Vendor;

use Illuminate\View\View;
use App\City;
use App\Location;
class MenuComposer
{
	public function compose(View $view)
	{
		$city_id = request('city_id');
		$location_id = request('location_id');
		$menu['city_location'] = City::with('locations')->get();

		if($city_id == '' && $location_id == ''){
			$menu['location_lakes_rivers'] = Location::with('lakes','rivers')->get();
		}else{
			if($location_id)
			{
				$menu['location_lakes_rivers'] = Location::with('lakes','rivers')->where('id',$location_id)->get();
			}else if($city_id){

				$menu['location_lakes_rivers'] = Location::with('lakes','rivers')->where('city_id',$city_id)->get();
			}
			  
		}
		
		$view->with('menu', $menu);

	}

}
