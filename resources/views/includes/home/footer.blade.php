<footer id="footer">

    <!-- FOOTER TOP -->
    <div class="footer_top">
        <div class="container">
            <div class="row">

                <!-- WIDGET MAILCHIMP -->
                <div class="col-lg-9">
                    <div class="mailchimp">
                        <h4>@lang('frontend.footer.h4')</h4>
                        <div class="mailchimp-form">
                            <form action="#" method="POST">
                                <input type="text" name="email" placeholder="@lang('frontend.footer.email')" class="input-text">
                                <button class="awe-btn">@lang('frontend.footer.button')</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END / WIDGET MAILCHIMP -->

                <!-- WIDGET SOCIAL -->
                <div class="col-lg-3">
                    <div class="social">
                        <div class="social-content">
                            <a href="{{$social ? $social->p_url : ''}}"><i class="fa fa-pinterest"></i></a>
                            <a href="{{$social ? $social->fb_url : ''}}"><i class="fa fa-facebook"></i></a>
                            <a href="{{$social ? $social->twit_ulr : ''}}"><i class="fa fa-twitter"></i></a>
                            <a href="{{$social ? $social->google_url : ''}}"><i class="fa fa-google-plus"></i></a>
                            <a href="{{$social ? $social->instra_url : ''}}"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <!-- END / WIDGET SOCIAL -->

            </div>
        </div>
    </div>
    <!-- END / FOOTER TOP -->

    <!-- FOOTER CENTER -->
    <div class="footer_center">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-lg-5">
                    <div class="widget widget_logo">
                        <div class="widget-logo">
                            <div class="img">
                                <a href="#">
                                    @if($logo)
                                    <img src="{{asset($logo->logo_path)}}" alt="">
                                    @else
                                    <span>@lang('frontend.footer.no')</span>
                                    @endif
                                </a>
                            </div>
                            <div class="text">
                                @if($contacts)
                                <p><i class="lotus-icon-location"></i>{{$contacts->contact_address}} </p>
                                <p><i class="lotus-icon-phone"></i> {{$contacts->contact_phone}}</p>
                                <p><i class="fa fa-envelope-o"></i> <a href="mailto:{{$contacts->contact_mail}}">{{$contacts->contact_mail}}</a></p>
                                @else
                                <span class="text-light" style="color: #fff ">@lang('frontend.footer.need')</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">@lang('frontend.footer.ul.h4')</h4>
                        <ul>
                         <li><a href="{{url('/rooms')}}">@lang('frontend.menu.room')</a></li>
                         <li><a href="{{url('/attractions')}}">@lang('frontend.menu.attractions')</a></li>
                         <li><a href="{{url('/gallery')}}">@lang('frontend.menu.gallery')</a></li><li><a href="{{route('checkout')}}">@lang('frontend.menu.checkout')</a></li>
                     </ul>
                 </div>
             </div>

             <div class="col-xs-4 col-lg-2">
                <div class="widget">
                    <h4 class="widget-title">@lang('frontend.menu.about')</h4>
                    <ul>
                     <li><a href="{{url('/about-us')}}">@lang('frontend.menu.about')</a></li>
                     <li><a href="{{url('/contact-us')}}">@lang('frontend.menu.contact')</a></li>
                     <li><a href="{{url('/elements')}}">@lang('frontend.menu.elements')</a></li>
                 </ul>
             </div>
         </div>

         <div class="col-xs-4 col-lg-3">
            <div class="widget widget_tripadvisor">
                <h4 class="widget-title">@lang('frontend.footer.bottom.h4')</h4>
                <div class="tripadvisor">
                    <p>@lang('frontend.footer.p')</p>
                    <img src="{{asset('images/tripadvisor.png')}}" alt="">
                    <span class="tripadvisor-circle">
                        <i></i>
                        <i></i>
                        <i></i>
                        <i></i>
                        <i class="part"></i>
                    </span>
                </div>
            </div>
        </div>


    </div>
</div>
</div>
<!-- END / FOOTER CENTER -->

<!-- FOOTER BOTTOM -->
<div class="footer_bottom">
    <div class="container">
        <p>&copy; @lang('frontend.footer.copyright')</p>
    </div>
</div>
<!-- END / FOOTER BOTTOM -->

</footer>