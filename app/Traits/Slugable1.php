<?php

namespace App\Traits;

use Illuminate\Support\Facades\Route;
use Str;

trait Slugable1
{
    public static function boot()
    {
        parent::boot();
        $model_name = '';
        static::saving(function ($model) {
            $i = 0;
            $model_name = get_class($model);
            $slug = Str::slug($model->name);
            $tem_slug = $slug;
            if ($model->where('slug', $slug)->exists()) {
                
                while ($model->where('slug', $tem_slug)->exists()) {
                    $i++;
                    echo $i;
                    $tem_slug = $tem_slug . '-'.$i; 
                }
            }
            
            $models = ['App\City','App\Location','App\Lake','App\River','App\Sea','App\Type'];
            foreach ($models as $m) {
                if($m == $model_name){
                    continue;
                }
                if($m::where('slug', $tem_slug)->exists()){
                    $i++;
                    echo $i;
                    $tem_slug = $tem_slug . '-'.$i; 
                }
            }
            if($i){
               $slug = $slug . '-'.$i; 
            }
            $model->slug = $slug;
        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function slugExist($model_name, $slug){
        
    }
}