<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use BookingHelper;

class BookingController extends Controller
{
    public function store(Room $room, Request $request)
    {
        // if ($request->number_of_child > 0) {
        //     dd($request->age_of_child);
        // } else {
        //     dd($request->all());
        // }
        $room_data = $room->attributesToArray();
        $booking = $request->all();
        $data = collect(Arr::collapse([$room_data, $booking]));
        $data['arrive_date'] = $data['arival_date'];
        $data['departure_date'] = $data['depature_date'];
        BookingHelper::put(Room::SELECTED_ROOMS, $data);
        return redirect(route('checkout'));
    }

    public function clearsession()
    {
        BookingHelper::forget(Room::SELECTED_ROOMS);
    }
}
