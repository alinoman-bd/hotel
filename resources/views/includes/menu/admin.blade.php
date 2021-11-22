<nav class="header_menu">
    <ul class="menu">
        <li class=""><a href="{{ route('vendors.all') }}">Home</a></li>

        <li class="current-menu-item"><a href="{{ route('setting.admin.room') }}">Rooms</a></li>

        <li class="" class=""><a href="{{ url('user/profile/'.auth()->user()->id) }}">Profile</a></li>

        {{-- <li class="{{ (request()->is('admin/setting/user-query')) ? 'current-menu-item' : '' }}" class=""><a href="{{ route('setting.admin.contactQuery') }}">@lang('frontend.menu.contact.q')</a></li> --}}
        {{-- <li class="{{ (request()->is('/') || request()->is('rooms') || request()->is('about-us') || request()->is('attractions') || request()->is('contact-us') || request()->is('gallery')) ? 'current-menu-item' : '' }}">
            <a href="#">@lang('frontend.menu.pages')<span class="fa fa-caret-down"></span></a>
            <ul class="sub-menu">
                <li class="{{ (request()->is('/')) ? 'current-menu-item' : '' }}"><a href="{{url('/')}}">@lang('frontend.menu.home')</a></li>
                <li class="{{ (request()->is('rooms')) ? 'current-menu-item' : '' }}"><a href="{{url('/rooms')}}">@lang('frontend.menu.room')</a></li>
                <li class="{{ (request()->is('attractions')) ? 'current-menu-item' : '' }}"><a href="{{url('/attractions')}}">@lang('frontend.menu.attractions')</a></li>
                <li class="{{ (request()->is('about-us')) ? 'current-menu-item' : '' }}"><a href="{{url('/about-us')}}">@lang('frontend.menu.about')</a></li>
                <li class="{{ (request()->is('gallery')) ? 'current-menu-item' : '' }}"><a href="{{url('/gallery')}}">@lang('frontend.menu.gallery')</a></li>
                <li class="{{ (request()->is('contact-us')) ? 'current-menu-item' : '' }}"><a href="{{url('/contact-us')}}">@lang('frontend.menu.contact')</a></li>
                <li class="{{ (request()->is('/')) ? 'current-menu-item' : '' }}"><a href="{{url('/elements')}}">@lang('frontend.menu.elements')</a></li>
            </ul>
        </li> --}}

        {{-- <li class="{{ ((request()->segment(2) == 'setting')) ? 'current-menu-item' : '' }}">
            <a href="#">@lang('frontend.menu.settings') <span class="fa fa-caret-down"></span></a>
            <ul class="sub-menu">
                <li class="{{ ((request()->segment(3) == 'sliders')) ? 'current-menu-item' : '' }}"><a href="{{ route('setting.admin.slider') }}">@lang('frontend.menu.slider')</a></li>
                <li class="{{ ((request()->segment(3) == 'rooms')) ? 'current-menu-item' : '' }}"><a href="{{ route('setting.admin.room') }}">@lang('frontend.menu.room')</a></li>
                <li class="{{ ((request()->segment(3) == 'about')) ? 'current-menu-item' : '' }}"><a href="{{ route('setting.admin.about') }}">@lang('frontend.menu.about')</a></li>
                <li class="{{ ((request()->segment(3) == 'gallery')) ? 'current-menu-item' : '' }}"><a href="{{ route('setting.admin.gallery') }}">@lang('frontend.menu.gallery')</a></li>
                <li class="{{ ((request()->segment(3) == 'attractions')) ? 'current-menu-item' : '' }}"><a href="{{ route('setting.admin.attractions') }}">@lang('frontend.menu.attractions')</a></li>
                <li class="{{ ((request()->segment(3) == 'contact')) ? 'current-menu-item' : '' }}"><a href="{{ route('setting.admin.contact') }}">@lang('frontend.menu.contact')</a></li>
                <li class="{{ ((request()->segment(3) == 'social-setting')) ? 'current-menu-item' : '' }}"><a href="{{ route('setting.admin.socialSetting') }}">@lang('frontend.menu.social')</a></li>
                <li class="{{ ((request()->segment(3) == 'logo-setting')) ? 'current-menu-item' : '' }}"><a href="{{ route('setting.admin.logoSetting') }}">@lang('frontend.menu.logo')</a></li>
            </ul>
        </li> --}}
    </ul>
</nav>