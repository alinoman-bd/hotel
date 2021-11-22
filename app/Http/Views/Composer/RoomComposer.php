<?php

namespace App\Http\Views\Composer;

use Illuminate\View\View;
use App\Room;

class RoomComposer
{
    public function compose(View $view)
    {
        if (request('room')) {
            $room = request('room')->with('images')->get()->first();
        } else {

            if (request('room_type')) {
                $room = Room::where('id', request('room_type'))->with('images')->get()->first();
            } else {
                $room = Room::orderBy('id', 'desc')->with('images')->get()->first();
            }
        }
        $view->with('room', $room ? $room->toArray() : null);
    }
}
