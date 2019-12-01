<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css" integrity="sha256-CNwnGWPO03a1kOlAsGaH5g8P3dFaqFqqGFV/1nkX5OU=" crossorigin="anonymous" />


</head>
<body>

    @auth
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <a class="navbar-brand" href="#">JMF</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">

      <li class="nav-item ">
        <a class="nav-link " href="{{route('home')}}">
          <button class="btn btn-outline-primary ml-2" >Inicio
            <span class="sr-only">(current)</span></button></a>
      </li>

       <li class="nav-item active">

        <a class="nav-link" href="{{route('agenda')}}"><button class="btn btn-outline-primary ml-2" >Agenda</button></a>
      </li>
      <li class="nav-item">

        <a class="nav-link" href="{{route('avisos')}}"><button class="btn btn-outline-primary ml-2">Avisos</button></a>

      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <button class="btn btn-outline-primary ml-2" >
          Comunidades
          </button>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('comunidades')}}">Comunidades</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('vecinos')}}">Vecinos</a>
        </div>
      </li>
      <li class="nav-item">

        <a class="nav-link" href="{{route('proovedores')}}"> <button class="btn btn-outline-primary ml-2">Proovedores </button></a>

      </li>
      <li class="nav-item">

        <a class="nav-link" href="{{route('mensajes')}}"> <button class="btn btn-outline-primary ml-2">Mensajes</button></a>

      </li>
      <li class="nav-item">

        <a class="nav-link" href="{{route('usuarios')}}"> <button class="btn btn-outline-primary ml-2">Usuarios</button></a>

      </li>
      <li class="nav-item">
         <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><button type="button" class="btn btn-primary mr-3">Salir</button></a>
      </li>

    </ul>
  </div>
</nav>

@endauth
    <div class="container">

        @yield('saludo')

    </div>

     <div class="container">

        @yield('tabla')

    </div>
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

@if(session()->has('msg'))
<script>alert("Mensaje enviado");</script>
@endif
<script>
  $(document).ready( function () {
    $('#usurs').DataTable();
} );
</script>
</body>
</html>