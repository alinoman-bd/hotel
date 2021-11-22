<div class="left-sidebar-menu text-center">
	<ul>
		<li>
			<a href="#" class="active"><img src="{{asset('vendor/img/menu-i.png')}}" alt="img"> My Dashboard</a>
		</li>
		<li>
			<a href="#"><img src="{{asset('vendor/img/add-icon.png')}}" alt="img">  All Listing</a>
		</li>
		<li>
			<a href="#"><img src="{{asset('vendor/img/add-icon1.png')}}" alt="img">  Add New Listing</a>
		</li>
		<li>
			<a href="#"><img src="{{asset('vendor/img/msg-icon.png')}}" alt="img">  Messages(12)</a>
		</li>
		<li>
			<a href="#"><img src="{{asset('vendor/img/my-pro-icon.png')}}" alt="img"> My Profile</a>
		</li>
		<li>
			<a href="#"><img src="{{asset('vendor/img/setting-icon.png')}}" alt="img"> Setting</a>
		</li>
		<li>
			@if(Session::has('superadmin'))
				<a href="{{route('admin.superadmin.logout')}}"><img src="{{asset('vendor/img/log-out-icon.png')}}" alt="img">Logout</a>
            @else 
            	<a href="{{url('logout')}}" onclick="event.preventDefault();document.getElementById('frm-logout').submit();"><img src="{{asset('vendor/img/log-out-icon.png')}}" alt="img">  Logout</a>
					<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
            		</form>
            @endif
 
		</li>
	</ul>
</div>