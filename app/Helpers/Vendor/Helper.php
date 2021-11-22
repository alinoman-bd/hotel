<?php 

namespace App\Helpers\Vendor;

use Cookie;
use App\Resource;


class Helper
{
	public static function resourceName( $name )
	{
		return preg_replace('!\s+!', '-', $name);
	}

    public static function name( $name )
    {
        return preg_replace('!\s+!', '-', $name);
    }

	public static function resourceType($resource)
	{
		$types = [];
		if(count($resource->types) > 0){
			foreach ($resource->types as $key => $type) {
				$types[] = $type->id;
			}
		}
		return $types;
	} 
	public static function getViewed()
	{
		$rec_viewed = Cookie::get('rec_viewed');
        if($rec_viewed){
            $rec_viewed = json_decode($rec_viewed,true);
            return Resource::whereIn('id', $rec_viewed)->orderByRaw("field(id,".implode(',',$rec_viewed).")")->get();
        } 
	}
	public static function facilities($resource)
	{
		$facilities = [];
		if(count($resource->facilities) > 0){
			foreach ($resource->facilities as $key => $facility) {
				$facilities[] = $facility->id;
			}
		}
		return $facilities;
	}
	public static function getVip1( $limit )
    {
    	return Resource::where('is_active', 1)->where('package_id', 1)->inRandomOrder()->take($limit)->get();
    }

    public static function getVip2( $limit )
    {
    	return Resource::where('is_active', 1)->where('package_id', 2)->inRandomOrder()->take($limit)->get();
    }
    public static function sameLocationVip($resource, $limit, $pkg_id)
    {
    	$city_id = $resource->city_id;
        $location_id = $resource->location_id;
        $lake_id = $resource->lake_id;
        $rive_id = $resource->river_id;
        $sea_id = $resource->sea_id;

        $data = Resource::
            when($city_id != null && $sea_id == null, function ($q) use ($city_id) {
                return $q->where('city_id', $city_id);
            })
            ->when($location_id != null && $sea_id == null, function ($q) use ($location_id) {
                return $q->where('location_id', $location_id);
            })
            ->when($lake_id != null && $sea_id == null, function ($q) use ($lake_id) {
                return $q->where('lake_id', $lake_id);
            })
            ->when($rive_id != null && $sea_id == null, function ($q) use ($rive_id) {
                return $q->where('river_id', $rive_id);
            })
            ->when($sea_id != null, function ($q) use ($sea_id) {
                return $q->where('sea_id', $sea_id);
            })
            ->whereNotIn('id',[$resource->id])
            ->where('is_active', 1)
            ->where('package_id', $pkg_id)
            ->inRandomOrder()
            ->take($limit)
            ->get();
        return $data;    
    }

    public static function seoMeta($items)
    {
        if($items){

            $meta = [];

            if(@$items['sea']){
                $meta['title'] = @$items['sea']->seo_title.' - '.env('APP_URL');
                $meta['keyword'] = @$items['sea']->seo_keyword;
                return $meta;
            }

            $title = '';
            $keyword = '';
            $description = '';
            if(@$items['type']){
                $title .= @$items['type']->seo_title.' ';
                $keyword .= @$items['type']->seo_keyword.',';
                $keyword .= @$items['type']->seo_description.' ';
            }
            if(@$items['river']){
                $title .= @$items['river']->seo_title.' ';
                $keyword .= @$items['river']->seo_keyword.',';
                $keyword .= @$items['river']->seo_description.' ';
            }
            if(@$items['lake']){
                $title .= @$items['lake']->seo_title.' ';
                $keyword .= @$items['lake']->seo_keyword.',';
                $keyword .= @$items['lake']->seo_description.' ';
            }
            if(@$items['location']){
                $title .= @$items['location']->seo_title.' ';
                $keyword .= @$items['location']->seo_keyword.',';
                $keyword .= @$items['location']->seo_description.' ';
            }
            if(@$items['city']){
                $title .= @$items['city']->seo_title.' ';
                $keyword .= @$items['city']->seo_keyword.',';
                $keyword .= @$items['city']->seo_description.' ';
            }
            $title = $title.'- '. env('APP_URL');

            $meta['title'] = $title;
            $meta['keyword'] = $keyword;
            $meta['description'] = $description;
            return $meta;
        }
    }

    


}




