@extends('design.layouts.app')
@section('style')
@endsection

@section('content')
<section class="information-section fag-section">
	<!-- <div class="back-ul">
		<ul>
			<li><a href="#">Home</a> -</li>
			<li class="active">Post A Add</li>
		</ul>
	</div> -->
	<div class="row m-0">
		<div  class="col-12 col-lg-9 pl-0">
			<div class="form-cnt">
				<div class="form-title">
					<h2>Faq</h2>
				</div>
				@include('design.inc.faq.faq-cnt')

				<div class="contact-txt text-center p-3"><span>no answer tate contact</span></div>

				@include('design.inc.faq.faq-form')
				
			</div>
		</div>

		<div  class="col-12 col-lg-3 pr-0">
			@include('design.inc.ad')
		</div>
	</div>
</section>
@endsection
@section('script')
@endsection