<?php

namespace App\Http\Views\Composer;

use App\About;
use App\Room;
use Carbon\Carbon;
use Illuminate\View\View;
use BookingHelper;

class CheckoutComposer
{
	public function compose(View $view)
	{
		$subtotal = 0;
		$booking = [];
		$session = BookingHelper::get(Room::SELECTED_ROOMS);
		// dd($session);
		if ($session) {
			foreach ($session as $book) {
				$arrive = Carbon::parse($book['arrive_date']);
				$depatrute = Carbon::parse($book['departure_date']);
				$book['days'] = $depatrute->diffInDays($arrive);
				$book['total_calc'] = $book['calculation'] . " * " . $book['days'];
				$book['total'] = (int) $book['number_of_room'] * $book['price'] *  $book['days'];
				array_push($booking, $book);
				$subtotal += (int) $book['total'];
			}
			BookingHelper::addsbtotal(Room::SUB_TOTAL, $subtotal);
		}
		$view->with(['booking' => $booking, 'subtotal' => $subtotal]);
	}
}
