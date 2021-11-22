<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	protected $fillable = ['title', 'price', 'allowed_person', 'total_rooms', 'description', 'is_active','bed_type','total_bed','resource_id'];
	protected $appends = ['thumb'];

	const SELECTED_ROOMS = 'selected_rooms';
	const SUB_TOTAL = 'sub_total';

	public function images()
	{
		return $this->morphToMany(Image::class, 'imageable');
	}

	public function bedType()
	{
		return $this->belongsTo(BedType::class,'bed_type','id');
	}

	public function resource()
	{
		return $this->belongsTo(Resource::class,'resource_id','id');
	}

	public function getThumbAttribute()
	{
		foreach ($this->images as $image) {
			if ($image->is_main) {
				return $image->image_path;
			}
		}
	}
}
