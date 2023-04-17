<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toogle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link" href="{{ route('pedido.create') }}">Intro</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Mas vendidos</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Nuestros productos</a></li>
            </ul>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
         @if (Route::has('login'))
              <li class="nav-item">
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                        <p>Bienvenido: </p>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
    
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        @endif
                    @endauth
                </div>
            @endif </li>
            </ul>
          </div>
        </div>
      </nav>
</body>
</html>