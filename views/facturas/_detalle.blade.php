<?php

    if ($detallefactura->exists):
        $form_data_det = array('route' => array('detallefacturas.update', $detallefactura->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data_det = array('route' => 'detallefacturas.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>

@section ('title') {{$action}} detallefactura @stop
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

{{ Form::model($detallefactura, $form_data_det, array('role' => 'form')) }}
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('detalle', 'detalle') }}
      {{ Form::text('det', null, array('placeholder' => 'detalle', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('observacion', 'observacion') }}
      {{ Form::checkbox('obs', null, array('placeholder' => 'observacion', 'class' => 'form-control')) }}
    </div>
  </div>
  {{ Form::button($action.' detallefactura', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
{{ Form::close() }}
@stop