<?php

namespace App\Http\Views\Composer;

use Illuminate\View\View;
use App\Slide;
class SliderComposer
{
	public function compose(View $view)
	{
		$view->with('sliders', Slide::orderBy('id', 'desc')->with('images')->get());
	}

}
