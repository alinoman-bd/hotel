<div class="form-group row">
	<label class="col-sm-3 col-form-label text-left text-sm-right">Location<sup>*</sup></label>
	<div class="col-sm-9">
		<div class="ctm-select" ctm-slt-n="cat_name">
			<div class="ctm-select-txt pad-l-10">
				<span class="select-txt set-location-name" id="category">
					@if(@$resource->location->name)
						{{@$resource->location->name}}
					@else 
						Pasirinkite...
					@endif
				</span>
				<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
			</div>
			<input type="hidden" name="app_location" class="app_location" value="{{ @$resource->location->id}}">
			<div class="ctm-option-box">
				<div class="ctm-option" onclick="setDropdownValue(event,0,'app_location'); getLakes(0); getRivers(0)">Pasirinkite...</div>
				@if($locations->count())
					@foreach($locations as $location)
						<div class="ctm-option" onclick="setDropdownValue(event,{{ $location->id }},'app_location'); getLakes({{$location->id}}); getRivers({{$location->id}})"> {{ $location->name }} </div>
					@endforeach	
				@endif
				
			</div>
		</div>
	</div>
</div>