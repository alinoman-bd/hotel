@extends('vendor.layouts.app')
@section('style')
<link href="{{asset('vendor/css/viewed-resource.css')}}" rel="stylesheet"> 
<style>

</style>
@endsection

@section('content')
<section class="details-section">
	<div class="back-ul">
		{{-- <ul>
			<li><a href="#">Home</a></li>
			<li></li>
			<li class="active">Post A Add</li>
		</ul> --}}
	</div>

	<div class="row m-0">
		<div class="col-12 col-lg-9 pl-0">
			<div class="content-details bg-white">
				<div  class="dt-top-cnt">
					<span class="dt-name">{{ $resource->name }}</span> 
					<span class="ratting-li-star"><i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i></span> 
					<span class="ratting-li-like"><i class="fas fa-thumbs-up"></i></span>
					<span class="sh-lv  float-none  float-sm-right">
						<a href="javascript:;" onclick="makeFavrite({{$resource->id}})"><i class="far fa-heart add-fav_color"></i></a>
						<a href=""><i class="fas fa-share-alt"></i></a>
					</span>
				</div>
				<div class="s-tlt">{{ $resource->short_title }}</div>
				<div class="address"><i class="fas fa-map-marker-alt"></i> {{ $resource->address }}</div>

				<div class="gallery-slider">
					<div class="swiper-container gallery-top gallery-top1">
						<div class="swiper-wrapper">
							@if($resource->image)
							<div class="swiper-slide">
								<div class="slide-img">
									<img src="{{asset($resource->image)}}" class="cover" alt="img">
								</div>
							</div>
							@endif
							
							@if(count($resource->recourceImage))
							@foreach ($resource->recourceImage as $image)
							<div class="swiper-slide">
								<div class="slide-img">
									<img src="{{asset($image->path)}}" class="cover" alt="img">
								</div>
							</div>
							@endforeach
							@endif	

							
						</div>
					</div>
					<div class="swiper-container gallery-thumbs gallery-thumbs1">
						<div class="swiper-wrapper">
							@if($resource->image)
							<div class="swiper-slide slide1">
								<div class="slide-img">
									<img src="{{asset($resource->image)}}" class="cover" alt="img">
								</div>
							</div>
							@endif	
							@if(count($resource->recourceImage))
							@foreach ($resource->recourceImage as $image)
							<div class="swiper-slide">
								<div class="slide-img">
									<img src="{{asset($image->path)}}" class="cover" alt="img">
								</div>
							</div>
							@endforeach
							@endif	
						</div>
						<div class="more-photos more-photos1">
							<div class="m-img">+{{count($resource->recourceImage) + 1}} photos</div>
						</div>
					</div>
				</div>

				{{-- <div class="pop-faci">
					<div class="pop-faci-tlt">Most popular facilities</div>
					<div class="pop-faci-ul">
						<span class="pop-faci-li"><i class="fas fa-paw"></i> Pet freindly</span>
						<span class="pop-faci-li"><i class="fas fa-wifi"></i> Free WiFi</span>
						<span class="pop-faci-li"><i class="fas fa-car"></i> Free Parking</span>
						<span class="pop-faci-li"><del><i class="fas fa-fire"></i></del> No-smoking rooms</span>
						<span class="pop-faci-li"><i class="fas fa-utensils"></i> BBQ facilities</span>
					</div>
				</div> --}}


				<div class="pop-faci">
					<div class="pop-faci-tlt font-weight-bold">Description</div>
					<div class="des-cnt">
						<p>{{$resource->description}}</p>
					</div>
				</div>

				@if(count($resource->rooms) > 0)
				@foreach ($resource->rooms as $room)
				<div class="rooms-type-table">
					<table class="table rooms-type-table-c table-bordered">
						<thead>
							<tr>
								<th scope="col" class="td-width-unc1">Room title</th>
								<th scope="col" class="td-width-cm">Sleeps</th>
								<th scope="col" class="td-width-cm">Price for</th>
								<th scope="col" class="td-width-unc2">Your choices</th>
								<th scope="col" class="td-width-cm">  </th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="td-width-unc1 td-width-unc211">
									<div class="room-tlt"><span>{{$room->title}}</span></div>
									<div class="room-bed">{{$room->total_bed}} {{$room->bedType->name}}<i class="fas fa-bed"></i></div>
									{{-- <div class="room-faci room-faci-1">
										<span><i class="fas fa-bed"></i> 28 m<sup>2</sup></span>
										<span><i class="fas fa-wifi"></i> Free-WiFi</span>
									</div>
									<div class="room-faci">
										<span><i class="fas fa-check"></i> Safe</span>
										<span><i class="fas fa-check"></i> Desk</span>
									</div> --}}
								</td>
								<td colspan="2" class="p-0">
									<table class="table price-tbl m-0 p-0">
										<tbody>
											<tr>
												<td class="in-td in-td1">
													@for($i = 1; $i <= $room->total_bed; $i++)
													<i class="fas fa-user"></i>
													@endfor
												</td>
												<td class="in-td in-td2">€{{$room->price}} <i class="fas fa-exclamation-circle"></i><br> includes taxes and charges</td>
											</tr>
											{{-- <tr>
												<td class="in-td in-td1"><i class="fas fa-user"></i><i class="fas fa-user"></i></td>
												<td class="in-td in-td2">€180</td>
											</tr>
											<tr class="last-tr">
												<td class="in-td in-td1"><i class="fas fa-user"></i></td>
												<td class="in-td in-td2">€160</td>
											</tr> --}}
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
									{{-- <div><button class="btn ctm-btn td-btn" data-toggle="modal" data-target="#roomModal">More Details</button></div> --}}

									<div><button class="btn ctm-btn td-btn" onclick="openRoom({{$room->id}}, {{$resource->id}})">More Details</button></div>

									{{-- <div><button class="btn ctm-btn td-btn">Reservation</button></div> --}}
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				@endforeach
				@endif


				<div class="contact-info">
					<div class="contact-tlt">Kontaktai</div>
					{{-- <div class="con-txt1">Ezeras Vikoknise - 500</div> --}}
					<div class="con-info-all">
						<div class="con-info"><span>Name: </span> {{$resource->name}}</div>
						@if($resource->short_title)
						<div class="con-info"><span>Sort Title: </span> {{$resource->short_title}}</div>
						@endif
						@if($resource->address)
						<div class="con-info"><span>Address: </span> {{$resource->address}}</div>
						@endif
						@if($resource->phone)
						<div class="con-info"><span>Phone: </span> {{$resource->phone}}</div>
						@endif
						@if($resource->city->name)
						<div class="con-info"><span>City: </span> {{$resource->city->name}}</div>
						@endif
						@if($resource->location->name)
						<div class="con-info"><span>Location: </span> {{$resource->location->name}}</div>
						@endif
						@if($resource->nearest_locations)
						<div class="con-info"><span>Nearest Location: </span>{{$resource->nearest_locations}}</div>
						@endif
						@if($resource->contact_person)
						<div class="con-info"><span>Contact: </span> {{$resource->contact_person}}</div>
						@endif
						@if($resource->note)
						<div class="con-info"><span>Note: </span> {{$resource->note}}</div>
						@endif	
					</div>
				</div>

				<div class="contact-info">
					<div class="contact-tlt">Nuomos Kainos</div>
					<div class="con-info-all">
						<div class="con-info"><span>Room: </span> Nuo {{$resource->min_price}}Eu iki {{$resource->max_price}}Eu</div>
						<div class="con-info"><span>Resources: </span>  Nuo {{$resource->total_min_price}}Eu iki {{$resource->total_max_price}}Eu</div>	
					</div>
				</div>

				@if($resource->distance_from_lake || $resource->distance_from_river || $resource->distance_from_sea)
				<div class="room-side-info">
					<div class="room-side-tlt">Distances</div>
					@if($resource->distance_from_lake)
					<div class="row room-info-all m-0">
						<div class="col-12 col-md-12 pl-0">
							<div class="room-info">Distance Form Lake<span class="float-right">{{$resource->distance_from_lake}} km</span>
							</div>
						</div>
						{{-- <div class="col-12 col-md-6 pl-0">
							<div class="room-info"><span class="side-type">Lake</span><span class="float-right">{{$resource->distance_from_lake}} km</span>
							</div>
						</div> --}}
					</div>
					@endif

					@if($resource->distance_from_river)
					<div class="row room-info-all m-0">
						<div class="col-12 col-md-12 pl-0">
							<div class="room-info">Distance form River<span class="float-right">{{$resource->distance_from_river}} km</span>
							</div>
						</div>
						{{-- <div class="col-12 col-md-6 pl-0">
							<div class="room-info"><span class="side-type">River</span><span class="float-right">{{$resource->distance_from_river}} km</span>
							</div>
						</div> --}}
					</div>
					@endif	 
					@if($resource->distance_from_sea)
					<div class="row room-info-all m-0">
						<div class="col-12 col-md-12 pl-0">
							<div class="room-info">Distance form Sea<span class="float-right">{{$resource->distance_from_sea}} km</span>
							</div>
						</div>
						{{-- <div class="col-12 col-md-6 pl-0">
							<div class="room-info"><span class="side-type">Sea</span><span class="float-right">{{$resource->distance_from_sea}} km</span>
							</div>
						</div> --}}
					</div>
					@endif
				</div>
				@endif


				{{-- <div class="room-side-info">
					<div class="room-side-tlt">Visi patogumai</div>
					<div class="row room-info-all m-0">

						<div class="col-12 col-md-6  col-md-4 pl-0">
							<div class="m-faci"><span class="tlt-txt d-flex">@include('vendor.inc.svg.bathroom-svg') Bathroom</div>
								<div class="room-info-all">
									<div class="room-info-s"><i class="fas fa-check"></i> Microwave</div>
									<div class="room-info-s"><i class="fas fa-check"></i> Microwave</div>
								</div>
							</div>

						</div>
					</div> --}}


				</div>
			</div>
			<div  class="col-12 col-lg-3 pr-0 d-right-cnt">
				@if(count($vip1) > 0)
				@foreach ($vip1 as $vip)
				@php
				$rcName = Helper::resourceName( $vip->name );
				@endphp
				<div class="card mb-3">
					<img class="card-img-top" src="{{asset($vip->image)}}" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">{{$vip->name}}</h5>
						<p class="card-text">{{$vip->short_title}}</p>
						<a href="{{route('vendors.all',['p1'=>$vip->slug])}}" onclick="viewedResource({{$vip->id}})" class="btn btn-primary btn-block">view details</a>
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</section>
	<section class="content-list-section">
		<div class="content-list">
			<div class="row -0">
				@if(count($vip2) > 0)
				@foreach ($vip2 as $vip)
				
				<div class="col-12 col-lg-6">
					<div class="single-content">
						<div class="content-img"><img src="{{asset($vip->image)}}" alt="img"></div>
						<div class="single-content-txt">
							<div class="rating-p">{{$vip->min_price}}</div>
							<div class="single-content-tlt"> <a href="{{route('vendors.all',['p1'=>$vip->slug])}}" onclick="viewedResource({{$vip->id}})"> {{$vip->name}}</a></div>
							<div class="shop-name">{{$vip->short_title}}</div>
							<div class="shop-add">{{$vip->address}}</div>
							<div class="shop-add">{{$vip->phone}}</div>

						</div>

					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div> 
	</section>
	<section class="all-viewed-resource">
		@include('vendor.inc.viewed-resource')
	</section>
	<div class="singleRoom">
		{{-- single room modal here come form ajax --}}
	</div>

	{{-- @include('vendor.inc.modal.details-room-modal') --}}
	
	@endsection
	@section('script')
	<script src="{{asset('vendor/js/js_r/rec-details.js')}}"></script>
	@endsection