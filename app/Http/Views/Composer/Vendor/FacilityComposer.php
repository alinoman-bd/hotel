<?php

namespace App\Http\Views\Composer\Vendor;

use Illuminate\View\View;
use App\Facility;
class FacilityComposer
{
	public function compose(View $view)
	{
		$facilities = Facility::all();
		$view->with('facilities', $facilities);
	}

}