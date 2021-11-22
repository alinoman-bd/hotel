<?php

namespace App;

use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use Slugable;
	protected $guarded = [];
}
