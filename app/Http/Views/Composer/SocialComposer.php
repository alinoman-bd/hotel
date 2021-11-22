<?php

namespace App\Http\Views\Composer;

use Illuminate\View\View;
use App\Social;

class SocialComposer
{
	public function compose(View $view)
	{
		$view->with('social', Social::orderBy('id', 'desc')->limit(1)->first());
	}
}
