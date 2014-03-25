<?php

class DetallefacturasController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$detallefacturas = Detallefactura::paginate();
		return View::make('detallefacturas/list')->with('detallefacturas', $detallefacturas);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$detallefactura = new Detallefactura;	
		return View::make('detallefacturas/form')->with('detallefactura',$detallefactura);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    $detallefactura = new Detallefactura;
        $data = Input::all();
        if ($detallefactura->validAndSave($data))
        {
        	return Redirect::route('detallefacturas.show', array($detallefactura->id)); 
        }
        else
        {
        	return Redirect::route('detallefacturas.create')->withInput()->withErrors($detallefactura->errors);
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$detallefactura = Detallefactura::find($id);

		if (is_null($detallefactura))
		{
			App::abort(404);	
		}		
		return View::make('detallefacturas/show')->with('detallefactura', $detallefactura);		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$detallefactura = Factura::find($id);

		if (is_null($detallefactura))
		{
			App::abort(404);
		}

		return View::make('detallefacturas/form')->with('detallefactura', $detallefactura);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$detallefactura = Factura::find($id);
		//	Si el usuario no existe entonces lanzamos un error 404
		if (is_null ($detallefactura))
		{
			App::abort(404);
		}
		//	Obtenemos la data enviada por el usuario
		$data = Input::all();
		//	Revisamos si la data es válida y guardamos en ese caso
		if ($detallefactura->validAndSave($data))
		{
			//	Y devolvemos una redirección a la acción show para mostrar el usuario
			return Redirect::route('detallefacturas.show', array($detallefactura->id));
		}
		else
		{
			//	En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('detallefacturas.edit', $detallefactura->id)->withInput()->withErrors($detallefactura->errors);
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
		
		$detallefactura = Factura::find($id);

		if (is_null($detallefactura))	
		{
			App::abort(404);
		}

		$detallefactura->delete();

		if(Request::ajax())
		{
			return Response::json(array(
				'success' => true,
				'msg'	  => 'Factura '.$detallefactura->razsoc.' eliminada', 
				'id'	  => $detallefactura->id
			));
		}
		else
		{
			return Redirect::route('detallefacturas.index');
		}
	}

}