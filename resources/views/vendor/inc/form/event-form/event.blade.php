<div class="single-form border-0">
	<div class="single-form-title">
		<h3><img src="{{asset('vendor/img/post-add1.png')}}" alt="post-add" class="img-fluid">Renginiai, koncertai, šventės </h3>
	</div>

	@include('vendor.inc.form.event-form.city')
	
	<div class="form-group row">
		<label class="col-sm-3 col-form-label text-left text-sm-right">Pavadinimas/ antraštė<sup>*</sup></label>
		<div class="col-sm-9">
			<input type="text" class="form-control evt_title" name="title">
		</div>
	</div>
	@include('vendor.inc.form.event-form.date-time')
	
	<div class="form-group row">
		<label class="col-sm-3 col-form-label text-left text-sm-right">Kaina</label>
		<div class="col-sm-9">
			<input type="text" class="form-control evt_price" name="price">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-3 col-form-label text-left text-sm-right">Address</label>
		<div class="col-sm-9">
			<input type="text" class="form-control evt_address" name="address" id="evt_address_auto">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-3 col-form-label text-left text-sm-right">Telefonai <sup>*</sup></label>
		<div class="col-sm-9">
			<input type="text" class="form-control evt_phone" name="phone">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-3 col-form-label text-left text-sm-right">El. pašto adresai <sup>*</sup></label>
		<div class="col-sm-9">
			<input type="email" class="form-control evt_email" name="email">
			<div class="mt-2"><label class="ctm-container">Noriu įsigyti efektyvesnę mokamą reklamą su nuotraukomis ir išsamiu aprašymu.
				<input type="checkbox" >
				<span class="checkmark"></span>
			</label></div>
		</div>
	</div>
	<div class="form-group row text-right">
		<label class="col-sm-3 col-form-label text-left text-sm-right">Pastabos, klausimai<sup>*</sup></label>
		<div class="col-sm-9">
			<textarea class="form-control evt_note" name="note" ></textarea>
		</div>
	</div>
	<div class="form-group row text-right">
		<label class="col-sm-3 col-form-label text-left text-sm-right">Kontaktinis asmuo<sup>*</sup></label>
		<div class="col-sm-9">
			<textarea class="form-control evt_contact_person" name="contact_person"></textarea>
		</div>
	</div>
	
</div>