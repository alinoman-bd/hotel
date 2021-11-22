<?php

namespace App\Http\Views\Composer;

use Illuminate\View\View;
use App\About;
class AboutComposer
{
	public function compose(View $view)
	{
		$view->with('abouts', About::orderBy('id', 'desc')->with('images')->get());
	}

}
