<div class="form-group row">
	<label class="col-sm-3 col-form-label text-left text-sm-right">Dirba</label>
	<div class="col-sm-9">
		<div class="ctm-select" ctm-slt-n="cat_name">
			<div class="ctm-select-txt pad-l-10">
				<span class="select-txt" id="category">Pasirinkite...</span>
				<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
			</div>
			<input type="hidden" name="year" class="ent_year">
			<div class="ctm-option-box">
				<div class="ctm-option" onclick="setDropdownValue(event,0,'ent_year')">Pasirinkite...</div>
				<div class="ctm-option" onclick="setDropdownValue(event,1,'ent_year')">Seasion</div>
				<div class="ctm-option" onclick="setDropdownValue(event,2,'ent_year')">Full Year</div>
			</div>
		</div>
	</div>
</div>