<?php

namespace App\Http\Views\Composer;

use Illuminate\View\View;
use App\User;
class UserComposer
{
	public function compose(View $view)
	{
		$view->with('users', User::orderBy('id', 'desc')->where('is_admin',0)->get());
	}

}
