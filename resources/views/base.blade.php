<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LiveStream</title>
  
    <link rel="stylesheet" href="../resources/css/style.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    @yield('scripts')
  </head>

<body>
    @if(Route::currentRouteName() == 'base')
    <div class="imagen">

    </div> 
    <div class="button-container">
        <a href="{{ route('empleados.index') }}" class="button">
            <i class="bi bi-people-fill"></i> Empleados
        </a>
        <a href="{{ route('usuarios.index') }}" class="button">
            <i class="bi bi-person-fill"></i> Usuarios
        </a>
        <a href="{{ route('pedidos.index') }}" class="button">
            <i class="bi bi-cart-fill"></i> Pedidos
        </a>
        <a href="{{ route('usuarios.peticiones') }}" class="button">
            <i class="bi bi-envelope-fill"></i> Peticiones
        </a>
    </div> 
    @endif

@yield('mostrarExtension')


</body>
@if(Route::currentRouteName() == 'base')
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f4f4;
    }

    .imagen {
        position: fixed;
        top: 20px;
        right: 820px;
        width: 700px; /* Ajusta el ancho de la imagen según tus necesidades */
        height: 400px; /* Ajusta la altura de la imagen según tus necesidades */
        background: url(../resources/img/logoEmpresa.png) no-repeat;
        background-size: cover;
    }
    .button-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        padding: 0 20px;
        margin-left: 40px;
    }

    .button {
        display: inline-flex; /* Cambiamos a inline-flex para alinear el icono verticalmente */
        align-items: center;
        justify-content: flex-start;
        padding: 15px 30px;
        margin: 10px;
        background-color: #ccc;
        padding: 50px 90px;
        font-size: 50px;
        color: #333;
        border: none;
        border-radius: 5px;
        font-size: 30px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .button:hover {
        background-color: #999;
        color: #fff;
        cursor: pointer;
    }

    /* Agregamos estilos para los iconos */
    .button i {
        margin-right: 10px;
    }

    @media (max-width: 768px) {
        .imagen {
            top: 20px;
            right: 20px;
            width: 300px;
            height: 200px;
        }

        .button-container {
            justify-content: center;
        }
    }
</style>

@endif
</html>