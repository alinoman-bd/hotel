<?php 

namespace App\ResourceFilter;

use Closure;

class CityId extends Filter{

	protected function applyFilter( $builder )
	{
		return $builder->where($this->filterName(),request($this->filterName()));
	}
}
