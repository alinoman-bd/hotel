
<div class="single-form">
	<div class="single-form-title">
		<h3><img src="{{asset('design/img/post-add1.png')}}" alt="post-add" class="img-fluid">Apgyvendinimas</h3>
	</div>
	<form>
		<div class="form-group row">
			<label for="tips" class="col-sm-3 col-form-label text-left text-sm-right">Apgyvendinimo tipas<sup>*</sup></label>
			<div class="col-sm-9">
				<div class="row m-0">
					<div class="col-12 col-md-6">
						<label class="ctm-container">Sodybos
							<input type="checkbox" >
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-12 col-md-6">
						<label class="ctm-container">Apartamentų ir butų nuoma
							<input type="checkbox" >
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-12 col-md-6">
						<label class="ctm-container">Kambarių nuoma
							<input type="checkbox" >
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-12 col-md-6">
						<label class="ctm-container">Namelių nuoma
							<input type="checkbox" >
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-12 col-md-6">
						<label class="ctm-container">Namų, vilų ir kotedžų nuoma
							<input type="checkbox" >
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-12 col-md-6">
						<label class="ctm-container">Kempingai, stovyklavietės
							<input type="checkbox" >
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-12 col-md-6">
						<label class="ctm-container">Svečių namai
							<input type="checkbox" >
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-12 col-md-6">
						<label class="ctm-container">Pirtys
							<input type="checkbox" >
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-12 col-md-6">
						<label class="ctm-container">Viešbučiai
							<input type="checkbox" >
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-12 col-md-6">
						<label class="ctm-container">Sanatorijos
							<input type="checkbox" >
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-12 col-md-6">
						<label class="ctm-container">Poilsio namai
							<input type="checkbox" >
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-12 col-md-6">
						<label class="ctm-container">Hosteliai
							<input type="checkbox" >
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-12 col-md-6">
						<label class="ctm-container">Stovyklos
							<input type="checkbox" >
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
			</div>
		</div>
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
			<label class="col-sm-3 col-form-label text-left text-sm-right">Ežerai/ upės<sup>*</sup></label>
			<div class="col-sm-9">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputEmail4">Ežerai</label>
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
					<div class="form-group col-md-6">
						<label for="inputPassword4">Upės</label>
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
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Atstumas iki ežero/ upės</label>
			<div class="col-sm-9">
				<div class="input-group mb-3">
					<input type="text" class="form-control">
					<div class="input-group-append">
						<span class="input-group-text" id="basic-addon2">m</span>
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
		<div class="form-group row text-right">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Adresas<sup>*</sup></label>
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
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Kaina parai<sup>*</sup></label>
			<div class="col-sm-9">
				<div class="form-row">
					<div class="form-group col-md-4">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">nuo</span>
							</div>
							<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
							<div class="input-group-append">
								<span class="input-group-text">iki</span>
							</div>
						</div>
					</div>
					<div class="form-group col-md-4">
						<div class="input-group mb-3">
							<input type="text" class="form-control">
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2">€</span>
							</div>
						</div>
					</div>
					<div class="form-group col-md-4">
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
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Viso komplekso nuomos kaina parai:<sup>*</sup></label>
			<div class="col-sm-9">
				<div class="form-row">
					<div class="form-group col-md-4">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text">nuo</span>
							</div>
							<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
							<div class="input-group-append">
								<span class="input-group-text">iki</span>
							</div>
						</div>
					</div>
					<div class="form-group col-md-4">
						<div class="input-group mb-3">
							<input type="text" class="form-control">
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2">€</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Bendras numerių skaičus<sup>*</sup></label>
			<div class="col-sm-9">
				<div class="form-row">
					<div class="form-group col-md-12">
						<div class="input-group mb-3">
							<input type="text" class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">Kiek kambarių/ butų/ numerių nuomojate</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Bendras vietų skaičius<sup>*</sup></label>
			<div class="col-sm-9">
				<div class="form-row">
					<div class="form-group col-md-12">
						<div class="input-group mb-3">
							<input type="text" class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">Kiek svečių gali apsistoti vienu met</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Dirba<sup>*</sup></label>
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
			<label class="col-sm-3 col-form-label text-left text-sm-right">Atsiskaitymas banko kortelėmis<sup>*</sup></label>
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
		<!-- <div class="form-group row text-right">
			<label class="col-sm-3 col-form-label text-left text-sm-right">Pastabos, klausimai<sup>*</sup></label>
			<div class="col-sm-9">
				<label class="ctm-container radio-ctm">Two
					<input type="radio" name="radio">
					<span class="checkmark"></span>
				</label>
			</div>
		</div> -->
	</form>
</div>