@php
$total = count($viewed);
$block = ceil($total / 4);
$counter = 0;
@endphp
@if(count($viewed) > 0)
<div class="container-fluid p-0">
	<div class="row">
		<div class="col-md-12">
			<h2><b>Recently Viewed</b></h2>
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
				<!-- Carousel indicators -->
				<ol class="carousel-indicators">
					@for($i = 0; $i < $block; $i++)
					<li data-target="#myCarousel" data-slide-to="{{$i}}" class="@if($i==1) active @endif"></li>
					@endfor	
				</ol>   
				<!-- Wrapper for carousel items -->
				<div class="carousel-inner">
					@for($i = 0; $i < $block; $i++)
					<div class="carousel-item @if($i == 0) active @endif">
						<div class="row">
							@for($j = 1; $j <= 4; $j++)
							@if(array_key_exists($counter, $viewed))
							@php
							$rcName = Helper::resourceName( $viewed[$counter]['name'] );
							@endphp
							<div class="col-sm-6 col-lg-3">
								<div class="thumb-wrapper mb-3 mb-lg-0">
									<div class="img-box">
										<img src="{{asset($viewed[$counter]['image'])}}" class="img-fluid" alt="">
									</div>
									<div class="thumb-content px-0">
										<div class="single-content-tlt"> <a href="{{route('vendors.all',['p1'=>$viewed[$counter]['slug']])}}">"{{$viewed[$counter]['name']}}"</a></div>
										<div class="shop-name">{{$viewed[$counter]['short_title']}}</div>
										<div class="shop-add">{{$viewed[$counter]['address']}}</div>
										<div class="shop-add">{{$viewed[$counter]['phone']}}</div>
									</div>						
								</div>
							</div>
							@php
							$counter++;
							@endphp
							@endif	
							@endfor
						</div>
					</div>
					@endfor
				</div>
				<!-- Carousel controls -->
				<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a class="carousel-control-next" href="#myCarousel" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
		</div>
	</div>
	@endif