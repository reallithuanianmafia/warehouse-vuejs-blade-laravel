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

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">Office</a>
                
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                @guest
                @if (Route::has('register'))
                  <a class="nav-item nav-link active" href="{{route('register')}}">Register</a>
                @endif
                @else
                  <a class="nav-item nav-link active" href="{{route('home')}}">Virtual Warehouse</a>
                  <a class="nav-item nav-link" href="{{route('products.index')}}">Products</a>
                  <a class="nav-item nav-link" href="{{route('expenditures.expenditures')}}">Expenditures</a>
                  <a class="nav-item nav-link" href="{{route('notes.index')}}">Notes <span class="badge badge-danger">Inactive</span></a>
                  <a class="nav-item nav-link" href="{{route('accounts.index')}}">My account <span class="badge badge-danger">Inactive</span></a>
                @endguest
                
                
              </div>
            </div>
            
            </div>
          </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
