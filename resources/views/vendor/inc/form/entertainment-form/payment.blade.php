<div class="form-group row">
	<label class="col-sm-3 col-form-label text-left text-sm-right">Atsiskaitymas banko kortelėmis</label>
	<div class="col-sm-9">
		<div class="ctm-select" ctm-slt-n="cat_name">
			<div class="ctm-select-txt pad-l-10">
				<span class="select-txt" id="category">Pasirinkite...</span>
				<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
			</div>
			<input type="hidden" name="payment" class="ent_payment">
			<div class="ctm-option-box">
				<div class="ctm-option" onclick="setDropdownValue(event,0,'ent_payment')">Pasirinkite...</div>
				<div class="ctm-option" onclick="setDropdownValue(event,1,'ent_payment')">Payment 1</div>
				<div class="ctm-option" onclick="setDropdownValue(event,2,'ent_payment')">Payment 2</div>
			</div>
		</div>
		<div class="mt-2"><label class="ctm-container">Noriu įsigyti efektyvesnę mokamą reklamą su nuotraukomis ir išsamiu aprašymu.
			<input type="checkbox" >
			<span class="checkmark"></span>
		</label></div>
	</div>
</div>