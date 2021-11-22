<div class="form-group row">
	<label for="tips" class="col-sm-3 col-form-label text-left text-sm-right">Apgyvendinimo tipas<sup>*</sup></label>
	@if(@$resource->types)
		@php
			$rc_type = Helper::resourceType($resource);
		@endphp
	@endif
	<div class="col-sm-9">
		<div class="row m-0">
			@if(count($types) > 0)
				@foreach ($types as $type)
					<div class="col-12 col-md-6">
						<label class="ctm-container"> {{ $type->name }}
							<input type="checkbox" name="app_type[]" value="{{ $type->id }}" @if(@$resource->types) @if(in_array($type->id,@$rc_type)) checked @endif @endif class="app_type">
							<span class="checkmark"></span>
						</label>
					</div>
				@endforeach
			@endif	
		</div>
	</div>
</div>