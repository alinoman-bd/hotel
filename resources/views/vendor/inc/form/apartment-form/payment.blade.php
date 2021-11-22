<div class="form-group row">
	<label class="col-sm-3 col-form-label text-left text-sm-right">Atsiskaitymas banko kortelėmis<sup>*</sup></label>
	<div class="col-sm-9">
		<div class="ctm-select" ctm-slt-n="cat_name">
			<div class="ctm-select-txt pad-l-10">
				<span class="select-txt" id="category">
					@if(@$resource->payment->name)
						{{@$resource->payment->name}}
					@else 
						Pasirinkite...
					@endif
				</span>
				<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
			</div>
			<input type="hidden" name="app_payment_type" class="app_payment_type" value="{{ @$resource->payment_type_id}}">
			<div class="ctm-option-box">
				<div class="ctm-option" onclick="setDropdownValue(event,0,'app_payment_type')">Pasirinkite...</div>
				@if(count($payment_types) > 0)
					@foreach ($payment_types as $payment)
						<div class="ctm-option" onclick="setDropdownValue(event,{{ $payment->id }},'app_payment_type')">{{ $payment->name }}</div>
					@endforeach
				@endif	
			</div>
		</div>
		{{-- <div class="mt-2"><label class="ctm-container">Noriu įsigyti efektyvesnę mokamą reklamą su nuotraukomis ir išsamiu aprašymu.
			<input type="checkbox" name="app_payment_status" class="app_payment_status">
			<span class="checkmark"></span>
		</label></div> --}}
	</div>
</div>