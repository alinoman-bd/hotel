<?php

namespace App\Http\Views\Composer\Vendor;

use Illuminate\View\View;
use App\Type;
class TypeComposer
{
	public function compose(View $view)
	{
		$types = Type::all();
		$view->with('types', $types);
	}

}
