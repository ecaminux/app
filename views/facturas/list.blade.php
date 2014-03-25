@extends ('layouts/layout')
@section ('title') Lista de Facturas @stop
@section ('content') 
 <h1>Lista de Facturas</h1>
 <a href="{{ route('facturas.create') }}" class="btn btn-primary">CREAR FACTURA</a>
 <br/>{{$facturas->links() }}<br/>
   <table class="table table-striped" style="width: 900px">
    
    <tr>
        <th>Factura</th>
        <th>Razon Social</th>
        <th>RUC/Cédula</th>
        <th>Fecha</th>
        <th>Dirección</th>
        <th>Total</th>
    </tr>
    @foreach ($facturas as $factura)
    <tr>
        <td>{{ $factura->numfac }}</td>
        <td>{{ $factura->razsoc }}</td>
        <td>{{ $factura->rucced }}</td>
        <td>{{ $factura->fecfac }} {{ $factura->horfac }}</td>
        <td>{{ $factura->dir }}</td>
        <td>{{ $factura->tot }}</td>
        <td>
          <a href="{{ route('facturas.show', $factura->id) }}" class="btn btn-info">
              Ver
          </a>
        </td>
        <td>
          <a href="{{ route('facturas.edit', $factura->id) }}" class="btn btn-primary">
            Editar
          </a>
        </td>
    </tr>
    @endforeach
  </table> 
  {{$facturas->links() }}

@stop