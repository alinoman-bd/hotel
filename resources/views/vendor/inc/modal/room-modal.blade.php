<div class="modal fade" id="roomModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<div class="m-room-name">{{$room->title}} <span class="float-right close-m" data-dismiss="modal">X</span></div>
				<div class="row m-0"> 
					<div class="col-12 col-md-6 pl-0">
						<div class="gallery-slider m-0">
							<div class="swiper-container gallery-top gallery-top2">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<div class="slide-img">
											<img src="{{asset('vendor/img/ad-img.png')}}" class="cover" alt="img">
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-container gallery-thumbs gallery-thumbs2">
								<div class="swiper-wrapper">
									<div class="swiper-slide slide1">
										<div class="slide-img">
											<img src="{{asset('vendor/img/ad-img.png')}}" class="cover" alt="img">
										</div>
									</div>
								</div>
								<div class="more-photos more-photos2">
									<div class="m-img">+19 photos</div>
								</div>
							</div>
						</div>
						<div></div>
					</div>
					<div class="col-12 col-md-6 pr-0">
						<div class="m-faci">
							<h3>Facilities</h3>
						</div>

						<div class="m-faci"><span class="tlt-txt">Available room facilities:</span></div>
						<div class="m-faci">
							<div class="row m-0">
								@foreach ($resource->facilities as $fac)
									<div class="col-4 col-md-4 pl-0">
										<i class="fas fa-check"></i> {{$fac->name}}
									</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>