@extends ('layouts/layout')
@section ('title') Lista de rubros @stop
@section ('content') 
 <h1>Lista de rubros</h1>
 <a href="{{ route('rubros.create') }}" class="btn btn-primary">CREAR rubro</a>
 <br/>{{$rubros->links() }}<br/> 
   <table class="table table-striped" style="width: 900px">
    
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio ordinario</th>
        <th>Precio extraordinario</th>
        <th>Corresponde matrícula</th>
        <th>Curso relacionado</th>
        <th>IVA</th>
    </tr>
    @foreach ($rubros as $rubro)
    <tr>
        <td>{{ $rubro->nom }}</td>
        <td>{{ $rubro->descri }}</td>
        <td>{{ $rubro->pre1 }}</td>
        <td>{{ $rubro->pre2 }} {{ $rubro->horfac }}</td>
        <td>
          @if ($rubro->esmat)
          Matrícula
          @else
          -
          @endif
        </td>
        <td>{{ $rubro->idcur }}</td>
        <td>{{ $rubro->iva }}</td>
        <td>
          <a href="{{ route('rubros.show', $rubro->id) }}" class="btn btn-info">
              Ver
          </a>
        </td>
        <td>
          <a href="{{ route('rubros.edit', $rubro->id) }}" class="btn btn-primary">
            Editar
          </a>
        </td>
    </tr>
    @endforeach
  </table>
  {{$rubros->links() }}
   
@stop