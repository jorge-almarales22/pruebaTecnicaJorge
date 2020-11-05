@extends('layouts.custom')
@section('title', 'Agregar peliculas')
@section('content')
<div class="container">
	{!! Form::open(['route' => 'movie_store']) !!}
	<div class="card bg-light shadow rounded">
		<h1 class="text-center text-secondary font-weight-bold mt-2">Agregar Peliculas</h1>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6 mb-2">
					<label for="name">Titulo:</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i></span>
						</div>
						<input id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">
						@error('title')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
                </div>
                <div class="col-md-6 mb-2">
					<label for="year">Año:</label>
					<div class="input-group">
                        <input class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}" type="date" name="year" id="year">
                        @error('year')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
			</div>
            <div class="row mt-2">
                <div class="col-md-12">
                    <label for="synopsis ">Sinopsis:</label>
                    {!! Form::textarea('synopsis ', null, ['class' => 'form-control', 'id' => 'editor']) !!}
                </div>
            </div>
			<button class="btn btn-primary btn-lg mt-2 float-right"><i class="far fa-save"></i> Guardar</button>
					
			<a href="{{ route('movie_home') }}" class="btn btn-outline-primary btn-lg mt-2 mr-2 float-right">Cancelar</a>
			
		</div>	
	</div>
	{!! Form::close() !!}
</div>
@endsection