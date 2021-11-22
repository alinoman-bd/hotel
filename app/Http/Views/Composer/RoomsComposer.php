<?php

namespace App\Http\Views\Composer;

use Illuminate\View\View;
use App\Room;

class RoomsComposer
{
    public function compose(View $view)
    {
        $rooms = Room::orderBy('id', 'desc')->with('images','resource','bedType')->get();
        //dd($rooms->toArray());
        $view->with('rooms', $rooms);
    }
}
