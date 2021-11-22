<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class ImagesController extends Controller
{
    public function storeCropperTempImg(Request $request)
    {
        // return $request->file('avatar')->getClientOriginalExtension();
        if (!Session::has('dir')) {
            Session::put('dir', time());
        }
        $dir =  Session::get('dir');
        $file = $request->file('avatar');
        $file_name = time() . '_' . $request->type . '.jpg';
        $path = 'temp_image/' . $dir . "/";
        $imgpath = 'public/' . $path . $file_name;
        $file->move('public/temp_image/' . $dir, $file_name);
        Session::put($request->session_name, $imgpath);
        return url($path . $file_name);
    }
}
