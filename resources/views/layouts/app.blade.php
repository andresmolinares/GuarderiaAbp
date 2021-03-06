<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Guarderia</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    Guarderia
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if(Auth::check())
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('nino.index') }}">{{ __('Niños') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('persona.index') }}">{{ __('Personas') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('menu.index') }}">{{ __('Menús') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('plato.index') }}">{{ __('Platos') }}</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ingrediente.index') }}">{{ __('Ingredientes') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pagador.index') }}">{{ __('Pagador') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cuota_mensual.index') }}">{{ __('Cuotas mensuales') }}</a>
                        </li>

                        <li class="nav-item"> 
                            <div class="dropdown">
                            <a id="my-dropdown" class="nav-link dropdown-toggle" role ="button" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Consultas</a>
                            <div class="dropdown-menu" aria-labelledby="my-dropdown">
                                <a class="dropdown-item" href="bajas">Niños que se dieron de baja</a>
                                <a class="dropdown-item" href="alergicos">Niños alergicos a algún ingrediente</a>
                                <a class="dropdown-item" href="total_mensualidad">Mensualidades</a>
                                <a class="dropdown-item" href="cantidad_platos">Total de platos por cada menú</a>
                                <a class="dropdown-item" href="menu_favorito">Menus favoritos</a>
                            </div>

                                


                        </div>
                    </ul>
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
