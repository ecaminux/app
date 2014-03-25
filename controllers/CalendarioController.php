<?php

class CalendarioController extends \BaseController {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$calendarios = Calendario::paginate();
		return View::make('calendarios/list')->with('calendarios', $calendarios);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$calendario = new Calendario;	
		return View::make('calendarios/form')->with('calendario',$calendario);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    $calendario = new Calendario;
        $data = Input::all();
        if ($calendario->validAndSave($data))
        {
        	return Redirect::route('calendarios.show', array($calendario->id)); 
        }
        else
        {
        	return Redirect::route('calendarios.create')->withInput()->withErrors($calendario->errors);
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
		$calendario = Calendario::find($id);

		if (is_null($calendario))
		{
			App::abort(404);	
		}		
		return View::make('calendarios/show')->with('calendario', $calendario);		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$calendario = Calendario::find($id);

		if (is_null($calendario))
		{
			App::abort(404);
		}

		return View::make('calendarios/form')->with('calendario', $calendario);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$calendario = Calendario::find($id);
		//	Si el usuario no existe entonces lanzamos un error 404
		if (is_null ($calendario))
		{
			App::abort(404);
		}
		//	Obtenemos la data enviada por el usuario
		$data = Input::all();
		//	Revisamos si la data es válida y guardamos en ese caso
		if ($calendario->validAndSave($data))
		{
			//	Y devolvemos una redirección a la acción show para mostrar el usuario
			return Redirect::route('calendarios.show', array($calendario->id));
		}
		else
		{
			//	En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('calendarios.edit', $calendario->id)->withInput()->withErrors($calendario->errors);
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
		
		$calendario = Calendario::find($id);

		if (is_null($calendario))	
		{
			App::abort(404);
		}

		$calendario->delete();

		if(Request::ajax())
		{
			return Response::json(array(
				'success' => true,
				'msg'	  => 'Calendario '.$calendario->nom.' eliminada', 
				'id'	  => $calendario->id
			));
		}
		else
		{
			return Redirect::route('calendarios.index');
		}
	}

}