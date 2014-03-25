<?php

class RubrosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$rubros = Rubro::paginate();
		return View::make('rubros/list')->with('rubros', $rubros);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$rubro = new Rubro;	
		return View::make('rubros/form')->with('rubro',$rubro);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    $rubro = new Rubro;
        $data = Input::all();
        if ($rubro->validAndSave($data))
        {
        	return Redirect::route('rubros.show', array($rubro->id)); 
        }
        else
        {
        	return Redirect::route('rubros.create')->withInput()->withErrors($rubro->errors);
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
		$rubro = Rubro::find($id);

		if (is_null($rubro))
		{
			App::abort(404);	
		}		
		return View::make('rubros/show')->with('rubro', $rubro);		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//$rubro = Rubro::find($id)->paginate();
		$rubro = Rubro::find($id);

		if (is_null($rubro))
		{
			App::abort(404);
		}

		return View::make('rubros/form')->with('rubro', $rubro);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rubro = Rubro::find($id);
		//	Si el usuario no existe entonces lanzamos un error 404
		if (is_null ($rubro))
		{
			App::abort(404);
		}
		//	Obtenemos la data enviada por el usuario
		$data = Input::all();
		//	Revisamos si la data es válida y guardamos en ese caso
		if ($rubro->validAndSave($data))
		{
			//	Y devolvemos una redirección a la acción show para mostrar el usuario
			return Redirect::route('rubros.show', array($rubro->id));
		}
		else
		{
			//	En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('rubros.edit', $rubro->id)->withInput()->withErrors($rubro->errors);
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
		
		$rubro = Rubro::find($id);

		if (is_null($rubro))	
		{
			App::abort(404);
		}

		$rubro->delete();

		if(Request::ajax())
		{
			return Response::json(array(
				'success' => true,
				'msg'	  => 'Rubro '.$rubro->razsoc.' eliminada', 
				'id'	  => $rubro->id
			));
		}
		else
		{
			return Redirect::route('rubros.index');
		}
	}


}