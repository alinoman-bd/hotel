@extends('layouts.master')

@section('master')

<div id="page-wrap">
  <header id="header">
    @section('topbar')
    @include('includes.topbar')
    @show
  </header>
  @yield('content')

  @include('includes.modal.cropper-main-modal')
  @include('includes.modal.cropper-alt-modal')
  @include('includes.home.footer')
</div>

@endsection