@extends('vendor.layouts.app')
@section('style')
@endsection

@section('content')
<section class="information-section">
	<div class="back-ul">
		<ul>
			<li><a href="#">Home</a> -</li>
			<li class="active">Post A Add</li>
		</ul>
	</div>
	<div class="row m-0">
		<div  class="col-12 col-lg-9 pl-0">
			<div class="form-cnt">
				<div class="form-title">
					<h2>Information</h2>
				</div>
				<div class="all-form">
					<form action="{{url('add-event')}}" method="post" enctype="multipart/form-data" id="event-form">
						@csrf
						@include('vendor.inc.form.event-form.event')
						<div class="form-group mt-3 text-right">
							<button type="submit" class="btn ctm-btn inf-brn">Submit Now!</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div  class="col-12 col-lg-3 pr-0">
			@include('vendor.inc.ad')
		</div>
	</div>
</section>
@endsection
@section('script')
<script src="{{asset('vendor/js/js_r/event.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAnMJd489Qa_hRJXPon9VFHHFpGchq8Ib4"></script>
<script>
	window.csrf_token = '<?= csrf_token() ?>';
</script>
@endsection