<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntertainmentController extends Controller
{
    public function entertainmentForm()
    {
    	return view('vendor.entertainment-form');
    }
    public function saveEentertainmentForm(Request $request)
    {
    	// add environment post data
    }
}
