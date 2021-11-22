@extends('design.layouts.app')
@section('style')
@endsection

@section('content')
<section class="profile-section">
	<div class="row m-0">
		<div  class="col-12 col-md-4 col-lg-3 pl-0 pr-0 pr-lg-3">
				@include('design.inc.sidebar.left-sidebar')
		</div>
		<div  class="col-12 col-md-8  col-lg-6 p-0">
			<div class="profile-content">
				<h4 class="head-tlt">Manage Booking</h4>
				@include('design.inc.profile.dashboard-section')
				@include('design.inc.profile.listing-table')
				@include('design.inc.profile.payment-table')
				@include('design.inc.profile.message-section')
				@include('design.inc.profile.review-section')
			</div>
		</div>
		<div  class="col-12 col-lg-3 pr-0 pl-0 pl-md-3">
			@include('design.inc.sidebar.notification')
		</div>
	</div>
</section>
@endsection
@section('script')
@endsection