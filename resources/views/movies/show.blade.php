@extends('layouts.custom')
@section('title', 'ver Pelicula')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="card shadow bg-light rounded">
			  <div class="card-body">
					<h3 class="text-secondary text-center">Información</h3>
				  	<hr>
				    <div class="py-1">
				    	<span class="text-primary"><i class="fas fa-user"></i> Nombre de la pelicula:</span>
				    	<span class="text-secondary mb-2">{{ $movie->title }}</span><br>
				    	<span class="text-primary"><i class="fas fa-user-shield"></i> Sinopsis de la pelicula:</span>
				    	<span class="text-secondary mb-2">{!! htmlspecialchars_decode($movie->synopsis) !!}</span><br>
				    	<span class="text-primary"><i class="far fa-calendar-alt"></i> Fecha de registro:</span>
				    	<span class="text-secondary mb-2">{{ $movie->created_at }} {{ $movie->created_at->diffForHumans() }}</span><br>
				    	<span class="text-primary"><i class="fas fa-ticket-alt"></i> Año de la pelicula:</span>
                        <span class="text-secondary mb-2">{{ $movie->year }}</span><br>
                        <div class="mt-2">
                            <a class="btn btn-primary btn-lg float-right" href="{{ route('movie_home') }}">Ir Atras</a>	  
                        </div>
				    </div>			  	
			  </div>
			</div>
        </div>
		<div class="col-md-4">
			<div class="card shadow bg-light rounded">
                <div class="card-body">
					<h3 class="text-secondary text-center">Información del usuario propietario de la pelicula</h3>
				  	<hr>
				    <div class="py-1">
				    	<span class="text-primary"><i class="fas fa-user"></i> Nombre:</span>
				    	<span class="text-secondary mb-2">{{ $user->name }}</span><br>
				    	<span class="text-primary"><i class="fas fa-user-shield"></i> Nick del usuario:</span>
				    	<span class="text-secondary mb-2">{{ $user->nickname }}</span><br>
				    	<span class="text-primary"><i class="far fa-calendar-alt"></i> Fecha de registro a la plataforma:</span>
				    	<span class="text-secondary mb-2">{{ $user->created_at }} {{ $user->created_at->diffForHumans() }}</span><br>
				    	<span class="text-primary"><i class="fas fa-user-tie"></i> Role de usuario:</span>
                        <span class="text-secondary mb-2">{{ getRoleUserArray(null, $user->role) }}</span><br>		  	 
				    </div>			  	
			  </div>
			</div>
        </div>
	</div>
</div>
@endsection