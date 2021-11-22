<?php

namespace App\Http\Views\Composer;

use App\Cart;
use Illuminate\View\View;

class ReservationComposer
{
	public function compose(View $view)
	{
		$current = Cart::with(['order', 'payments', 'room'])->where('user_id', auth()->user()->id)->get()->toArray();
		$data['current'] = $current;
		$view->with('data', $data);
	}
}
