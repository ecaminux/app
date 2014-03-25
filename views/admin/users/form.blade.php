@extends ('layouts/layout')
@include ('layouts/errors', array('errors' => $errors))

<?php

    if ($user->exists):
        $form_data = array('route' => array('admin.users.update', $user->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'admin.users.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>



@section ('title') {{$action}} usuario @stop
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



<h1>{{$action}} Usuario</h1>

{{ Form::model($user, $form_data, array('role' => 'form')) }}

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('email', 'Dirección de E-mail') }}
      {{ Form::text('email', null, array('placeholder' => 'Introduce tu E-mail', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('name', 'Nombre completo') }}
      {{ Form::text('name', null, array('placeholder' => 'Introduce tu nombre y apellido', 'class' => 'form-control')) }}        
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('username', 'Username') }}
      {{ Form::text('username', null, array('placeholder' => 'Introduce tu nombre de usuario', 'class' => 'form-control')) }}
    </div>
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('password', 'Contraseña') }}
      {{ Form::password('password', array('class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('password_confirmation', 'Confirmar contraseña') }}
      {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
    </div>
  </div>
{{ Form::button($action.' usuario', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
{{ Form::close() }}

@stop