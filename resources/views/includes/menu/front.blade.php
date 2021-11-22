<nav class="header_menu">
    <ul class="menu"> 
        <li class="{{ (request()->is('/')) ? 'current-menu-item' : '' }}"><a href="{{url('/')}}">@lang('frontend.menu.home')</a></li>
        <li class="{{ (request()->is('rooms')) ? 'current-menu-item' : '' }}"><a href="{{url('/rooms')}}">@lang('frontend.menu.room')</a></li>
        <li class="{{ (request()->is('attractions')) ? 'current-menu-item' : '' }}"><a href="{{url('/attractions')}}">@lang('frontend.menu.attractions')</a></li>
        <li class="{{ (request()->is('about-us')) ? 'current-menu-item' : '' }}"><a href="{{url('/about-us')}}">@lang('frontend.menu.about')</a></li>
        <li class="{{ (request()->is('gallery')) ? 'current-menu-item' : '' }}"><a href="{{url('/gallery')}}">@lang('frontend.menu.gallery')</a></li>
        <li class="{{ (request()->is('contact-us')) ? 'current-menu-item' : '' }}"><a href="{{url('/contact-us')}}">@lang('frontend.menu.contact')</a></li>
        <li class="{{ (request()->is('booking/checkout')) ? 'current-menu-item' : '' }}"><a href="{{route('checkout')}}">@lang('frontend.menu.checkout')</a></li>
    </ul>
</nav>