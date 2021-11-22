<div class="form-group row">
	<label class="col-sm-3 col-form-label text-left text-sm-right">Miestas/ rajonas<sup>*</sup></label>
	<div class="col-sm-9">
		<div class="ctm-select" ctm-slt-n="cat_name">
			<div class="ctm-select-txt pad-l-10">
				<span class="select-txt" id="category">Pasirinkite...</span>
				<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
			</div>
			<input type="hidden" name="city" class="evt_city">
			<div class="ctm-option-box">
				<div class="ctm-option" onclick="setDropdownValue(event,0,'evt_city')">Pasirinkite...</div>
				<div class="ctm-option" onclick="setDropdownValue(event,1,'evt_city')">City 1</div>
				<div class="ctm-option" onclick="setDropdownValue(event,2,'evt_city')">City 2</div>
			</div>
		</div>
	</div>
</div>