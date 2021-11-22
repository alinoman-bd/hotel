<?php

namespace App\Http\Views\Composer;

use Illuminate\View\View;
use App\ContactForm;
class ContactQueryComposer
{
	public function compose(View $view)
	{
		$view->with('messages', ContactForm::orderBy('id', 'desc')->get());
	}

}
