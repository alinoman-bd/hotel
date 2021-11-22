<div class="search-result-cnt">
	@for($i=1;$i < 5; $i++)
	<div class="single-content">
		<div class="content-img"><img src="{{asset('design/img/hospital-02.jpg')}}" alt="img"></div>
		<div class="single-content-txt">
			<div class="hotel-price"> Nuo<span>$35</span></div>
			<div class="single-content-tlt hotel-name">"Resort nateru 2000"</div>
			<div class="shop-name">"Resort nateru 2000" Express avenue mall,Shanta monica. Express avenue mall,Shanta monica</div>
			<div class="shop-add">2800 Lake rode,Hills, U.S.A</div>
			<div class="hotel-distance">
				<span class="d-km">Ezerus Gilugis - 5km</span> ,
				<span class="d-m">Upe Neris - 8000m</span>
			</div>
			<div class="hotel-contact">
				<span class="contact-txt"><i class="fas fa-phone-volume"></i> +9565446464,+655
				5555</span> 
				<span class="star-like">
					<span class="h-star">
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
						<i class="fas fa-star"></i>
					</span>
					<span class="h-like"><i class="fas fa-thumbs-up"></i></span>
				</span>
			</div>
		</div>
	</div>
	@endfor
</div>