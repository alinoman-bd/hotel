<input type="hidden" name="menu_city" id="menu_city" value="{{@$items['city']->slug}}">
<input type="hidden" name="menu_location" id="menu_location" value="{{@$items['location']->slug}}">
<input type="hidden" name="menu_city_id" id="menu_city_id" value="{{@$items['city']->id}}">
<input type="hidden" name="menu_location_id" id="menu_location_id" value="{{@$items['location']->id}}">
<input type="hidden" name="menu_lake" id="menu_lake" value="{{@$items['lake']->slug}}">
<input type="hidden" name="menu_river" id="menu_river" value="{{@$items['river']->slug}}">
<input type="hidden" name="menu_river" id="menu_type" value="{{@$items['type']->slug}}">

<div class="main-menu">
	<ul class="nav nav-pills nav-fill">
		<li class="nav-item">
			<a class="nav-link li-cnt-show" href="javascript:void(0)"><i class="fas fa-map-marker-alt"></i> 
				@if(@$items['location']->name)
					{{$items['location']->name}}
				@elseif(@$items['city']->name)
					{{$items['city']->name}}
				@else 
					 Pasirinkite vietove
				@endif	 	
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link li-cnt-show" href="javascript:void(0)"><i class="fas fa-bars"></i> 
				@if(@$items['lake']->name)
					{{$items['lake']->name}}
				@else 
					Pasirinkite EZere
				@endif
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link li-cnt-show" href="javascript:void(0)"><i class="fas fa-text-width"></i>
				@if(@$items['river']->name)
					{{$items['river']->name}}
				@else 
					Pasirinkite Upe
				@endif
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link li-cnt-show" href="javascript:void(0)"><i class="fas fa-text-width"></i>
				@if(@$items['sea']->name)
					{{$items['sea']->name}}
				@else 
					Pasirinkite Sea
				@endif
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link li-cnt-show" href="javascript:void(0)"><i class="fas fa-text-width"></i>
				@if(@$items['type']->name)
					{{$items['type']->name}}
				@else 
					Pasirinkite Type
				@endif
			</a>
		</li>

		{{-- <li class="nav-item">
			<a class="nav-link border-0 p-0" href="javascript:void(0)">
				<button class="btn search-btn ctm-btn black-btn resetFilter">Reset</button>
			</a>
		</li> --}}
	</ul>
</div>
<div class="main-menu-content">
	<div class="main-menu-content-nav main-cnt-show d-none">
		<div class="row m-0 city_location">
			{{-- put city location --}}
			@include('vendor.inc.menu.city_location')
		</div>
	</div>
	
	<div class="main-menu-content-nav main-cnt-show d-none">
		<div class="row m-0 location_lake">
			{{-- put location lake --}}
			@include('vendor.inc.menu.location_lake')
		</div>
	</div>
	<div class="main-menu-content-nav main-cnt-show d-none">
		<div class="row m-0 location_river">
			{{-- put location river --}}
			@include('vendor.inc.menu.location_river')
		</div>
	</div>
	<div class="main-menu-content-nav main-cnt-show d-none">
		<div class="row m-0">
			<div class="col-12 col-sm-6 col-md-4">
				<div class="cnt-tlt"><a href=""></a></div>
				<div class="cnt-link-all">
					@foreach ($seas as $key => $sea)
						@if($key < 14)
							<div class="cnt-link"><a href="{{route('vendors.all',['p1'=>$sea->slug])}}">{{ $sea->name }}</a></div>
						@endif	
					@endforeach
				</div>
			</div>
			<div class="col-12 col-sm-6 col-md-4">
				<div class="cnt-tlt"><a href=""></a></div>
				<div class="cnt-link-all">
					@foreach ($seas as $key => $sea)
						@if($key > 13 && $key < 28)
							<div class="cnt-link"><a href="{{route('vendors.all',['p1'=>$sea->slug])}}">{{ $sea->name }}</a></div>
						@endif	
					@endforeach
				</div>
			</div>
			<div class="col-12 col-sm-6 col-md-4">
				<div class="cnt-tlt"><a href=""></a></div>
				<div class="cnt-link-all">
					@foreach ($seas as $key => $sea)
						@if($key > 27)
							<div class="cnt-link"><a href="{{route('vendors.all',['p1'=>$sea->slug])}}">{{ $sea->name }}</a></div>
						@endif	
					@endforeach
				</div> 
			</div>
		</div>
	</div>


	<div class="main-menu-content-nav main-cnt-show d-none">
		<div class="row m-0">
			<div class="col-12 col-sm-6 col-md-4">
				<div class="cnt-tlt"><a href=""></a></div>
				<div class="cnt-link-all">
					@foreach ($types as $key => $type)
						@if($key < 5)
							<div class="cnt-link"><a href="javascript:;" onclick="mainType('{{$type->slug}}')">{{ $type->name }}</a></div>
						@endif	
					@endforeach
				</div>
			</div>
			<div class="col-12 col-sm-6 col-md-4">
				<div class="cnt-tlt"><a href=""></a></div>
				<div class="cnt-link-all">
					@foreach ($types as $key => $type)
						@if($key > 4 && $key < 10)
							<div class="cnt-link"><a href="javascript:;" onclick="mainType('{{$type->slug}}')">{{ $type->name }}</a></div>
						@endif	
					@endforeach
				</div>
			</div>
			<div class="col-12 col-sm-6 col-md-4">
				<div class="cnt-tlt"><a href=""></a></div>
				<div class="cnt-link-all">
					@foreach ($types as $key => $type)
						@if($key > 9)
							<div class="cnt-link"><a href="javascript:;" onclick="mainType('{{$type->slug}}')">{{ $type->name }}</a></div>
						@endif	
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>