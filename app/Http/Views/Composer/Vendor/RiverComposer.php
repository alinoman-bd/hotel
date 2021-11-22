<?php

namespace App\Http\Views\Composer\Vendor;

use Illuminate\View\View;
use App\River;
class RiverComposer
{
	public function compose(View $view)
	{
		$location_id = request('location_id');
		$query = River::query();
		if ($location_id) {
			$query->where('location_id', $location_id);
			$rivers = $query->get();
		} else {
			$rivers = collect([]);
		}
		$view->with('rivers', $rivers);
	}

}
