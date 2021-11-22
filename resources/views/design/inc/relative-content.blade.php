<div class="content-list">
	<div class="row -0">
		@for($i=1;$i < 5; $i++)
		<div class="col-12 col-lg-6">
			<div class="single-content">
				<div class="content-img"><img src="{{asset('design/img/hospital-02.jpg')}}" alt="img"></div>
				<div class="single-content-txt">
					<div class="rating-p">4.2</div>
					<div class="single-content-tlt">improve motor america</div>
					<div class="shop-name">Express avenue mall,Shanta monica</div>
					<div class="shop-add">2800 Lake rode,Hills, U.S.A</div>
					<div class="single-content-ul">
						<ul class="nav nav-pills nav-fill">
							<li class="nav-item">
								<a class="nav-link li-cnt-show" href="javascript:void(0)"><i class="far fa-chart-bar"></i> 50</a>
							</li>
							<li class="nav-item">
								<a class="nav-link li-cnt-show" href="javascript:void(0)"><i class="far fa-heart"></i> 50</a>
							</li>
							<li class="nav-item">
								<a class="nav-link li-cnt-show" href="javascript:void(0)"><i class="fas fa-eye"></i> 50</a>
							</li>
							<li class="nav-item">
								<a class="nav-link li-cnt-show" href="javascript:void(0)"><i class="fas fa-share-alt"></i> 50</a>
							</li>
						</ul>
					</div>
				</div>

			</div>
		</div>
		@endfor
	</div> 
</div>