<div class="container"> 
	<nav  class="navbar navbar-light navbar-expand-sm bg-light shadow-sm">
		@auth
		<a class="navbar-brand text-primary font-weight-bold" href="{{ route('home') }}">
			PruebaJorge
		</a>
		@endauth
		@guest
		<a class="navbar-brand text-primary font-weight-bold" href="{{ route('welcome') }}">
			PruebaJorge
		</a>
		@endguest
		<button class="navbar-toggler" type="button" 
			data-toggle="collapse" 
			data-target="#navbarSupportedContent" 
			aria-controls="navbarSupportedContent" 
			aria-expanded="false" 
			aria-label="{{ __('Toggle navigation') }}">
		    <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="nav nav-pills">
				@auth			
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}"><i class="fas fa-home"></i> Inicio</a>
                    </li>		
                    @if(auth()->user()->role == '1')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('users_home', $all = 'all') ? 'active' : '' }} {{ request()->routeIs('users_edit') ? 'active' : '' }}" href="{{ route('users_home', $all = 'all') }}"><i class="fas fa-users"></i> Usuarios</a>
                        </li>
					@endif
					<li class="nav-item">
						<a class="nav-link {{ request()->routeIs('movie_home') ? 'active' : '' }} {{ request()->routeIs('movie_edit') ? 'active' : '' }} {{ request()->routeIs('movie_trashme') ? 'active' : '' }} {{ request()->routeIs('movie_create') ? 'active' : '' }} {{ request()->routeIs('movie_show') ? 'active' : '' }}" href="{{ route('movie_home') }}"><i class="fas fa-film"></i> Peliculas</a>
					</li>
                @endauth
                
				@guest				
				<li class="nav-item">
					<a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}" href="{{ route('register') }}"><i class="fas fa-user-check"></i> Registrarme</a>
				</li>			
				@else
				<li class="nav-item">
					<a class="nav-link" 
					href="#" 
					onclick="event.preventDefault();
		         	document.getElementById('logout-form').submit();"
		         	><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
		        </li>
				@endguest
			</ul>
	    </div>
	</nav>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>