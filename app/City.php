<?php

namespace App;

use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	//use Slugable;
    protected $fillable = ['name','slug','seo_title'];


    public function locations()
    {
        return $this->hasMany(Location::class);
    }
} 
