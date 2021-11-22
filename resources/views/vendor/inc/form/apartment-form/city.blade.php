<div class="form-group row">
	<label class="col-sm-3 col-form-label text-left text-sm-right">Miestas/ rajonas<sup>*</sup></label>
	<div class="col-sm-9">
		<div class="ctm-select" ctm-slt-n="cat_name">
			<div class="ctm-select-txt pad-l-10">
				<span class="select-txt" id="category">
					@if(@$resource->city->name)
						{{@$resource->city->name}}
					@else 
						Pasirinkite...
					@endif	
				</span>
				<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
			</div>
			<input type="hidden" name="app_city" class="app_city" value="{{ @$resource->city_id}}">
			<div class="ctm-option-box">
				<div class="ctm-option" onclick="setDropdownValue(event,0,'app_city'); getLocation(0)">Pasirinkite...</div>
				@if(count($cities) > 0)
					@foreach($cities as $city)
						<div class="ctm-option" onclick="setDropdownValue(event,{{ $city->id }},'app_city'); getLocation({{ $city->id }})" onchange="getLocation({{ @$resource->city_id }})"> {{ $city->name }} </div>
					@endforeach	
				@endif
				
			</div>
		</div>
	</div>
</div>