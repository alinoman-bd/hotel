@extends('vendor.layouts.app')
@section('style')
@endsection

@section('content')
@if(count($resources) > 0)
	<section class="content-list-section">
		<div class="cnt-l-tlt text-center"><span>-Resources-</span> </div>
		<div class="content-list">
			<div class="row -0">
				@foreach ($resources as $resource)
					@php
						$rcName = Helper::resourceName( $resource->name );
					@endphp
					<div class="col-12 col-lg-12">
						<div class="single-content">
							<div class="content-img"><img src="{{asset('vendor/img/hospital-02.jpg')}}" alt="img"></div>
							<div class="single-content-txt">
								<div class="rating-p">50</div>
								<div class="single-content-tlt"><a href="{{ url('vendor/resource/'.$rcName.'/'.$resource->id)}}">{{ $resource->name }}</a></div>
								<div class="shop-name">{{ $resource->short_title }}</div>
								<div class="shop-add">{{ $resource->address }}</div>
							</div>

						</div>
					</div>
				@endforeach
			</div>
			<div class="text-center">
				{{ $resources->appends(request()->input())->links() }}
			</div>
		</div>
		
	</section>
@endif
@endsection

@section('script')
@endsection