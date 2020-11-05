@extends('layouts.custom')
@section('title', 'Usuarios Borrados')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="d-flex justify-content-between align-items-center mb-2">
				<div>
					<h1 class="text-primary">Usuarios Borrados</h1>
                </div>
                @if(auth()->user()->role == '1')
                    <div class="dropdown">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" 
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-filter"></i> Filtrar
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ url('/users/all') }}"><i class="fas fa-stream"></i> Todos</a>
                            <a class="dropdown-item" href="{{ url('/users/0') }}"><i class="fas fa-user-shield"></i>Usuarios Normales</a>
                            <a class="dropdown-item" href="{{ url('/users/1') }}"><i class="fas fa-user-check"></i> Administradores</a>
                            <a class="dropdown-item" href="{{ url('/users/trash') }}"><i class="fas fa-heart-broken"></i> Eliminados</a>
                        </div>
                    </div>	
                @endif
			</div>
			<table class="table table-hover">
				<thead class="thead-dark">
					<tr>
				      <th scope="col">Nombre</th>
				      <th scope="col">Nickname</th>
				      <th scope="col">Rol del usuario</th>
				      <th scope="col">Acción a</th>
					</tr>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{ $user->name }}</td>
                            <td>{{ $user->nickname }}</td>
                            <td>{{ getRoleUserArray(null, $user->role) }}</td>
                            @if(auth()->user()->role == '1')
                                <td>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">	  		
                                        <a href="{{ route('users_trash',$user->id) }}" 
                                        class="btn btn-sm btn-danger "><i class="far fa-trash-alt"></i> Restaurar Usuario</a>
                                    </div>
                                </td>
                            @endif
						</tr>
						@endforeach
					</tbody>
				</thead>
			</table>
		</div>
	</div>
</div>
@endsection