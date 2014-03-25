@extends ('layouts/layout')
@section ('title') Lista de fechas calendario @stop
@section ('content') 
 <h1>Lista de fechas calendario</h1>
 <a href="{{ route('calendarios.create') }}" class="btn btn-primary">Crear fecha calendario</a>
 <br/>{{$calendarios->links() }}<br/> 
   <table class="table table-striped" style="width: 900px">
    
    <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Fecha</th>
    </tr>
    @foreach ($calendarios as $calendario)
    <tr>
        <td>{{ $calendario->id }}</td>
        <td>{{ $calendario->nom }}</td>
        <td>{{ $calendario->descri }}</td>
        <td>{{ $calendario->fec}}</td>
        <td>
          <a href="{{ route('calendarios.show', $calendario->id) }}" class="btn btn-info">
              Ver
          </a>
        </td>
        <td>
          <a href="{{ route('calendarios.edit', $calendario->id) }}" class="btn btn-primary">
            Editar
          </a>
        </td>
    </tr>
    @endforeach
  </table>
  {{$calendarios->links() }}
   
   <div style="width:800px; margin:auto;color:gray;">
  <p> Recuerde que para matrículas se considerarán los códigos MO, ME y FM como "Ordinarias", "Extraordinarias" y "Fin de Matrículas" respectivamente.
     El añadir fechas adicionales no interfiere con las mencionadas. </p>
  <p> El sistema se regirá a estas fechas para acciones como la selección del precio de artículo.</p>
  </div>
@stop