<div class="modal fade" id="roomModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body">
				<div class="m-room-name">Deluxe King Room <span class="float-right close-m" data-dismiss="modal">X</span></div>
				<div class="row m-0">
					<div class="col-12 col-md-6 pl-0">
						<div class="gallery-slider m-0">
							<div class="swiper-container gallery-top gallery-top2">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<div class="slide-img">
											<img src="{{asset('design/img/ad-img.png')}}" class="cover" alt="img">
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-container gallery-thumbs gallery-thumbs2">
								<div class="swiper-wrapper">
									<div class="swiper-slide slide1">
										<div class="slide-img">
											<img src="{{asset('design/img/ad-img.png')}}" class="cover" alt="img">
										</div>
									</div>
								</div>
								<div class="more-photos">
									<div class="m-img">+19 photos</div>
								</div>
							</div>
						</div>
						<div class="date-input-box">
							<div class="row m-0">
								<div class="col-12 col-md-6 pl-0">
									<div class="input-box">

										<label for="inputPassword4">Check in date</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="far fa-calendar-plus"></i></span>
											</div>
											<input type="text" class="form-control" id="inDate" placeholder="Check in date">
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-angle-down"></i></span>
											</div>
										</div>

										<label for="inputPassword4">Check Out date</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="far fa-calendar-plus"></i></span>
											</div>
											<input type="text" class="form-control" id="outDate" placeholder="Check out date">
											<div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-angle-down"></i></span>
											</div>
										</div>
										<div class="form-group">
											<div class="ctm-select" ctm-slt-n="cat_name">
												<div class="ctm-select-txt pad-l-10">
													<span class="select-txt" id="category">2 adults</span>
													<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
												</div>
												<input type="hidden" name="adult">
												<div class="ctm-option-box">
													<div class="ctm-option" onclick="setValue(event,0)">2 adults</div>
													<div class="ctm-option" onclick="setValue(event,1)">2 adults</div>
												</div>
											</div>
										</div>
										<div class="form-row m-0">
											<div class="form-group col-md-6 pl-0">
												<div class="ctm-select" ctm-slt-n="cat_name">
													<div class="ctm-select-txt pad-l-10">
														<span class="select-txt" id="category">no children</span>
														<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
													</div>
													<input type="hidden" name="name">
													<div class="ctm-option-box">
														<div class="ctm-option" onclick="setValue(event,0)">no children</div>
														<div class="ctm-option" onclick="setValue(event,1)">1 children</div>
													</div>
												</div>
											</div>
											<div class="form-group col-md-6  p-0">
												<div class="ctm-select" ctm-slt-n="cat_name">
													<div class="ctm-select-txt pad-l-10">
														<span class="select-txt" id="category">1 room</span>
														<span class="select-arr"><i class="fa fa-chevron-down"></i></span>
													</div>
													<input type="hidden" name="name">
													<div class="ctm-option-box">
														<div class="ctm-option" onclick="setValue(event,0)">1 room</div>
														<div class="ctm-option" onclick="setValue(event,1)">2 room</div>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="ctm-container">Entire homes & apartments first <i class="fas fa-question-circle"></i>
												<input type="checkbox" >
												<span class="checkmark"></span>
											</label>
										</div>
										<div class="form-group">
											<label class="ctm-container">I'm traveling for work <i class="fas fa-question-circle"></i>
												<input type="checkbox" >
												<span class="checkmark"></span>
											</label>
										</div>
										<div class="form-group text-right">
											<button class="btn ctm-btn date-btn">Search</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 pr-0">
						<div class="m-faci">
							<span class="m-faci-li"><i class="fas fa-wifi"></i> Free-WiFi</span>
							<span class="m-faci-li"><i class="fas fa-wifi"></i> Free-WiFi</span>
						</div>

						<div class="m-faci"><span class="tlt-txt">Room Size:</span> 28 m <sup>2</sup></div>
						<div class="m-faci">
							<div>1 king bed <i class="fas fa-bed"></i> & 1 sofa bed <i class="fas fa-bed"></i></div>
						</div>

						<div class="m-faci"><span class="tlt-txt">In your private Bathroom:</span></div>
						<div class="m-faci">
							<div class="row m-0">
								@for($i=1;$i < 5; $i++)
								<div class="col-12 col-md-6 pl-0">
									<i class="fas fa-check"></i> Shower
								</div>
								@endfor
							</div>
						</div>

						<div class="m-faci"><span class="tlt-txt">View:</span></div>
						<div class="m-faci">
							<div class="row m-0">
								@for($i=1;$i < 5; $i++)
								<div class="col-12 col-md-6 pl-0">
									<i class="fas fa-check"></i> Pool view
								</div>
								@endfor
							</div>
						</div>

						<div class="m-faci"><span class="tlt-txt">Room Facilities:</span></div>
						<div class="m-faci">
							<div class="row m-0">
								@for($i=1;$i < 5; $i++)
								<div class="col-12 col-md-6 pl-0">
									<i class="fas fa-check"></i> Microwave
								</div>
								@endfor
							</div>
						</div>

						<div class="m-faci"><span class="tlt-txt">Smoking:</span> No-smoking</div>

						<div class="m-faci"><span class="tlt-txt">Parking:</span></div>
						<div class="m-faci d-flex">@include('design.inc.svg.parking-svg') Free Parking</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>