<?php

namespace App\Http\Views\Composer\Vendor;

use Illuminate\View\View;
use App\Location;
class LocationComposer
{
	public function compose(View $view)
	{
		$city_id = request('city_id');
		$query = Location::query();
		if ($city_id) {
			$query->where('city_id', $city_id);
			$locations = $query->get();
		} else {
			$locations = collect([]);
		}
		$view->with('locations', $locations);
	}

}
