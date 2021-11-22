<?php

namespace App\Http\Views\Composer;

use Illuminate\View\View;
use App\Attraction;
class AttractionComposer
{
	public function compose(View $view)
	{
		$view->with('attractions', Attraction::orderBy('id', 'desc')->with('images')->get());
	}

}
