<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
    @yield('meta')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700' rel='stylesheet'
    type='text/css'>

    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/lib/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/lib/font-lotusicon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/lib/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/lib/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/lib/jquery-ui.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/lib/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/lib/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/lib/bootstrap-select.min.css')}}">

    <!-- MAIN STYLE -->

    <link rel="stylesheet" type="text/css" href="{{asset('cropper/cropper.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/cropper.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">

    <!-- include summernote css/js -->
    <!-- include libraries(jQuery, bootstrap) -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="{{asset('js/lib/jquery.min.js')}}"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

    <link href="{{asset('css/lib/summernote.min.css')}}" rel="stylesheet">
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js')}}"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js')}}"></script>
    <![endif]-->

    {{-- rasel css --}}

    <link rel="stylesheet" type="text/css" href="{{asset('css/lib_r/css/style.css')}}">

</head>

<body>
    <div id="snackbar">Some text some message..</div>
    <!-- PRELOADER -->
    <div id="preloader">
        <span class="preloader-dot"></span>
    </div>
    <!-- END / PRELOADER -->

    <!-- PAGE WRAP -->
    @yield('master')
    <!-- LOAD JQUERY -->
    <script type="text/javascript" src="{{asset('js/lib/jquery-1.11.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/lib/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/lib/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/lib/bootstrap-select.js')}}"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;signed_in=true')}}"></script> --}}

    @include('layouts.global-variable')
    <script type="text/javascript" src="{{asset('js/lib/isotope.pkgd.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/lib/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/lib/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('cropper/cropper.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/lib/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/lib/jquery.appear.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/lib/jquery.countTo.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/lib/jquery.countdown.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/lib/jquery.parallax-1.1.3.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/lib/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/lib/SmoothScroll.js')}}"></script>
    <!-- validate -->
    <script type="text/javascript" src="{{asset('js/lib/jquery.form.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/lib/jquery.validate.min.js')}}"></script>
    <!-- Custom jQuery -->
    <script type="text/javascript" src="{{asset('js/wichSlider.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/scripts.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/imagepreview.js')}}"></script>
    @yield('setGlobalVariable')
    @yield('setGlobalVariable1')
    <script type="text/javascript" src="{{asset('js/booking.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/custom-cropper.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/developer.js')}}"></script>

 
    <script type="text/javascript" src="{{asset('js/developer.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{asset('js/cropper.js')}}"></script>
    
   {{-- rasel js --}}
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="{{asset('vendor/toastr/toastr.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/lib_r/js/script.js')}}"></script> 
    
<script type="text/javascript">
    $(function(){
        var container = $('.container-d'), inputFile = $('#file'), img, btn, txt = 'Browse picture', txtAfter = 'Browse another pic';

        if(!container.find('#upload').length){
            container.find('.input').append('<input type="button" value="'+txt+'" id="upload">');
            btn = $('#upload');
            container.append('<img src="" class="hidden" alt="Uploaded file" id="uploadImg" width="100">');
            img = $('#uploadImg');
        }

        btn.on('click', function(){
            img.animate({opacity: 0}, 300);
            inputFile.click();
        });

        inputFile.on('change', function(e){
            container.find('label').html( inputFile.val() );

            var i = 0;
            for(i; i < e.originalEvent.srcElement.files.length; i++) {
                var file = e.originalEvent.srcElement.files[i], 
                reader = new FileReader();

                reader.onloadend = function(){
                    img.attr('src', reader.result).animate({opacity: 1}, 700);
                }
                reader.readAsDataURL(file);
                img.removeClass('hidden');
            }

            btn.val( txtAfter );
        });
    });
</script>
</body>

</html>