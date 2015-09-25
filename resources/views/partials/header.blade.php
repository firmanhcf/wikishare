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
					<li class="login"><a href="{{url('auth/login')}}">Masuk</a></li>
				</ul>
			</nav>

	</div>
</div>