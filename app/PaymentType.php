<?php

namespace App;

use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
	use Slugable;
    protected $fillable = ['name','slug'];
}
