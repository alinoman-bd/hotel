<?php

namespace App\Http\Views\Composer;

use Illuminate\View\View;
use App\Cart;
use Carbon\Carbon;

class BookingComposer
{
	public function compose(View $view)
	{
		$carts = Cart::orderBy('arival_date', 'asc')->with('order', 'room', 'payments', 'user');
		if (request('status') == 'checkin') {
			$carts->whereDate('arival_date', Carbon::now()->format('Y-m-d'));
		}
		if (request('status') == 'checkout') {
			$carts->whereDate('depature_date', Carbon::now()->format('Y-m-d'));
		}
		$view->with('bookings', $carts->paginate(20));
	}
}
