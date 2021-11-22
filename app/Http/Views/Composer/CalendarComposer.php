<?php

namespace App\Http\Views\Composer;

use App\Cart;
use App\Room;
use App\About;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\View\View;

class CalendarComposer
{
	public function compose(View $view)
	{
		if (request('room')) {
			$room_type = request('room')->id;
		} else {
			$room_type = (request()->room_type != 0) ? (int) request()->room_type : (Room::count() ? Room::orderBy('id', 'desc')->get()->first()->id : 0);
		}
		$month = request()->month;
		$year = request()->year;
		$position = request()->position;
		$calendar = $this->getMonthCalender($month, $year);

		$timezone = $this->getLocalTime();
		$now = Carbon::now()->timezone($timezone);
		$today_date = $now->format('Y-m-d');
		$first_day = $calendar['month']['start_of_month'];
		$data = [];
		for ($i = $calendar['month']['first_day']; $i <= $calendar['month']['last_day']; $i++) {
			if ($i == 1) {
				$data[] = $this->getDays($first_day);
			} else {
				$data[] = $this->getDays($first_day->addDay());
			}
		}
		$bookings = $this->getRoomBookings($data, $calendar, $room_type);

		$formated_calendar['header'] = $calendar;
		$formated_calendar['header']['position'] = $position;
		$formated_calendar['today'] = Carbon::now()->day;
		$formated_calendar['today_date'] = $today_date;
		$formated_calendar['first_booking_dates'] = $bookings['first_booking_dates'];
		$formated_calendar['data'] = $this->createCalendarFormat($bookings['data']);

		// dd($formated_calendar);
		$view->with('calendar', $formated_calendar);
	}

	public function getMonthCalender($month, $year)
	{
		$data = [];
		$date_string = "first day of $month $year";
		$date = Carbon::parse($date_string);
		$data = ['year' => $date->year];

		$data['month'] = [
			'number' => $date->month,
			'name' => $date->englishMonth,
			'start_of_month' => $date->copy()->startOfMonth(),
			'current_month' => Carbon::now()->englishMonth,
			'first_day' => $date->copy()->startOfMonth()->day,
			'last_day' => $date->copy()->endOfMonth()->day,
			'total_days' => $date->daysInMonth,
			'start_date' => $date->copy()->startOfMonth()->format('Y-m-d'),
			'end_date' => $date->copy()->endOfMonth()->format('Y-m-d')

		];
		return $data;
	}

	public function getDays(Carbon $start)
	{
		$data = [];

		$data['date'] = $start->copy()->format('Y-m-d');
		$data['day'] = $start->copy()->day;
		$data['day_of_week'] = $start->copy()->dayOfWeek;
		$data['dayname'] = $start->copy()->shortEnglishDayOfWeek;
		return $data;
	}
	public function createCalendarFormat($data)
	{
		$first_day_week = $data[0]['day_of_week'];
		for ($i = 0; $i <  $first_day_week; $i++) {
			array_unshift($data, '');
		}
		$total_days = count($data);
		$reminder = $total_days % 7;
		$days_left = 7 - $reminder;
		for ($i = 0; $i < $days_left; $i++) {
			array_push($data, '');
		}
		return $data;
	}

	public function getRoomBookings($data, $calendar, $room_type)
	{
		$carts = Cart::where(function ($q) use ($calendar) {
			$q->whereBetween('arival_date', [$calendar['month']['start_date'], $calendar['month']['end_date']])
				->orWhereBetween('depature_date', [$calendar['month']['start_date'], $calendar['month']['end_date']]);
		})
			->with(['user', 'order', 'room', 'payments'])
			->where('room_id', $room_type)
			->get();
		return $this->addBookingToCalendar($data, $carts);
	}

	public function addBookingToCalendar($data, $carts)
	{
		foreach ($data as $key => $value) {
			$booking = [];
			$first_booking_dates = [];
			$booking['count'] = 0;
			$booking['carts'] = [];
			foreach ($carts as $cart) {
				if (!in_array($cart->arival_date, $first_booking_dates)) {
					array_push($first_booking_dates, $cart->arival_date);
				}
				$date = Carbon::parse($value['date'])->between($cart->arival_date, Carbon::parse($cart->depature_date)->subDay()->format('Y-m-d'));
				if ($date) {
					$booking['count'] += $cart->number_of_room;
					if (@$booking['booked'][$cart->room_id]) {
						$booking['booked'][$cart->room_id] += $cart->number_of_room;
					} else {
						$booking['booked'][$cart->room_id] = $cart->number_of_room;
					}
					array_push($booking['carts'], $cart->toArray());
				}
			}
			$data[$key]['bookings'] = $booking;
		}
		return ['data' => $data, 'first_booking_dates' => $first_booking_dates];
	}

	function getLocalTime()
	{

		$ip = file_get_contents("http://ipecho.net/plain");
		$url = 'http://ip-api.com/json/' . $ip;
		$tz = file_get_contents($url);
		$tz = json_decode($tz, true)['timezone'];

		return $tz;
	}
}
