@extends('vendor.layouts.app')
@section('style')
	<style type="text/css">
		.modal-header .close {
		    position: static !important;
		}
	</style>
@endsection

@section('content')
<section class="information-section">
	<div class="back-ul">
		{{-- <ul>
			<li><a href="#">Home</a> -</li>
			<li class="active">Post A Add</li>
		</ul> --}}
	</div>
	<div class="row m-0">
		<div  class="col-12 col-lg-9 pl-0 pr-0 pr-lg-3">
			<div class="form-cnt">
				<div class="form-title">
					<h2>Information</h2>
				</div>
				<div class="all-form">
					<form action="{{Route('apartment.add')}}" method="post" enctype="multipart/form-data" id="apartment-form">
						@csrf
						@include('vendor.inc.form.apartment-form.apartment')
						<div class="form-group mt-3 text-right">
							<button type="submit" class="btn ctm-btn inf-brn">Submit Now!</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div  class="col-12 col-lg-3 pr-0 pl-0 pl-lg-3">
			@include('vendor.inc.ad')
		</div>
	</div> 
</section>
@endsection
@section('script')
<script src="{{asset('vendor/js/js_r/apartment.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAnMJd489Qa_hRJXPon9VFHHFpGchq8Ib4"></script>
@endsection