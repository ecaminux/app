@extends ('layouts/layout')
@section ('title') User {{$user->name}} @stop
@section ('content')
  	<h2>ID: {{$user->id}}</h2>

  	<p>Nombre: {{$user->name}}</p>
  	<p>Correo: {{$user->email}}</p>
  
  	<p>
    	<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
    		Editar
    	</a>
  	</p>

  	{{Form::model($user, array('route' => array('admin.users.destroy', $user->id), 'method' => 'DELETE'), array('role' => 'form-control'))}}
  		{{Form::submit('Eliminar usuario', array('class' => 'btn btn-danger'))}}
	{{Form::close()}}  		
	
@stop
