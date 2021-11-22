<?php

namespace App;
use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	//use Slugable;
    protected $guarded = [];

    public function resources()
    {
    	return $this->belongsToMany(Resource::class);
    }
}
