<?php

class FacturasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$facturas = Factura::paginate();
		return View::make('facturas/list')->with('facturas', $facturas);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$factura = new Factura;	
		return View::make('facturas/form')->with('factura',$factura);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    $factura = new Factura;
        $data = Input::all();
        if ($factura->validAndSave($data))
        {
        	return Redirect::route('facturas.show', array($factura->id)); 
        }
        else
        {
        	return Redirect::route('facturas.create')->withInput()->withErrors($factura->errors);
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	// public function show($id)
	// {
	// 	$factura = Factura::find($id);

	// 	if (is_null($factura))
	// 	{
	// 		App::abort(404);	
	// 	}		
	// 	return View::make('facturas/show')->with('factura', $factura);		
	// }

	public function show($id){
		$factura = Factura::where('id','=',$id)->first();
		//$detallefactura = Detallefactura::where('idfac','=',$id);
		if (is_null($factura))
		{
			App::abort(404);	
		}	
		return View::make('facturas.show')->with('factura', $factura);
		//->with('detallefactura', $detallefactura);		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$factura = Factura::find($id);

		if (is_null($factura))
		{
			App::abort(404);
		}

		return View::make('facturas/form')->with('factura', $factura);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$factura = Factura::find($id);
		//	Si el usuario no existe entonces lanzamos un error 404
		if (is_null ($factura))
		{
			App::abort(404);
		}
		//	Obtenemos la data enviada por el usuario
		$data = Input::all();
		//	Revisamos si la data es válida y guardamos en ese caso
		if ($factura->validAndSave($data))
		{
			//	Y devolvemos una redirección a la acción show para mostrar el usuario
			return Redirect::route('facturas.show', array($factura->id));
		}
		else
		{
			//	En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('facturas.edit', $factura->id)->withInput()->withErrors($factura->errors);
		}
	}	


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		//return "Eliminando el registro $id";
		
		$factura = Factura::find($id);

		if (is_null($factura))	
		{
			App::abort(404);
		}

		$factura->delete();

		if(Request::ajax())
		{
			return Response::json(array(
				'success' => true,
				'msg'	  => 'Factura '.$factura->razsoc.' eliminada', 
				'id'	  => $factura->id
			));
		}
		else
		{
			return Redirect::route('facturas.index');
		}
	}




}