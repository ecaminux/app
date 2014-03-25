<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Layout')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
    {{ HTML::script('assets/js/html5shiv.js') }}
    {{ HTML::script('assets/js/respond.min.js') }}
  </head>
  <body>
    <div id="wrap">
      <div class="container">
        <h4 >{{ Auth::user()->name; }}</h4><a href="{{ URL::to('logout')}}" style="float:right;">Cerrar sesión.</a>
      </div>
      <div class="container">
        @include('layouts/sidebar')
      </div>
      <div class="container">
        @yield('content')
      </div>


    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="//code.jquery.com/jquery.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
  </body>
  <div></div>
</html>