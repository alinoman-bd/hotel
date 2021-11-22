@extends('vendor.layouts.app')
@section('style')
@endsection

@section('content') 
<section class="content-list-section">
	<div class="cnt-l-tlt text-center"><span>-Rekomentuojeme-</span> </div>
	<div class="content-list">
		<div class="row -0">
			@if(count($vip1) > 0)
				@foreach ($vip1 as $vip)
					<div class="col-12 col-lg-6">
						<div class="single-content">
							<div class="content-img"><img src="{{asset($vip->image)}}" alt="img"></div>
							<div class="single-content-txt">
								<div class="rating-p">{{$vip->min_price}}</div>
								<div class="single-content-tlt"> <a href="{{route('vendors.all',['p1'=>$vip->slug])}}" onclick="viewedResource({{$vip->id}})"> {{$vip->name}} </a></div>
								<div class="shop-name">{{$vip->short_title}}</div>
								<div class="shop-add">{{$vip->address}}</div>
								<div class="shop-add">{{$vip->phone}}</div>
							</div>

						</div>
					</div>
				@endforeach
			@endif
			
			@if(count($vip2) > 0)
				@foreach ($vip2 as $vip)
					<div class="col-12 col-lg-6">
						<div class="single-content">
							<div class="content-img"><img src="{{asset($vip->image)}}" alt="img"></div>
							<div class="single-content-txt">
								<div class="rating-p">{{$vip->min_price}}</div>
								<div class="single-content-tlt"> <a href="{{route('vendors.all',['p1'=>$vip->slug])}}" onclick="viewedResource({{$vip->id}})"> {{$vip->name}} </a></div>
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
	{{-- <div class="content-map">
		<div class="mapouter h-100">
			<div class="gmap_canvas h-100">
				<iframe class="cover" id="gmap_canvas" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
			</div>
		</div>
	</div>
	<div class="content-list">
		<div class="row -0">
			@for($i=1;$i < 5; $i++)
			<div class="col-12 col-lg-6">
				<div class="single-content">
					<div class="content-img"><img src="{{asset('vendor/img/hospital-02.jpg')}}" alt="img"></div>
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
	</div> --}}
</section>
@endsection

@section('script')
@endsection