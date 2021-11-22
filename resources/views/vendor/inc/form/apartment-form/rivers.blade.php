<label for="inputPassword4">Upės</label>
<div class="ctm-select" ctm-slt-n="cat_name">
	<div class="ctm-select-txt pad-l-10">
		<span class="select-txt set-river-name" id="category">
			@if(@$resource->river->name)
				{{@$resource->river->name}}
			@else 
				Pasirinkite...
			@endif
		</span>
		<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
	</div>
	<input type="hidden" name="app_river" class="app_river" value="{{ @$resource->river_id}}">
	<div class="ctm-option-box">
		<div class="ctm-option" onclick="setDropdownValue(event,0,'app_river')">Pasirinkite...</div>
		@if($rivers->count())
			@foreach($rivers as $river)
				<div class="ctm-option" onclick="setDropdownValue(event,{{ $river->id }},'app_river')">{{ $river->name }}</div>
			@endforeach
		@endif	
	</div>
</div>
