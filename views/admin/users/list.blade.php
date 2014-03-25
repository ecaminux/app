@extends ('layouts/layout')
@section ('title') Lista de Usuarios @stop
@section ('content')
 <h1>Lista de usuarios</h1>
 <a href="{{ route('admin.users.create') }}" class="btn btn-primary">CREAR USUARIO</a>
 <br/>
 {{$users->links()}}
 <br/>
   <table class="table table-striped" style="width: 900px">
    <tr>
        <th>Nombre completo</th>
        <th>Correo electr&oacute;nico</th>
        <th>Acciones</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info">
              Ver
          </a>
          <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">
            Editar
          </a>
        </td>
    </tr>
    @endforeach
  </table> 
  {{$users->links()}}
  <br/>
  
@stop