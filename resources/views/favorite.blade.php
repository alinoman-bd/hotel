@extends('vendor.layouts.app')
@section('style')
	<style type="text/css">
		.heart-fav{
			color:red;
		}
	</style>
@endsection

@section('content')
<section class="search-section">
	<div class="row m-0">
		<div  class="col-12 col-md-12 p-0">
				@include('vendor.inc.favorite-content')
		</div>
	</div>
	<div class="relative-content">
		<div class="content-list">
			<div class="row -0">
				@if(count($vip1) > 0)
					@foreach ($vip1 as $vip)
						
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
	</div>
</section>
@endsection
@section('script')
@endsection