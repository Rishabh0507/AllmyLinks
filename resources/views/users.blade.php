@extends('layouts.app')

@section('content')
@include('nav')
<div class="user_container">
	<div class="fix_container">
		<form action="{{route('search-users')}}" method="GET">
			{{-- @csrf --}}
			<div class="row">
				<div class="col-12">
					<div class="user_wrapper_title">
						<h2>Search The Linkkle Users.</h2>
						<form method="post">
							<div class="inputgroup">
							<input type="search" name="search_by" value="{{request('search_by')}}" placeholder="Search" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</form>
		<div class="row">
			@foreach ($getUsersList as $item)
				<div class="col-md-3 col-xs-6 plr-20">
					<a href="{{route('get-this-user-profile', $item->user_name)}}">
					<div class="user_grid_itums">
						<div class="user_grid_box">
							<div class="user_figure">
							<img src="media/{{$item->profile_image}}" alt="profile Pic" />
							</div>
							<div class="user_content">
							<h3>{{"@".$item->user_name}}</h3>
							</div>
						</div>
					</div>
				</a>	
				</div>
			@endforeach
		</div>
	</div>
</div>	




<!-- footer section -->
<footer class="page_footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page_footer_logo">
          <div class="page_footer_wrapper">
            <a href="index.html"><img src="media/logo_2.png" /></a>
          </div>
        </div>
        <div class="footer_wrapp">
          <ul>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Help & Contact</a></li>
            <li><a href="#">AllMyLinks</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
@endsection