<?php

namespace App\Http\Views\Composer\Vendor;

use Illuminate\View\View;
use App\City;
class CityComposer
{
	public function compose(View $view)
	{
		$cities = City::all();
		$view->with('cities', $cities);
	}

}
