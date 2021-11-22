<section class="header-section">
	<div class="top-menu">
		<div class="top-search">
			<div class="logo-img"><img src="{{asset('design/img/map-logo.png')}}" alt="img"></div>
			<div class="top-select">
				<div class="ctm-select" ctm-slt-n="cat_name">
					<div class="ctm-select-txt pad-l-10">
						<span class="select-txt" id="category">Pramogos</span>
						<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
					</div>
					<div class="ctm-option-box">
						<div class="ctm-option">Pramogos1</div>
						<div class="ctm-option">Pramogos2</div>
					</div>
				</div>
			</div>
			<div class="input-group search-input">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fa fa-search"></i></span>
				</div>
				<input type="text" name="search" class="form-control" placeholder="Search...">
			</div>
			<div class="search-btn"><button class="btn ctm-btn "><i class="fa fa-search"></i></button></div>
		</div>
		<div class="top-ul">
			<span class="top-li wo-btn-li"><a href="#"><i class="far fa-heart"></i> My Fevorite</a></span>
			<span class="top-li wo-btn-li"><a href="#"><i class="far fa-user"></i> contact </a></span>
			<span class="top-li"><a href="#"><button class="btn ctm-btn black-btn" data-toggle="modal" data-target="#logModal"><i class="fas fa-sign-in-alt"></i>sign in</button> </a></span>
			<span class="top-li"><a href="#"><button class="btn ctm-btn black-btn"><i class="fa fa-plus"></i> Add Listing</button></a></span>
		</div>
	</div>
	<div class="main-menu">
		<ul class="nav nav-pills nav-fill">
			<li class="nav-item">
				<a class="nav-link li-cnt-show" href="javascript:void(0)"><i class="fas fa-map-marker-alt"></i> Pasirinkite vietove</a>
			</li>
			<li class="nav-item">
				<a class="nav-link li-cnt-show" href="javascript:void(0)"><i class="fas fa-bars"></i> Pasirinkite EZere</a>
			</li>
			<li class="nav-item">
				<a class="nav-link li-cnt-show" href="javascript:void(0)"><i class="fas fa-text-width"></i> Pasirinkite Upe</a>
			</li>
			<li class="nav-item">
				<a class="nav-link li-cnt-show" href="javascript:void(0)"><i class="fas fa-text-width"></i> Apartamentu Tipai</a>
			</li>
			<li class="nav-item">
				<a class="nav-link border-0 p-0" href="javascript:void(0)"><button class="btn search-btn ctm-btn black-btn"><i class="fa fa-search"></i> Search</button></a>
			</li>
		</ul>
	</div>
	<div class="main-menu-content">
		@for($i=1;$i < 5; $i++)
		<div class="main-menu-content-nav main-cnt-show d-none">
			<div class="row m-0">
				@for($j=1;$j < 5; $j++)
				<div class="col-12 col-sm-6 col-md-4">
					<div class="cnt-tlt"><a href="">Toys {{$i}}</a></div>
					<div class="cnt-link-all">
						<div class="cnt-link"><a href="#">Baby dolls</a></div>
						<div class="cnt-link"><a href="#">Baby dolls</a></div>
						<div class="cnt-link"><a href="#">Baby dolls</a></div>
						<div class="cnt-link"><a href="#">Baby dolls</a></div>
					</div>
				</div>
				@endfor
			</div>
		</div>
		@endfor
	</div>
</section>