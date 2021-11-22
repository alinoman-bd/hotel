<?php

namespace App\Http\Views\Composer\Vendor;

use Illuminate\View\View;
use App\Sea;
class SeaComposer
{
	public function compose(View $view)
	{
		$seas = Sea::all();
		$view->with('seas', $seas);
	}

}
