<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
	protected $fillable = ['title', 'title_text', 'button_text', 'button_link', 'is_active'];
	
	public function images()
	{
		return $this->morphToMany(Image::class, 'imageable');
	}
}
