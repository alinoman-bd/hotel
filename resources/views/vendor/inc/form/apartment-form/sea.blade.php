<div class="form-group row">
	<label class="col-sm-3 col-form-label text-left text-sm-right">Sea<sup>*</sup></label>
	<div class="col-sm-9">
		<div class="ctm-select" ctm-slt-n="cat_name">
			<div class="ctm-select-txt pad-l-10">
				<span class="select-txt" id="category">
					@if(@$resource->sea->name)
						{{@$resource->sea->name}}
					@else 
						Pasirinkite...
					@endif
				</span>
				<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
			</div>
			<input type="hidden" name="app_sea" class="app_sea" value="{{ @$resource->sea_id}}">
			<div class="ctm-option-box">
				<div class="ctm-option" onclick="setDropdownValue(event,0,'app_sea')">Pasirinkite...</div>
				@if(count($seas) > 0)
					@foreach ($seas as $sea)
						<div class="ctm-option" onclick="setDropdownValue(event,{{ $sea->id }},'app_sea')">{{ $sea->name }}</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
</div>