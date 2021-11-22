<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- TITLE -->
  <title>@yield('title')</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- GOOGLE FONT -->
  <link href='http://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700' rel='stylesheet'
  type='text/css'>

  <!-- CSS LIBRARY -->
  <link href="{{asset('vendor/fontawesome/css/fontawesome-all.min.css')}}" rel="stylesheet"  crossorigin="anonymous"> 
  <link href="{{asset('vendor/css/line-awesome.min.css')}}" rel="stylesheet"  crossorigin="anonymous"> 
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" crossorigin="anonymous"> 
  <link rel="stylesheet" href="{{ asset('vendor/swiper/css/swiper.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
  <!-- menu customization -->
  <!-- line icons -->
  <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet"> 

  <link rel="stylesheet" type="text/css" href="{{asset('cropper/cropper.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/cropper.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <link href="{{asset('vendor/css/loader.css')}}" rel="stylesheet"> 
  <!-- for destop -->
  <!-- custom css-->
  <link href="{{asset('vendor/css/custom.css')}}" rel="stylesheet">
  @yield('style')
</head>

<body>
  @include('superadmin.header')
  @yield('content')
  @include('superadmin.footer')
  <script src="{{asset('vendor/js/jquery-3.2.1.min.js')}}"  ></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
  <script src="{{asset('vendor/swiper/js/swiper.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/cropper.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/imagepreview.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/custom-cropper.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  <script src="{{asset('vendor/toastr/toastr.min.js')}}"></script>
  <script src="{{asset('vendor/js/custom.js')}}"></script>
  <script src="{{asset('vendor/js/js_r/global.js')}}"></script>
  @include('vendor.inc.global_url')
  @include('superadmin.include.global-js-variable')
  @yield('script')
</body>

</html>