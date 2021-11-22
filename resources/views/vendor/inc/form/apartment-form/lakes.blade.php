<label for="inputEmail4">Ežerai</label>
<div class="ctm-select" ctm-slt-n="cat_name">
	<div class="ctm-select-txt pad-l-10">
		<span class="select-txt set-lake-name" id="category">
			@if(@$resource->lake->name)
				{{@$resource->lake->name}}
			@else 
				Pasirinkite...
			@endif
		</span>
		<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
	</div>
	<input type="hidden" name="app_lake" class="app_lake" value="{{ @$resource->lake_id}}">
	<div class="ctm-option-box">
		<div class="ctm-option" onclick="setDropdownValue(event,0,'app_lake')">Pasirinkite...</div>
		@if($lakes->count())
			@foreach($lakes as $lake)
				<div class="ctm-option" onclick="setDropdownValue(event,{{ $lake->id }},'app_lake')">{{ $lake->name }}</div>
			@endforeach	
		@endif
	</div>
</div>
