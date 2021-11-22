<?php

namespace App;
use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;

class BedType extends Model
{
	 use Slugable;
	 protected $guarded = [];
}
