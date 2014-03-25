@extends ('layouts/layout')
@include ('layouts/errors', array('errors' => $errors))
<?php
    if ($calendario->exists):
        $form_data = array('route' => array('calendarios.update', $calendario->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'calendarios.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;
?>

@section ('title') {{$action}} fecha calendario @stop
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

<h1>{{$action}} Fechas Calendario</h1>

{{ Form::model($calendario, $form_data, array('role' => 'form')) }}
    <div class="row">
    <div class="form-group col-md-4">
      
      {{ Form::label('Código', 'Código') }}
      {{ Form::text('id', null, array('placeholder' => 'Código', 'class' => 'form-control')) }}

      {{ Form::label('Nombre Actividad', 'Nombre Actividad') }}
      {{ Form::text('nom', null, array('placeholder' => 'Nombre', 'class' => 'form-control')) }}

      
</div>
<div class="form-group col-md-4">

      {{ Form::label('Descipción', 'Descipción') }}
      {{ Form::text('descri', null, array('placeholder' => 'Descipción', 'class' => 'form-control')) }}

      {{ Form::label('Fecha', 'Fecha') }}
      {{ Form::text('fec', null, array('placeholder' => 'Descipción', 'class' => 'form-control')) }}    
</div>
{{ Form::button($action.' calendario', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
{{ Form::close() }}
@stop