<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Room;
use BookingHelper;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function room()
    {
        return view('room');
    }
    public function about()
    {
        return view('aboutus');
    }
    public function contact()
    {
        return view('contactus');
    }
    public function gallery()
    {
        return view('gallery');
    }
    public function elements()
    {
        return view('elements');
    }
    public function checkout()
    {
        return view('checkout');
    }
    public function termsNCondition()
    {
        return view('terms-condition');
    }
    public function deletecheckout($room)
    {

        BookingHelper::delete(Room::SELECTED_ROOMS, $room);
        return redirect()->back();
    }
    public function roomdetails(Room $room)
    {

        $room = $room->toArray();
        $suggestions = Room::where('id', '!=', $room['id'])->inRandomOrder()->take(2)->get()->toArray();
        $related = Room::where('id', '!=', $room['id'])->inRandomOrder()->take(4)->get()->toArray();
        return view('room-details', compact(['room', 'suggestions', 'related']));
    }
    public function attractions()
    {
        return view('attractions');
    }

    public function setLanguage($language)
    {
        request()->session()->put('ln', $language);
        return redirect()->back();
    }
}
