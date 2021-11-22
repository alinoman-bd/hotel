@extends('layouts.master')

@section('master')

<section class="section-404 bg-5">
    <div class="awe-overlay"></div>
    <div class="page-404 text-center">
        <a href=""><img src="images/logo-footer.png" alt=""></a>
        <h1>@lang('frontend.error.room') <span>404</span></h1>
        <h6>@lang('frontend.error.h6')</h6>
        <p>@lang('frontend.error.p')
            <a href="#">@lang('frontend.error.the.below').</a></p>

        <div class="search-404">
            <input type="text" class="filed-text" placeholder="@lang('frontend.error.search.page')">
            <button class="awe-btn awe-btn-12">@lang('frontend.error.search')</button>
        </div>

        <p>@lang('frontend.error.go.to') <a href="/">@lang('frontend.error.home.page')</a> </p>
    </div>

</section>

@endsection