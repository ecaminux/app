@extends ('layouts/layout')
@section ('title') Factura {{$factura->razsoc}} @stop

@section ('content')
  	<h2>ID: {{$factura->id}}</h2>

  	<p>Factura: {{ $factura->numfac }}</p>
  	<p>Razón Social: {{ $factura->razsoc }}</p>
       <p>RUC/Cédula: {{ $factura->rucced }}</p>
        <p>Fecha: {{ $factura->fecfac }} {{ $factura->horfac }}</p>
        <p>Dirección: {{ $factura->dir }}</p>
        <p>Total: {{ $factura->tot }}</p>
  	<p>
    	<a href="{{ route('facturas.edit', $factura->id) }}" class="btn btn-primary">
    		Editar
    	</a>
  	</p>

  	{{Form::model($factura, array('route' => array('facturas.destroy', $factura->id), 'method' => 'DELETE'), array('role' => 'form'))}}
  		{{Form::submit('Eliminar factura', array('class' => 'btn btn-danger'))}}
	{{Form::close()}}  		

@stop
