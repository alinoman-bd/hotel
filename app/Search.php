<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    public function resources()
    {
        return $this->morphedByMany(Resource::class, 'searchable');
    }
 
    public function rooms()
    {
        return $this->morphedByMany(Video::class, 'searchable');
    }
}
