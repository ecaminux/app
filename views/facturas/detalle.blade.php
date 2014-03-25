
<br/>
<?php
  $detallefacturas = Detallefactura::where('idfac','=',$factura->id)->get();
?>

  <table class="table table-striped" style="width: 900px">
    
    <tr>
    	<th>Eliminar</th>
        <th>Cantidad</th>
        <th>Detalle</th>
        <th>Observacion</th>
        <th>P.U.</th>
        <th>%IVA</th>
        <th>IVA</th>
        <th>Subtotal</th>
    </tr>
    @foreach ($detallefacturas as $detallefactura)
    <tr>
    	<td>
          <a href="#" class="btn btn-danger">
              X
          </a>
        </td>
    	<td>{{ $detallefactura->can }}</td>
        <td>{{ $detallefactura->det }}</td>
        <td>{{ $detallefactura->obs }}</td>
        <td>{{ $detallefactura->preuni }}</td>
        <td>{{ $detallefactura->poriva }}</td>
        <td>{{ $detallefactura->iva }}</td>
        <td>{{ $detallefactura->subtot }}</td>
    </tr>
    @endforeach

  </table>     
  <a href="#" class="btn btn-primary">
      Añadir rubro
  </a>