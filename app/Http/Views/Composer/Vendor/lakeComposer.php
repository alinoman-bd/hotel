<?php

namespace App\Http\Views\Composer\Vendor;

use Illuminate\View\View;
use App\Lake;
class LakeComposer
{
	public function compose(View $view)
	{
		$location_id = request('location_id');
		$query = Lake::query();
		if ($location_id) {
			$query->where('location_id', $location_id);
			$lakes = $query->get();
		} else {
			$lakes = collect([]);
		}
		$view->with('lakes', $lakes);
	}

}
