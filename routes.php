<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//// permite considerar en un grupo el uso de un prefijo en específico..
///  ejemlo   .. prefijo/form
// Route::group(array('prefix' => 'facturas'), function()
// {
//   
// });

// Route::get('user/edit/{id}', function($id)
// {
//   return "You are editing the user with the ID #$id";
// })
// ->where('id', '[0-9]+');

// Route::get('pasta-with-meatballs/{id_table}, {type}', array('as' => 'pasta_meatballs', 'uses' => 'ItalianController@pastaWithMeatBalls'))
// ->where('id_table', '[0-9]+');

// Route::get('table/{id}', array('as' => 'table', 'uses' => 'tableController@index'))
// ->where('id', '[0-9]+');

// Route::get('template', function()
// {
//   return View::make('template');
// });

// Route::get('template/{name}', function($name)
// {
//   $name = ucwords(str_replace('-', ' ', $name));
//   return View::make('template')->with('name', $name);
// });

// Route::get('admin/users', function() {
//    return View::make('admin/users/list');
// });


/* ----------------------------------
// RUTAS PARA EL INICIO DE SESSION     
 ------------------------------------*/


// Nos mostrará el formulario de login y validamos los datos de inicio de sesión.
Route::get('login', 'AuthController@showLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@logOut');

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(
  array('before' => 'auth'), function()
  {
      // Esta será nuestra ruta de bienvenida.
      Route::get('/', function()
      {
          return View::make('hello');
      }); 

      Route::resource('admin/users', 'Admin_UsersController');  
  }
);






/* ------------------------------------------------------- 
      RUTAS DE LOS ELEMENTOS QUE SE USARÁN EN EL SISTEMA
 ---------------------------------------------------------- */

Route::group(array('before' => 'auth'), function() // requieren autenticación
  {
      Route::resource('facturas','FacturasController');
      Route::resource('detallefacturas','DetallefacturasController');
      Route::resource('rubros','RubrosController');
      Route::resource('calendarios','CalendarioController');

  });


