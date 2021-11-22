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

  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- CSS LIBRARY -->
  <link href="{{asset('design/fontawesome/css/fontawesome-all.min.css')}}" rel="stylesheet"  crossorigin="anonymous"> 
  <link href="{{asset('design/css/line-awesome.min.css')}}" rel="stylesheet"  crossorigin="anonymous"> 
  <link href="{{asset('design/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" crossorigin="anonymous"> 
  <link rel="stylesheet" href="{{ asset('design/swiper/css/swiper.css') }}">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- menu customization -->
  <!-- line icons -->
  <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">  
  <!-- for destop -->
  <!-- custom css-->
  <link href="{{asset('design/css/custom.css')}}" rel="stylesheet">
  @yield('style')
</head>

<body>
  <div class="main-wrapper">
    @include('design.inc.header')
    @yield('content')
    @include('design.inc.footer')
    @include('design.inc.form.log-form')
  </div>
  <script src="{{asset('design/js/jquery-3.2.1.min.js')}}"  ></script> 
  <script src="{{asset('design/swiper/js/swiper.js')}}"></script>
  <script src="{{asset('design/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('design/js/custom.js')}}"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  @yield('script')
</body>

</html>