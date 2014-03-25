@extends ('layouts/layout')
@section ('title') 
	rubro {{$rubro->nom}}
@stop

@section ('content')
  	<h2>ID: {{$rubro->id}}</h2>
        <p>Nombre: {{ $rubro->nom }}</p>
        <p>Descripción: {{ $rubro->descri }}</p>
        <p>Precio Ordinario: {{ $rubro->pre1 }}</p>
        <p>Precio Extraordinario: {{ $rubro->pre2 }} {{ $rubro->horfac }}</p>
        <p>Coresponde matrícula: {{ $rubro->esmat }}</p>
        <p>Curso: {{ $rubro->idcur }}</p>
        <p>IVA: {{ $rubro->iva }}</p>
  	<p>
    	<a href="{{ route('rubros.edit', $rubro->id) }}" class="btn btn-primary">
    		Editar
    	</a>
  	</p>

  	{{Form::model($rubro, array('route' => array('rubros.destroy', $rubro->id), 'method' => 'DELETE'), array('role' => 'form'))}}
  		{{Form::submit('Eliminar rubro', array('class' => 'btn btn-danger'))}}
	{{Form::close()}}  		
	
@stop
