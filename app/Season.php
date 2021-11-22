<?php

namespace App;
use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use Slugable;
	protected $guarded = [];
}
