@extends ('layouts/layout')
@section ('title') 
	calendario {{$calendario->nom}}
@stop

@section ('content')
  	<h2>ID: {{$calendario->id}}</h2>
        <p>Código: {{ $calendario->id }}</p>
        <p>Nombre: {{ $calendario->nom }}</p>
        <p>Descripción: {{ $calendario->descri }}</p>
        <p>Fecha: {{ $calendario->fec}}</p>

  	<p>
    	<a href="{{ route('calendarios.edit', $calendario->id) }}" class="btn btn-primary">
    		Editar
    	</a>
  	</p>

  	{{Form::model($calendario, array('route' => array('calendarios.destroy', $calendario->id), 'method' => 'DELETE'), array('role' => 'form'))}}
  		{{Form::submit('Eliminar calendario', array('class' => 'btn btn-danger'))}}
	{{Form::close()}}  		
	
@stop
