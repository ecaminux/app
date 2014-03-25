<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>
    {{ HTML::style('assets/css/bootstrap.css') }}
</head>
<body>
    <div class="container">
    	@include('layouts/layout')
    </div>
    <div class="container">
        
        <div class="text-center">
            <h1 class="jumbotron">Módulo de Pagos</h1>
        </div>
        <div class="jumbotron">
            <p>Bienvenido {{ Auth::user()->name; }} al módulo de pagos de la Unidad Educativa Sagrados Corazones de la Concordia.</h4>
            <p >En este módulo ud podrá realizar la función de colecturía, con lo cual podrá realizar los pagos de matrículas y penciones, administrar los rubros disponibles y demás.</p>    
        </div>

    </div>
   
    <script src="https://code.jquery.com/jquery.js"></script>
    {{ HTML::script('assets/js/bootstrap.js'); }}
</body>
</html>