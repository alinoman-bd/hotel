<?php

namespace App\Http\Views\Composer;

use Illuminate\View\View;
use App\Gallery;
class GalleryComposer
{
	public function compose(View $view)
	{
		$view->with('galleries', Gallery::orderBy('id', 'desc')->with('images')->get());
	}

}
