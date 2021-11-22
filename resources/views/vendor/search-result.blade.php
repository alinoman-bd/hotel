@extends('vendor.layouts.app')
@section('meta')
	@php
		$meta = Helper::seoMeta(@$items);
	@endphp
	<title>{{@$meta['title']}}</title>
	<meta name="description" content="{{@$meta['description']}}">
  	<meta name="keywords" content="{{@$meta['keyword']}}">
@endsection

@section('style')
	<style type="text/css">
		.pagination{
			display: inline-flex;
		}
	</style>
@endsection

@section('content')
<section class="search-section">
	<div class="row m-0">
		<div  class="col-12 col-md-3 p-0">
			@include('vendor.inc.filter-form')
		</div>
		<div  class="col-12 col-md-9 p-0">
			<div class="search-result-cnt"> 
				@include('vendor.inc.search-result.search-result-content')
			</div>
		</div>
	</div>
	<div class="relative-content mt-5">
		@include('vendor.inc.relative-content')
	</div>
</section>
@endsection
@section('script')
@endsection