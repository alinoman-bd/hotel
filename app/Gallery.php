<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

	protected $fillable = ['title'];

	public function images()
	{
		return $this->morphToMany(Image::class, 'imageable');
	}
}
