@foreach ($menu['city_location'] as $city)
    <div class="col-12 col-sm-6 col-md-4">
		<div class="cnt-tlt"><a href="javascript:;" onclick="mainCity('{{$city->slug}}')">{{ $city->name }}</a></div>
		<div class="cnt-link-all">
			@foreach($city->locations as $location)
				<div class="cnt-link"><a href="javascript:;" onclick="mainLocation('{{$location->slug}}')">{{ $location->name }}</a></div>
			@endforeach
		</div>
	</div>
@endforeach
