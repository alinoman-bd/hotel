<?php

namespace App\Traits;

use Illuminate\Support\Facades\Route;
use Str;
 
trait Slugable
{
    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $slug = Str::slug($model->name);
            if ($model->where('slug', $slug)->exists()) {
                while ($model->where('slug', $slug)->exists()) {
                    $slug = $slug . '-';
                }
            }
            $model->slug = $slug;
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}