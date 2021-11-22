{{-- <div class="header_top">
    <div class="container">
        @if($contacts)
        <div class="header_left float-left">
            <span><i class="fa fa-envelope-o"></i> {{$contacts->contact_mail}}</span>
            <span><i class="lotus-icon-location"></i> {{$contacts->contact_address}}</span>
            <span><i class="lotus-icon-phone"></i> {{$contacts->contact_phone}}</span>
        </div>
        @endif
        <div class="header_right float-right">

            <span class="login-register">
                @if(Auth::check())
                <a href="{{route('profile', ['user' => Auth::user()->id])}}">{{Auth::user()->name}}</a>
                {{Auth::user()->name}}:
                <a href="{{url('logout')}}"
                    onclick="event.preventDefault();document.getElementById('frm-logout').submit();">Logout</a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @else
                <a href="{{route('login')}}">Login</a>
                <a href="{{url('register')}}">register</a>
                @endif
            </span>

            <div class="dropdown currency">
                <span>USD <i class="fa fa"></i></span>
                <ul>
                    <li class="active"><a href="#">USD</a></li>
                    <li><a href="#">EUR</a></li>
                </ul>
            </div>

            <div class="dropdown language">
                <span>{{request()->session()->get('ln') == 'lt' ? 'LT' : 'ENG'}}</span>

                <ul>
                    <li class="{{request()->session()->get('ln') == 'lt' ? 'active' : ''}}"><a
                            href="{{route('language', 'lt')}}">LT</a></li>
                    <li class="{{request()->session()->get('ln') == 'en' ? 'active' : ''}}"><a
                            href="{{route('language', 'en')}}">ENG</a></li>
                </ul>
            </div>

        </div>
    </div>
</div> --}}
<!-- END / HEADER TOP -->

<!-- HEADER LOGO & MENU -->
<div class="header_content" id="header_content">

    <div class="container">
        <!-- HEADER LOGO -->
        <div class="header_logo">
            <a href="/">
                @if($logo)
                <img src="{{asset($logo->logo_path)}}" alt="">
                @else
                <span>No logo set</span>
                @endif
            </a>
        </div>
        <!-- END / HEADER LOGO -->

        <!-- HEADER MENU -->
        @if (empty(Auth::user()))
        @include('includes.menu.front')
        @else
        @if (Auth::user()->is_admin)
        @include('includes.menu.admin')
        @else
        @include('includes.menu.front')
        @endif
        @endif
        <!-- END / HEADER MENU -->

        <!-- MENU BAR -->
        <span class="menu-bars">
            <span></span>
        </span>
        <!-- END / MENU BAR -->

    </div>
</div>