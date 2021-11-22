<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
	protected $fillable = ['title', 'description','is_active'];

	public function images()
	{
		return $this->morphToMany(Image::class, 'imageable');
	}
}
