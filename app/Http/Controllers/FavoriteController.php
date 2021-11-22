<?php

namespace App\Http\Controllers;

use Cookie;
use App\Resource;
use Illuminate\Http\Request;
use Helper;

class FavoriteController extends Controller
{
    public $time = 2147483647;
    
    public function index()
    {
    	$data['resources'] = $this->getFavorite();
        $data['vip1'] = Helper::getVip1(6);
    	return view('favorite',$data);
    }
    public function makeFavrite(Request $request)
    {
        $this->setFavorite($request->rec_id);
    }

    public function setFavorite($rec_id)
    {
        if(Cookie::has('favorite')){
            $favorite = Cookie::get('favorite');
            $favorite = json_decode($favorite);
            if(!in_array($rec_id, $favorite)){
                array_unshift($favorite , $rec_id);
                $json = json_encode($favorite);
                Cookie::queue('favorite', $json, $this->time);
            }
        }else{
            $favorite = [];
            $favorite[] = $rec_id;
            $json = json_encode($favorite);
            Cookie::queue('favorite', $json, $this->time);
        }
    }

    public function getFavorite()
    {
        $favorite = Cookie::get('favorite');
        if($favorite){
            $favorite = json_decode($favorite,true);
            return Resource::whereIn('id', $favorite)->orderByRaw("field(id,".implode(',',$favorite).")")->get();
        }else{
            return [];
        } 
    }

    public function removeIitemFormFavorite($rec_id)
    {
        $favorite = Cookie::get('favorite');
        $favorite = json_decode($favorite,true);
        $remove = array_diff($favorite, [$rec_id]);
        $json = json_encode($remove);
        Cookie::queue('favorite', $json, $this->time);
    }

    public function deleteFavrite(Request $request)
    {
        $this->removeIitemFormFavorite($request->rec_id);
        $data['resources'] = $this->getFavorite();
        return view('vendor.inc.favorite-content',$data)->render();
    }
}
