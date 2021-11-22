@extends('design.layouts.app')
@section('style')
@endsection

@section('content')
<section class="search-section">
	<div class="row m-0">
		<div  class="col-12 col-md-3 p-0">
			@include('design.inc.filter-form')
		</div>
		<div  class="col-12 col-md-9 p-0">
			@include('design.inc.search-result.search-result-content')
		</div>
	</div>
	<div class="relative-content mt-5">
		@include('design.inc.relative-content')
	</div>
</section>
@endsection
@section('script')
@endsection