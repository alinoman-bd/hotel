<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function eventForm()
    {
    	return view('vendor.event-form');
    }
    public function SasveEventForm(Request $request)
    {
    	// add event post data
    }
}
