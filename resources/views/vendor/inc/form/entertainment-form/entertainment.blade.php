<div class="single-form">
	<div class="single-form-title">
		<h3><img src="{{asset('vendor/img/post-add1.png')}}" alt="post-add" class="img-fluid"> Pramogos, paslaugos, lankytinos vietos</h3>
	</div>
	
	@include('vendor.inc.form.entertainment-form.type')
	@include('vendor.inc.form.entertainment-form.city')
	
	<div class="form-group row">
		<label class="col-sm-3 col-form-label text-left text-sm-right">Pavadinimas/ antraštė<sup>*</sup></label>
		<div class="col-sm-9">
			<input type="text" class="form-control ent_title" name="title">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-3 col-form-label text-left text-sm-right">Kaina</label>
		<div class="col-sm-9">
			<input type="text" class="form-control ent_price" name="price">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-3 col-form-label text-left text-sm-right">Address</label>
		<div class="col-sm-9">
			<input type="text" class="form-control ent_address" name="address" id="ent_address_auto">
		</div>
	</div>
	
	<div class="form-group row">
		<label class="col-sm-3 col-form-label text-left text-sm-right">Telefonai <sup>*</sup></label>
		<div class="col-sm-9">
			<input type="text" class="form-control ent_phone" name="phone">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-sm-3 col-form-label text-left text-sm-right">El. pašto adresai <sup>*</sup></label>
		<div class="col-sm-9">
			<input type="email" class="form-control ent_email" name="email">
		</div>
	</div>
	@include('vendor.inc.form.entertainment-form.works')
	@include('vendor.inc.form.entertainment-form.payment')
	
	<div class="form-group row text-right">
		<label class="col-sm-3 col-form-label text-left text-sm-right">Pastabos, klausimai<sup>*</sup></label>
		<div class="col-sm-9">
			<textarea class="form-control ent_note" name="note"></textarea>
		</div>
	</div>
	<div class="form-group row text-right">
		<label class="col-sm-3 col-form-label text-left text-sm-right">Kontaktinis asmuo<sup>*</sup></label>
		<div class="col-sm-9">
			<textarea class="form-control ent_contact_person" name="contact_person"></textarea>
		</div>
	</div>
</div>