@extends('layouts.custom')
@section('title', 'Usuario')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="card shadow bg-light rounded">
			  <div class="card-body">
					<h3 class="text-secondary text-center">Información</h3>
				  	<hr>
				    <div class="py-1">
				    	<span class="text-primary"><i class="fas fa-user"></i> Nombre:</span>
				    	<span class="text-secondary mb-2">{{ $user->name }}</span><br>
				    	<span class="text-primary"><i class="fas fa-user-shield"></i> Nick del usuario:</span>
				    	<span class="text-secondary mb-2">{{ $user->nickname }}</span><br>
				    	<span class="text-primary"><i class="far fa-calendar-alt"></i> Fecha de registro:</span>
				    	<span class="text-secondary mb-2">{{ $user->created_at }} {{ $user->created_at->diffForHumans() }}</span><br>
				    	<span class="text-primary"><i class="fas fa-user-tie"></i> Role de usuario:</span>
                        <span class="text-secondary mb-2">{{ getRoleUserArray(null, $user->role) }}</span><br>		  		    			    	
				    </div>			  	
			  </div>
			</div>
        </div>
        <div class="col-md-8">
			@if(auth()->user()->role == '1')
                {!! Form::open(['route' => ['users_update', $user->id],'method' => 'PUT']) !!}
                        <div class="card shadow bg-light rounded">
                            <div class="card-body">
                                <h2 class=" text-center text-secondary">Editar usuario</h2>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name">Nombre:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i></span>
                                            </div>
                                            <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>		
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nickname">Nickname:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-font"></i></span>
                                            </div>
                                            <input id="nickname" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname', $user->nickname) }}" required autocomplete="nickname">
                                            @error('nickname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>		
                                    </div>
                                    <div class="col-md-4">
                                        <label for="type_user">Tipo de usuario:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </span>
                                            </div>
                                            {!! Form::select('type_user',  getRoleUserArray('list',null), $user->role, ['class' => 'custom-select']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right mt-2">
                                    <button class="btn btn-success btn-lg"> <i class="far fa-save"></i> Editar</button>
                                    <a href="{{ route('users_home', $all = 'all') }}" class="btn btn-outline-primary btn-lg ml-2 float-right">Cancelar</a>
                                </div>
                            </div>
                        </div>
                {!! Form::close() !!}
			@endif
		</div>
	</div>
</div>
@endsection