<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function storeCropperTempImg(Request $request)
    {
        // return $request->file('avatar')->getClientOriginalExtension();
        if (!$request->session()->has('dir')) {
            $request->session()->put('dir', time());
        }
        $dir =  $request->session()->get('dir');
        $file = $request->file('avatar');
        $file_name = time() . '_' . $request->type . '.jpg';
        $path = 'temp_image/' . $dir . "/";
        $imgpath = 'public/' . $path . $file_name;
        $file->move('public/temp_image/' . $dir, $file_name);
        $request->session()->put($request->session_name, $imgpath);
        return url($path . $file_name);
    }
}
