<div id="header">
	<div class="container">
			
		<!-- Logo -->
			<div id="logo">
				<h1 style="margin-bottom: 5px;"><a href="{{route('home')}}">Share2gather</a></h1>
				<span style="padding-top:30px !important;">Wadahnya</span>
			</div>
		
		<!-- Nav -->
			<nav id="nav">
				<ul>
					<li class="{{(Route::currentRouteName()=='home')?'active':''}}"><a href="{{route('home')}}">Beranda</a></li>
					<li class="{{(Route::currentRouteName()=='article')?'active':''}}"><a href="{{route('article')}}">Artikel</a></li>
					
					@if(Auth::check())
					<li class="login">
						<div class="dropdown">
						  <a class="dropdown-toggle" type="button" data-toggle="dropdown">{{Auth::user()->name}}
						  <span class="caret"></span></a>
						  <ul class="dropdown-menu">
						  	@if(Auth::user()->admin == 0)
						    <li><a href="{{route('profile')}}">Profil</a></li>
						    @else
						    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
						    @endif
						    <li><a href="{{url('auth/logout')}}">Logout</a></li>
						  </ul>
						</div>
					</li>
					@else
					<li class="login"><a href="{{url('auth/login')}}">Masuk</a></li>
					@endif
				</ul>
			</nav>

	</div>
</div>