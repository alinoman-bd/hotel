<?php

namespace App\Http\Controllers;

use Cookie;
use App\Resource;
use Illuminate\Http\Request;

class ViewedResourceController extends Controller
{
    public $time = 2147483647;
    
    public function makeViewed(Request $request)
    {
        $this->setViewed($request->rec_id);
    }

    public function setViewed($rec_id)
    {
        if(Cookie::has('rec_viewed')){
            $rec_viewed = Cookie::get('rec_viewed');
            $rec_viewed = json_decode($rec_viewed);
            if(!in_array($rec_id, $rec_viewed)){
                array_unshift($rec_viewed , $rec_id);
                $json = json_encode($rec_viewed);
                Cookie::queue('rec_viewed', $json, $this->time);
            }
        }else{
            $rec_viewed = [];
            $rec_viewed[] = $rec_id;
            $json = json_encode($rec_viewed);
            Cookie::queue('rec_viewed', $json, $this->time);
        }
    }
}
