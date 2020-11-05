@extends('layouts.custom')
@section('title', 'Peliculas Borradas')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="d-flex justify-content-between align-items-center mb-2">
				<div>
					<h1 class="text-primary">Peliculas Borradas</h1>
                </div>
                @if(auth()->user()->role == '1')
                    <div class="dropdown">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-filter"></i> Filtrar
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('movie_home') }}"><i class="fas fa-stream"></i> Todas las peliculas</a>
                            <a class="dropdown-item" href="{{ url('/movies/trashme') }}"><i class="fas fa-heart-broken"></i>Tus Peliculas Eliminadas</a>
                            @if(auth()->user()->role == '1')
                            <a class="dropdown-item" href="{{ url('/movies/trashall') }}"><i class="fas fa-heart-broken"></i>Todas Las Peliculas Eliminadas</a>
                            @endif
                        </div>
                    </div>	
                @endif
			</div>
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
				      <th scope="col">Titulo de la pelicula</th>
				      <th scope="col">Sinopsis</th>
				      <th scope="col">Año de la pelicula</th>
				      <th scope="col">Acción a</th>
					</tr>
					<tbody>
						@foreach($movies as $movie)
						<tr>
							<td>{{ $movie->title }}</td>
                            <td>{!! htmlspecialchars_decode($movie->synopsis) !!}</td>
                            <td>{{ $movie->year  }}</td>
                            <td>
                                @if(auth()->user()->id == $movie->user_id)
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">	  	
                                        <a href="{{ route('movie_restore',$movie->id) }}" 
                                        class="btn btn-sm btn-danger "><i class="far fa-trash-alt"></i> Restaurar Pelicula</a>
                                </div>
                                @endif
                            </td>
						</tr>
						@endforeach
					</tbody>
				</thead>
			</table>
		</div>
	</div>
</div>
@endsection