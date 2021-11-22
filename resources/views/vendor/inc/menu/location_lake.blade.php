@foreach ($menu['location_lakes_rivers'] as $location)
    <div class="col-12 col-sm-6 col-md-4">
		<div class="cnt-tlt"><a href="javascript:;" onclick="mainLocation('{{$location->slug}}')">{{$location->name}}</a></div>
		<div class="cnt-link-all">
			@foreach ($location->lakes as $lake)
				<div class="cnt-link"><a href="javascript:;" onclick="locationLake('{{$location->slug}}','{{$lake->slug}}')">{{ $lake->name }}</a></div>
			@endforeach
		</div>
	</div>
@endforeach
