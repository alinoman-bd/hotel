<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
	protected $fillable = ['fb_url', 'p_url','twit_ulr','google_url','instra_url'];
}
