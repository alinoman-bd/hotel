{{-- @extends('layouts.app')
@section('content')
@include('includes.common.bradcrum',[
'title' => auth()->user()->name. ' '. auth()->user()->surname,
'description' => 'Your profile and booking history'
])

<section class="section-reservation-page bg-white">

    <div class="container">
        <div class="reservation-page">
            <div class="row">
                @include('includes.profile.leftside')
                @include('includes.profile.rightside')
            </div>
        </div>
    </div>
</section>
@endsection --}}

@extends('vendor.layouts.app')
@section('style')
@endsection

@section('content')
<section class="profile-section">
	<div class="row m-0">
		<div  class="col-12 col-md-4 col-lg-3 pl-0 pr-0 pr-md-3">
				@include('vendor.inc.sidebar.left-sidebar')
		</div>
		<div  class="col-12 col-md-8  col-lg-6 p-0">
			<div class="profile-content">
				<h4 class="head-tlt">Manage Booking</h4>
				@include('vendor.inc.profile.dashboard-section')
				<div class="resourceListing">
					@include('vendor.inc.profile.listing-table')
				</div>
				@include('vendor.inc.profile.payment-table')
				@include('vendor.inc.profile.message-section')
				@include('vendor.inc.profile.review-section')
			</div>
		</div>
		<div  class="col-12 col-lg-3 pr-0 pl-0 pl-md-3">
			@include('vendor.inc.sidebar.notification')
		</div>
	</div>
</section>
@endsection
@section('script')
<script src="{{asset('vendor/js/js_r/profile.js')}}"></script>
@endsection