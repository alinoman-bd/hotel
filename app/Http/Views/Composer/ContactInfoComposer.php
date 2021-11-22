<?php

namespace App\Http\Views\Composer;

use Illuminate\View\View;
use App\ContactInfo;
class ContactInfoComposer
{
	public function compose(View $view)
	{
		$view->with('contacts', ContactInfo::orderBy('id', 'desc')->limit(1)->first());
	}

}
