<?php

namespace App;

use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    //use Slugable;
    protected $filable = ['name','slug','seo_title'];

    public function city()
    {
       return $this->belongsToMany(City::class);
    }

    public function lakes()
    {
        return $this->hasMany(Lake::class);
    }

    public function rivers()
    {
        return $this->hasMany(River::class);
    }
}
