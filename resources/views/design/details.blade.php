@extends('design.layouts.app')
@section('style')
@endsection

@section('content')
<section class="details-section">
	
@include('design.inc.modal.room-modal')
	<div class="back-ul">
		<ul>
			<li><a href="#">Home</a></li>
			<li > > </li>
			<li class="active">Post A Add</li>
		</ul>
	</div>

	<div class="row m-0">
		<div class="col-12 col-lg-9 pl-0">
			<div class="content-details bg-white">
				<div  class="dt-top-cnt">
					<span class="dt-name">"Aredreams"</span> 
					<span class="ratting-li-star"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i></span> 
					<span class="ratting-li-like"><i class="fas fa-thumbs-up"></i></span>
					<span class="sh-lv  float-none  float-sm-right">
						<a href=""><i class="far fa-heart"></i></a>
						<a href=""><i class="fas fa-share-alt"></i></a>
					</span>
				</div>
				<div class="s-tlt">Aredreams, Aredreams, Aredreams</div>
				<div class="address"><i class="fas fa-map-marker-alt"></i> 512 trails USA</div>

				<div class="gallery-slider">
					<div class="swiper-container gallery-top gallery-top1">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<div class="slide-img">
									<img src="{{asset('design/img/ad-img.png')}}" class="cover" alt="img">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="slide-img">
									<img src="{{asset('design/img/ad-img.png')}}" class="cover" alt="img">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="slide-img">
									<img src="{{asset('design/img/ad-img.png')}}" class="cover" alt="img">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="slide-img">
									<img src="{{asset('design/img/ad-img.png')}}" class="cover" alt="img">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="slide-img">
									<img src="{{asset('design/img/ad-img.png')}}" class="cover" alt="img">
								</div>
							</div>
						</div>
					</div>
					<div class="swiper-container gallery-thumbs gallery-thumbs1">
						<div class="swiper-wrapper">
							<div class="swiper-slide slide1">
								<div class="slide-img">
									<img src="{{asset('design/img/ad-img.png')}}" class="cover" alt="img">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="slide-img">
									<img src="{{asset('design/img/ad-img.png')}}" class="cover" alt="img">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="slide-img">
									<img src="{{asset('design/img/ad-img.png')}}" class="cover" alt="img">
								</div>
							</div>
							<div class="swiper-slide">
								<div class="slide-img">
									<img src="{{asset('design/img/ad-img.png')}}" class="cover" alt="img">
								</div>
							</div>
							<div class="swiper-slide">
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
				<div class="pop-faci">
					<div class="pop-faci-tlt">Most popular facilities</div>
					<div class="pop-faci-ul">
						<span class="pop-faci-li"><i class="fas fa-paw"></i> Pet freindly</span>
						<span class="pop-faci-li"><i class="fas fa-wifi"></i> Free WiFi</span>
						<span class="pop-faci-li"><i class="fas fa-car"></i> Free Parking</span>
						<span class="pop-faci-li"><del><i class="fas fa-fire"></i></del> No-smoking rooms</span>
						<span class="pop-faci-li"><i class="fas fa-utensils"></i> BBQ facilities</span>
					</div>
				</div>
				<div class="pop-faci">
					<div class="pop-faci-tlt font-weight-bold">Description</div>
					<div class="des-cnt">
						<p>fosa;jgsgpo; sjdgs;jg sdjg;sdjg</p>
						<p>fosa;jgsgpo; sjdgs;jg sdjg;sdjg</p>
						<p>fosa;jgsgpo; sjdgs;jg sdjg;sdjg</p>
					</div>
				</div>
				<div class="rooms-type-table">
					<table class="table rooms-type-table-c table-bordered">
						<thead>
							<tr>
								<th scope="col" class="td-width-unc1">Room Type</th>
								<th scope="col" class="td-width-cm">Sleeps</th>
								<th scope="col" class="td-width-cm">Price for</th>
								<th scope="col" class="td-width-unc2">Your choices</th>
								<th scope="col" class="td-width-cm">  </th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="td-width-unc1 td-width-unc211">
									<div class="room-tlt"><span>King Room with River - Non-Smoking</span></div>
									<div class="room-bed">1 king bed <i class="fas fa-bed"></i></div>
									<div class="room-faci room-faci-1">
										<span><i class="fas fa-bed"></i> 28 m<sup>2</sup></span>
										<span><i class="fas fa-wifi"></i> Free-WiFi</span>
									</div>
									<div class="room-faci">
										<span><i class="fas fa-check"></i> Safe</span>
										<span><i class="fas fa-check"></i> Desk</span>
									</div>
								</td>
								<td colspan="2" class="p-0">
									<table class="table price-tbl m-0 p-0">
										<tbody>
											<tr>
												<td class="in-td in-td1"><i class="fas fa-user"></i><i class="fas fa-user"></i><i class="fas fa-user"></i></td>
												<td class="in-td in-td2">€200 <i class="fas fa-exclamation-circle"></i><br> includes taxes and charges</td>
											</tr>
											<tr>
												<td class="in-td in-td1"><i class="fas fa-user"></i><i class="fas fa-user"></i></td>
												<td class="in-td in-td2">€180</td>
											</tr>
											<tr class="last-tr">
												<td class="in-td in-td1"><i class="fas fa-user"></i></td>
												<td class="in-td in-td2">€160</td>
											</tr>
										</tbody>
									</table>
								</td>
								<td class="td-width-unc2">
									<div class="can-txt">
										<span class="td-i-l"><i class="fas fa-check"></i></span> Free Cansalation before 11:59 PM on July 25,2020 <span class="td-i-r"><i class="fas fa-question-circle"></i></span>
									</div>
									<div class="can-txt">
										<span class="td-i-l"><i class="fas fa-check"></i></span> Free Cansalation before 11:59 PM on July 25,2020 <span class="td-i-r"><i class="fas fa-question-circle"></i></span>
									</div>
								</td>
								<td class="td-width-cm p-2">
									<div><button class="btn ctm-btn td-btn" data-toggle="modal" data-target="#roomModal">More Details</button></div>
									<div><button class="btn ctm-btn td-btn">Reservation</button></div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="contact-info">
					<div class="contact-tlt">Kontaktai</div>
					<div class="con-txt1">Ezeras Vikoknise - 500</div>
					<div class="con-info-all">
						<div class="con-info"><span>Address: </span> Ezeras Vikoknise</div>
						<div class="con-info"><span>Kaibame: </span> Ezeras,Vikoknise</div>
						<div class="con-info"><span>Telefonai: </span> +965545433</div>
						<div class="con-info"><span>Tinclalapis: </span> <a href="#">www.info.net</a> </div>
						<div class="con-info"><span>Dirbame: </span> Vesus metus</div>
					</div>
				</div>

				<div class="contact-info">
					<div class="contact-tlt">Nuomos Kainos</div>
					<div class="con-info-all">
						<div class="con-info"><span>Namelei: </span> Nuo 100Eu iki 250Eu</div>
						<div class="con-info"><span>Kaimrei: </span>  Nuo 100Eu iki 250Eu</div>
						<div class="con-info"><span>Visa sodyba: </span>  Nuo 100Eu iki 250Eu</div>
						
					</div>
				</div>


				<div class="room-side-info">
					<div class="room-side-tlt">Artumai iki savarbiu objectu</div>
					<div class="row room-info-all m-0">
						<div class="col-12 col-md-6 pl-0">
							<div class="room-info">Ole Smoky Moonshine Distillery<span class="float-right">.2km</span>
							</div>
						</div>
						<div class="col-12 col-md-6 pl-0">
							<div class="room-info room-info1">Litle pigoen River <span class="side-type">River</span><span class="float-right">.2km</span>
							</div>
						</div>
					</div>
					<div class="row room-info-all m-0">
						<div class="col-12 col-md-6 pl-0">
							<div class="room-info">Ole Smoky Moonshine Distillery<span class="float-right">.2km</span>
							</div>
						</div>
						<div class="col-12 col-md-6 pl-0">
							<div class="room-info room-info1">Litle pigoen River <span class="side-type">River</span><span class="float-right">.2km</span>
							</div>
						</div>
					</div>
				</div>


				<div class="room-side-info">
					<div class="room-side-tlt">Visi patogumai</div>

					<div class="pop-faci-ul pb-4">
						<span class="pop-faci-li"><i class="fas fa-paw"></i> Pet freindly</span>
						<span class="pop-faci-li"><i class="fas fa-wifi"></i> Free WiFi</span>
						<span class="pop-faci-li"><i class="fas fa-car"></i> Free Parking</span>
						<span class="pop-faci-li"><del><i class="fas fa-fire"></i></del> No-smoking rooms</span>
						<span class="pop-faci-li"><i class="fas fa-utensils"></i> BBQ facilities</span>
					</div>

					<div class="row room-info-all room-f-d m-0">

						<div class="col-12 col-md-6  col-lg-4 pl-0">
							<div class="m-faci">
								<span class="tlt-txt">@include('design.inc.svg.bathroom-svg') Bathroom</span>
							</div>
							<div class="room-info-all">
								<div class="room-info-s"><i class="fas fa-check"></i> Microwave</div>
								<div class="room-info-s"><i class="fas fa-check"></i> Microwave</div>
							</div>
						</div>
						<div class="col-12 col-md-6  col-lg-4 pl-0">
							<div class="m-faci">
								<span class="tlt-txt"><i class="fas fa-paw"></i> Pets</span>
							</div>
							<div class="room-info-all">
								<div class="room-info-s">Pets are not allowed</div>
							</div>
						</div>

					</div>
				</div>


			</div>
		</div>
		<div  class="col-12 col-lg-3 pr-0">
			@include('design.inc.ad')
		</div>
	</div>
</section>
<section class="content-list-section">
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
</section>
@endsection
@section('script')
<script>
	$(function() {
		$("#inDate").datepicker();
		$("#outDate").datepicker();
	});
</script>
@endsection