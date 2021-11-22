<?php

namespace App\Http\Views\Composer;

use Illuminate\View\View;
use App\Logo;

class LogoComposer
{
	public function compose(View $view)
	{
		$view->with('logo', Logo::orderBy('id', 'desc')->limit(1)->first());
	}
}
