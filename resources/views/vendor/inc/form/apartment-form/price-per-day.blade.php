<div class="form-group col-md-4">
	<div class="ctm-select" ctm-slt-n="cat_name">
		<div class="ctm-select-txt pad-l-10">
			<span class="select-txt" id="category">
				@if(@$resource->priceType->name)
					{{@$resource->priceType->name}}
				@else 
					Pasirinkite...
				@endif
			</span>
			<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
		</div>
		<input type="hidden" name="app_single_price_type" class="app_single_price_type" value="{{ @$resource->price_type_id}}">
		<div class="ctm-option-box">
			<div class="ctm-option" onclick="setDropdownValue(event,0,'app_single_price_type')">Pasirinkite...</div>
			@if(count($price_types) > 0)
				@foreach ($price_types as $type)
					<div class="ctm-option" onclick="setDropdownValue(event,{{$type->id}},'app_single_price_type')">{{$type->name}}</div>
				@endforeach
			@endif
		</div>
	</div>
</div>