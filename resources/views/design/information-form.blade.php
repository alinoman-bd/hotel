@extends('design.layouts.app')
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
					@include('design.inc.form.single-form1')
					@include('design.inc.form.single-form2')
					@include('design.inc.form.single-form3')
					<div class="form-group mt-3 text-right">
						<button type="submit" class="btn ctm-btn inf-brn">Submit Now!</button>
					</div>
				</div>
			</div>
		</div>
		<div  class="col-12 col-lg-3 pr-0">
			@include('design.inc.ad')
		</div>
	</div>
</section>
@endsection
@section('script')
<script>
	function setValue(e,val) {
		var value = val;
		$(e.target).parent(".ctm-option-box").siblings("input").val(value);
	}
</script>
@endsection