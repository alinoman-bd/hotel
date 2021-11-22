<?php

namespace App\Http\Views\Composer;

use App\Cart;
use App\Room;
use App\About;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\View\View;

class CalendarComposerFront
{
    public function compose(View $view)
    {
        if (request('room')) {
            $room_type = request('room')->id;
        } else {
            $room_type = (request()->room_type != 0) ?: (Room::count() ? Room::orderBy('id', 'desc')->get()->first()->id : 0);
        }

        $month = request()->month;
        $year = request()->year;
        $position = request()->position;
        $calendar = $this->getMonthCalender($month, $year);

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
        $formated_calendar['data'] = $this->createCalendarFormat($bookings);

        $timezone = $this->getLocalTime();
        $now = Carbon::now()->timezone($timezone);
        $today = $now->format('Y-m-d');
        $booked = $this->getBookedDates($today);

        // dd($formated_calendar);
        $view->with(['calendar_front' => $formated_calendar, 'booked' => $booked]);
    }

    public function getBookedDates($today)
    {
        $carts = Cart::where(function ($q) use ($today) {
            $q->where('arival_date', '>=', $today)
                ->orWhere('depature_date', '>=', $today);
        })
            ->with('room')
            ->get();
        return $this->addBookedDates($today, $carts);
    }

    public function addBookedDates($today, $carts)
    {
        $rooms = collect($carts->pluck('room_id'))->unique()->toArray();
        $room_capacity = [];
        $unique_room = $carts->unique('room_id');
        foreach ($unique_room as $cart) {
            $room_capacity[$cart->room->id] = $cart->room->total_rooms;
        }
        $holidays = [];

        foreach ($rooms as $room) {
            foreach ($carts as $value) {
                $period = CarbonPeriod::create($value->arival_date, $value->depature_date);
                foreach ($period as $date) {
                    if ($date->gte($today)) {
                        $tmp = $date;
                        $count = 0;
                        if (array_key_exists($room, $holidays)) {
                            if (!in_array($tmp->format('Y-m-d'), $holidays[$room])) {
                                foreach ($carts as $cart) {
                                    if (
                                        Carbon::parse($cart->arival_date)->lte($tmp) &&
                                        Carbon::parse($cart->depature_date)->gt($tmp) &&
                                        $room == $cart->room_id
                                    ) {
                                        $count += $cart->number_of_room;
                                    }
                                }
                            }
                        } else {
                            foreach ($carts as $cart) {
                                if (
                                    Carbon::parse($cart->arival_date)->lte($tmp) &&
                                    Carbon::parse($cart->depature_date)->gt($tmp) &&
                                    $room == $cart->room_id
                                ) {
                                    $count += $cart->number_of_room;
                                }
                            }
                        }
                        if ($count == $room_capacity[$room]) {
                            $holidays[$room][] = $tmp->format('Y-m-d');
                        }
                    }
                }
            }
        }
        return $holidays;
    }
    function getLocalTime()
    {

        $ip = file_get_contents("http://ipecho.net/plain");
        $url = 'http://ip-api.com/json/' . $ip;
        $tz = file_get_contents($url);
        $tz = json_decode($tz, true)['timezone'];

        return $tz;
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
            $booking['count'] = 0;
            $booking['carts'] = [];
            foreach ($carts as $cart) {
                $date = Carbon::parse($value['date'])->between($cart->arival_date, $cart->depature_date);
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
        return $data;
    }
}
