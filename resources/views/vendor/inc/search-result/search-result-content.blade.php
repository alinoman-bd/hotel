@if(count($resources) > 0)
	@foreach ($resources as $resource)
		<div class="single-content">
			<div class="content-img"><img src="{{asset($resource->image)}}" alt="img"></div>
			@php
				$rcName = Helper::resourceName( $resource->name );
			@endphp
			<div class="single-content-txt">
				<div class="hotel-price"> Nuo<span>${{$resource->min_price}}</span></div>
				<div class="single-content-tlt hotel-name"><a href="{{route('vendors.all',['p1'=>$resource->slug])}}" onclick="viewedResource({{$resource->id}})"> "{{ $resource->name }}"</a></div>
				<div class="shop-name">"{{$resource->short_title}}</div>
				<div class="shop-add">{{$resource->address}}</div>
				<div class="hotel-distance">
					@if($resource->distance_from_lake)
						<span class="d-km">Ezerus Gilugis - {{$resource->distance_from_lake}}m</span> ,
					@endif
					@if($resource->distance_from_river)
						<span class="d-m">Upe Neris - {{$resource->distance_from_river}}m</span> ,
					@endif
					@if($resource->distance_from_sea)
						<span class="d-m">Sea Neris - {{$resource->distance_from_sea}}m</span> ,
					@endif	
				</div>
				<div class="hotel-contact">
					@if($resource->phone)
						<span class="contact-txt"><i class="fas fa-phone-volume"></i> {{$resource->phone}}</span> 
					@endif
					<span class="star-like">
						<span class="h-star">
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
							<i class="fas fa-star"></i>
						</span>
						<span class="h-like"><i class="fas fa-thumbs-up"></i></span>
					</span>
				</div>
			</div>
		</div>
	@endforeach
		<div class="r-pagination text-center">
			{{ $resources->appends(request()->input())->links() }}
		</div>	
@endif
