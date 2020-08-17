<div class="page_navigation">
	<div class="inner_navigation">
		<div class="logo_wrapper">
			<div class="logo_inner_wrapper">
        <a href="#"><img src="media/logo_2.png" alt="Logo" /></a>
			</div>
		</div>
		<div class="inner_nav">
			<div class="hidden_toggle">
				<span class="hidden_toggle_icon"><i class="fas fa-bars"></i></span>
			</div>
			<ul class="inner_nav_wrapper">
                <li><a href="{{route('show-price')}}">Pricing</a></li>
				<li><a href="{{route('get-users')}}">Users</a></li>

				@guest
                    <li>
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
				@else
					<li><a href="{{route('get-profile')}}">Profile</a></li>
				<li>
					<a href="{{ route('logout') }}" onclick="event.preventDefault();
					document.getElementById('logout-form').submit();" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ "Logout (". Auth::user()->name. ")"  }} <span class="caret"></span>
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>	
				</li>
			@endguest
				{{-- <li><a href="users.html">Users</a></li>
				<li><a href="profile.html">Profile</a></li> --}}
			</ul>
		</div>
	</div>
</div>