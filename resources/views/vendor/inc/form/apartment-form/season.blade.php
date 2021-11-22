<div class="form-group row">
	<label class="col-sm-3 col-form-label text-left text-sm-right">Dirba<sup>*</sup></label>
	<div class="col-sm-9">
		<div class="ctm-select" ctm-slt-n="cat_name">
			<div class="ctm-select-txt pad-l-10">
				<span class="select-txt" id="category">
					@if(@$resource->season->name)
						{{@$resource->season->name}}
					@else 
						Pasirinkite...
					@endif
				</span>
				<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
			</div>
			<input type="hidden" name="app_seasion" class="app_seasion" value="{{ @$resource->season_id}}">
			<div class="ctm-option-box">
				<div class="ctm-option" onclick="setDropdownValue(event,0,'app_seasion')">Pasirinkite...</div>
				@if(count($seasons) > 0)
					@foreach ($seasons as $season)
						<div class="ctm-option" onclick="setDropdownValue(event,{{ $season->id }},'app_seasion')">{{ $season->name }}</div>
					@endforeach
				@endif	
			</div>
		</div>
	</div>
</div>