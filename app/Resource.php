<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use App\Traits\Slugable;
class Resource extends Model
{
    use Slugable;
    protected $guarded = [];

    public static function allResource()
    {
        return $resources = app( Pipeline::class )
            ->send( Resource::query() )
            ->through([
                \App\ResourceFilter\LocationId::class,
            ])
            ->thenReturn()
            ->paginate(30);
    }

    public function searches()
    {
        return $this->morphToMany(Search::class, 'searchable');
    }

    public function city()
    {
    	return $this->belongsTo(City::class);
    }
    public function location()
    {
    	return $this->belongsTo(Location::class);
    }
    public function lake()
    {
        return $this->belongsTo(Lake::class);
    }
    public function river()
    {
        return $this->belongsTo(River::class);
    }
    public function lakes()
    {
    	return $this->location()->lakes();
    }
    public function sea()
    {
        return $this->belongsTo(Sea::class);
    }

    public function types()
    {
    	return $this->belongsToMany(Type::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }
    
    public function priceType()
    {
        return $this->belongsTo(PriceType::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    

    public function rooms()
    {
        return $this->hasMany(Room::class,'resource_id','id')->orderBy('id','DESC');
    }

    public function payment()
    {
        return $this->belongsTo(PaymentType::class,'payment_type_id','id');
    }
    public function recourceImage()
    {
        return $this->hasMany(ResourceImage::class,'resource_id','id')->orderBy('id','DESC');
    }

    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }
}
