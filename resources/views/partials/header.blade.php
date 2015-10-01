<div id="header">
	<div class="container">
			
		<!-- Logo -->
			<div id="logo">
				<h1><a href="{{route('home')}}">WIKI SHARE</a></h1>
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
						    <li><a href="{{route('profile')}}">Profil</a></li>
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