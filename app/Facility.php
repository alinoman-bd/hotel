<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }
}
