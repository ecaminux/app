@extends ('layouts/layout')
@include ('layouts/errors', array('errors' => $errors))

<?php

    if ($factura->exists):
        $form_data = array('route' => array('facturas.update', $factura->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'facturas.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@section ('title') {{$action}} factura @stop
 @if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Por favor corrige los siguentes errores:</strong>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif

@section ('content')

<h1>{{$action}} Factura</h1>

{{ Form::model($factura, $form_data, array('role' => 'form')) }}
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('Estudiante', 'Id de Estudiante') }}
      {{ Form::text('idest', null, array('placeholder' => 'Id de estudiante', 'class' => 'form-control')) }}
    </div>

    <div class="form-group col-md-4">
      {{ Form::label('Razón Social', 'Razón Social') }}
      {{ Form::text('razsoc', null, array('placeholder' => 'Razón Social', 'class' => 'form-control')) }}
    </div>
        <div class="form-group col-md-4">
      {{ Form::label('Ruc/Cédula', 'Ruc/Cédula') }}
      {{ Form::text('rucced', null, array('placeholder' => 'Ruc/Cédula', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('Fecha', 'Fecha') }}
      {{ Form::text('fecfac', null, array('placeholder' => 'Fecha', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('Dirección', 'Dirección') }}
      {{ Form::text('dir', null, array('placeholder' => 'Dirección', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('Total', 'Total') }}
      {{ Form::text('tot', null, array('placeholder' => 'Total', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('Facturado', 'Facturado') }}
      {{ Form::checkbox('factur', null, array('placeholder' => 'factur', 'class' => 'form-control')) }}
    </div>

      {{ Form::button($action.' factura', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
      {{ Form::close() }}



  <div class="row">
@include('facturas/detalle')
</div>



@stop