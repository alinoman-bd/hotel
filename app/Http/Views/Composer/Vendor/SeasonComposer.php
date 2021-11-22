<?php

namespace App\Http\Views\Composer\Vendor;

use Illuminate\View\View;
use App\Season;
class SeasonComposer
{
	public function compose(View $view)
	{
		$seasons = Season::all();
		$view->with('seasons', $seasons);
	}

}
