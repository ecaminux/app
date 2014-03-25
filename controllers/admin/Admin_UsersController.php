<?php

class Admin_UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//return 'Esta es la lista de usuarios';
		$users = User::paginate();
		return View::make('admin/users/list')->with('users', $users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//	Crea un nuevo objeto User para ser usado por el helper Form::model
		$user = new User;	
		return View::make('admin/users/form')->with('user',$user);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        // Creamos un nuevo objeto para nuestro nuevo usuario
        $user = new User;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        //	Revisamos si la data es válida y guardamos en ese caso
        if ($user->validAndSave($data))
        {
        	//	Y devolvemos una redirección a la acción show para mostrar el usuario
        	return Redirect::route('admin.users.show', array($user->id)); 
       
						/*if(Request::ajax())
						{
							return Response::json(array(
								'success' => true,
								'msg'	  => 'Usuario '.$user->name.' creado', 
								'id'	  => $user->id
							));
						}
						else
						{
							//return Redirect::route('admin.users.index');
							return View::make('admin/users');
						}*/

        }
        else
        {
        	//	En caso de error regresa a la acción create con los datos y los errores encontrados
        	return Redirect::route('admin.users.create')->withInput()->withErrors($user->errors);
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
		//
		//return 'Aquí mostramos la info del usuario '.$id;
		$user = User::find($id);

		if (is_null($user))
		{
			App::abort(404);	
		}		
		
		return View::make('admin/users/show')->with('user', $user);		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
   {
        $user = User::find($id);
        if (is_null ($user))
        {
            App::abort(404);
        }
        return View::make('admin/users/form')->with('user',$user);
   }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
		{
        // Creamos un nuevo objeto para nuestro nuevo usuario
        $user = User::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($user))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
 		// Revisamos si la data es válida y guardamos en ese caso
        if ($user->validAndSave($data))
        {
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('admin.users.show', array($user->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
            return Redirect::route('admin.users.edit', $user->id)->withInput()->withErrors($user->errors);
        }


        // // Revisamos si la data es válido
        // if ($user->isValid($data))
        // {
        //     // Si la data es valida se la asignamos al usuario
        //     $user->fill($data);
        //     // Guardamos el usuario
        //     $user->save();
        //     // Y Devolvemos una redirección a la acción show para mostrar el usuario
        //     return Redirect::route('admin.users.show', array($user->id));
        // }
        // else
        // {
        //     // En caso de error regresa a la acción edit con los datos y los errores encontrados
        //     return Redirect::route('admin.users.edit', $user->id)->withInput()->withErrors($user->errors);
        // }
}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//return "Eliminando el registro $id";
		$user = User::find($id);
		if (is_null($user))	
		{
			App::abort(404);
		}
		$user->delete();
		if(Request::ajax())
		{
			return Response::json(array(
				'success' => true,
				'msg'	  => 'Usuario '.$user->name.' eliminado', 
				'id'	  => $user->id
			));
		}
		else
		{
			return Redirect::route('admin.users.index');
		}
	}
}