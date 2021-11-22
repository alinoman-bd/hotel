
<div class="single-form border-0">
	<div class="single-form-title">
		<h3><img src="{{asset('design/img/post-add1.png')}}" alt="post-add" class="img-fluid">Renginiai, koncertai, šventės </h3>
	</div>
	<form>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Miestas/ rajonas<sup>*</sup></label>
			<div class="col-sm-9">
				<div class="ctm-select" ctm-slt-n="cat_name">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">Pasirinkite...</span>
						<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
					</div>
					<input type="hidden" name="name">
					<div class="ctm-option-box">
						<div class="ctm-option" onclick="setValue(event,0)">Pasirinkite...</div>
						<div class="ctm-option" onclick="setValue(event,1)">Akmenės rajonas</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Pavadinimas/ antraštė<sup>*</sup></label>
			<div class="col-sm-9">
				<input type="text" class="form-control">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Data, laikas<sup>*</sup></label>
			<div class="col-sm-9">
				<div class="form-group">
					<div class="ctm-select" ctm-slt-n="cat_name">
						<div class="ctm-select-txt pad-l-10">
							<span class="select-txt" id="category">2020</span>
							<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
						</div>
						<input type="hidden" name="name">
						<div class="ctm-option-box">
							<div class="ctm-option" onclick="setValue(event,2020)">2020</div>
							<div class="ctm-option" onclick="setValue(event,2021)">2020</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="ctm-select" ctm-slt-n="cat_name">
						<div class="ctm-select-txt pad-l-10">
							<span class="select-txt" id="category">liepa</span>
							<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
						</div>
						<input type="hidden" name="name">
						<div class="ctm-option-box">
							<div class="ctm-option" onclick="setValue(event,0)">liepa</div>
							<div class="ctm-option" onclick="setValue(event,1)">liepa</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="ctm-select" ctm-slt-n="cat_name">
						<div class="ctm-select-txt pad-l-10">
							<span class="select-txt" id="category">19</span>
							<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
						</div>
						<input type="hidden" name="name">
						<div class="ctm-option-box">
							<div class="ctm-option" onclick="setValue(event,19)">19</div>
							<div class="ctm-option" onclick="setValue(event,19)">19</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="ctm-select" ctm-slt-n="cat_name">
						<div class="ctm-select-txt pad-l-10">
							<span class="select-txt" id="category">20</span>
							<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
						</div>
						<input type="hidden" name="name">
						<div class="ctm-option-box">
							<div class="ctm-option" onclick="setValue(event,20)">20</div>
							<div class="ctm-option" onclick="setValue(event,20)">20</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="ctm-select" ctm-slt-n="cat_name">
						<div class="ctm-select-txt pad-l-10">
							<span class="select-txt" id="category">Pasirinkite...</span>
							<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
						</div>
						<input type="hidden" name="name">
						<div class="ctm-option-box">
							<div class="ctm-option" onclick="setValue(event,00)">00</div>
							<div class="ctm-option" onclick="setValue(event,10)">10 rajonas</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Kaina</label>
			<div class="col-sm-9">
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="form-group row text-right">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Adresas/ vieta<sup>*</sup></label>
			<div class="col-sm-9">
				<textarea class="form-control"  ></textarea>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Telefonai <sup>*</sup></label>
			<div class="col-sm-9">
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label text-left text-sm-right">El. pašto adresai <sup>*</sup></label>
			<div class="col-sm-9">
				<input type="email" class="form-control">
				<div class="mt-2"><label class="ctm-container">Noriu įsigyti efektyvesnę mokamą reklamą su nuotraukomis ir išsamiu aprašymu.
					<input type="checkbox" >
					<span class="checkmark"></span>
				</label></div>
			</div>
		</div>
		<div class="form-group row text-right">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Pastabos, klausimai<sup>*</sup></label>
			<div class="col-sm-9">
				<textarea class="form-control"  ></textarea>
			</div>
		</div>
		<div class="form-group row text-right">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Kontaktinis asmuo<sup>*</sup></label>
			<div class="col-sm-9">
				<textarea class="form-control"  ></textarea>
			</div>
		</div>
		<div class="form-group row text-right">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Primename, jog įkeldami skelbimą<sup>*</sup></label>
			<div class="col-sm-9">
				<textarea class="form-control"  ></textarea>
			</div>
		</div>
	</form>
</div>