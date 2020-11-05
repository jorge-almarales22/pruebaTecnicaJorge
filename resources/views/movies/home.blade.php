@extends('layouts.custom')
@section('title', 'Peliculas')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="d-flex justify-content-between align-items-center mb-2">
				<div>
					<h1 class="text-primary">Peliculas</h1>
                </div>
                <ul class="d-flex justify-content-between align-items-center">
                    <li class="li mr-2">
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
                    </li>
                    <li class="li">
                        <a href="#" id="btn_search"><i class="fas fa-search"></i> Search</a>
                    </li>
                    <li class="li ml-2">
                        <li class="li"><a href="{{ route('movie_create') }}"><i class="fas fa-plus"></i> Agregar peliculas</a></li>
                    </li>
                </ul>
            </div>
            <div class="form_search my-2" id="form_search">
                {!! Form::open(['route' => 'users_search', 'method' => 'GET']) !!}	
                    <div class="row">
                        <div class="col-md-6">
                            <input id="name" placeholder="Nombre del usuario" class="form-control" name="name">
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success">Buscar</button>
                        </div>
                    </div>
                {!! Form::close() !!}
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
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">	  
                                    <a href="{{ route('movie_show', $movie->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> ver</a>
                                    @can('update', $movie)    
                                        <a href="{{ route('movie_edit', $movie->id) }}" class="btn btn-success btn-sm"><i class="far fa-edit"></i> Editar</a>			
                                        <a href="#" 
                                        class="btn btn-sm btn-danger btn-deleted-movie" data-object="{{ $movie->id }}" data-path="movie_destroy"><i class="far fa-trash-alt"></i> Eliminar</a>
                                    @endcan
                                </div>
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