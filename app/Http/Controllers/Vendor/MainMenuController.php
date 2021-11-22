<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainMenuController extends Controller
{
    public function LocationLakeRiver()
    {
    	$location_lake = view('vendor.inc.menu.location_lake')->render();
		$location_river = view('vendor.inc.menu.location_river')->render();
		return response()->json(['location_lake'=>$location_lake,'location_river'=>$location_river]);
		
    }
}
