@extends ('layouts/layout')
@include ('layouts/errors', array('errors' => $errors))
<?php
    if ($rubro->exists):
        $form_data = array('route' => array('rubros.update', $rubro->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'rubros.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;
?>

@section ('title') {{$action}} rubro @stop
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

<h1>{{$action}} RUBRO</h1>

{{ Form::model($rubro, $form_data, array('role' => 'form')) }}
    <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('Nombre', 'Nombre del artículo') }}
      {{ Form::text('nom', null, array('placeholder' => 'Nombre', 'class' => 'form-control')) }}

      {{ Form::label('Detalle', 'Detalle') }}
      {{ Form::text('descri', null, array('placeholder' => 'Detalle', 'class' => 'form-control')) }}
</div>
<div class="form-group col-md-4">

      {{ Form::label('Precio Ordinario', 'Precio Ordinario') }}
      {{ Form::text('pre1', null, array('placeholder' => 'Precio Ordinario', 'class' => 'form-control')) }}

      {{ Form::label('Precio Extraordinario', '') }}
      {{ Form::text('pre2', null, array('placeholder' => 'Precio Extraordinario', 'class' => 'form-control')) }}

</div>
<div class="form-group col-md-4">

      {{ Form::label('IVA', '') }}
      {{ Form::text('iva', null, array('placeholder' => 'IVA', 'class' => 'form-control')) }}

</div>
<div class="form-group col-md-4">

      {{ Form::label('Corresponde matrícula', '') }}
      {{ Form::checkbox('estmat', null, array('placeholder' => 'Corresponde matrícula', 'class' => 'form-control')) }}

</div>
<div class="form-group col-md-4">


      {{ Form::label('Curso relacionado', '') }}
      {{ Form::text('idcur', null, array('placeholder' => 'Curso relacionado', 'class' => 'form-control')) }}

    </div>

{{ Form::button($action.' rubro', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    

  </div>
  <div class="form-group col-md-4">
{{ Form::close() }}
@stop