<?php

namespace App\Http\Views\Composer;

use App\Cart;
use App\Room;
use App\About;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\View\View;

class BookedComposer
{
    public function compose(View $view)
    {
        $timezone = $this->getLocalTime();
        $now = Carbon::now()->timezone($timezone);
        $today = $now->format('Y-m-d');
        $booked = $this->getBookedDates($today);

        // dd($formated_calendar);
        $view->with('booked', $booked);
    }

    public function getBookedDates($today)
    {
        $carts = Cart::where(function ($q) use ($today) {
            $q->where('arival_date', '>=', $today)
                ->orWhere('depature_date', '>=', $today);
        })
            ->with('room')
            ->get();
        if ($carts) {
            return $this->addBookedDates($today, $carts);
        }
        return [];
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
                                        Carbon::parse($cart->arival_date)->addDay()->lte($tmp) &&
                                        Carbon::parse($cart->depature_date)->subDay()->gte($tmp) &&
                                        $room == $cart->room_id
                                    ) {
                                        $count += $cart->number_of_room;
                                    }
                                }
                            }
                        } else {
                            foreach ($carts as $cart) {
                                if (
                                    Carbon::parse($cart->arival_date)->addDay()->lte($tmp) &&
                                    Carbon::parse($cart->depature_date)->subDay()->gte($tmp) &&
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
}
