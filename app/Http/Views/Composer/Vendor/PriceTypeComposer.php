<?php

namespace App\Http\Views\Composer\Vendor;

use Illuminate\View\View;
use App\PriceType;

class PriceTypeComposer
{
	public function compose(View $view)
	{
		$price_types = PriceType::all();
		$view->with('price_types', $price_types);
	}

}
