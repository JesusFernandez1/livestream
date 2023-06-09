<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LiveStream</title>
  <meta name="description" content="Descripción de la página aquí">
  <meta name="keywords" content="palabra clave aquí">
  <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../resources/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../resources/css/deseado.css">
  <link rel="stylesheet" href="../../resources/css/snipcart.css">
  <link rel="icon" type="image/png" href="../../resources/img/logo.png">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
  <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link" href="{{ route('/')}}">Intro</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('usuarios.soporte') }}">Soporte</a></li>
        </ul>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          @if (Route::has('login'))
          <li class="nav-item">
            <div>
                @auth
                @if (auth()->user()->empleados_id)
                <a href="{{ route('base') }}" class="nav-link">Zona administracion</a>
                @endif
                <div class="dropdown d-flex ml-auto">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{ Auth::user()->name }}
                  </a>
                  <button class="snipcart-checkout text-button ml-2"><i class="bi bi-cart2" style="font-size: 24px; color:white"></i> Mi cesta</button><span style="display: none;" class="snipcart-total-price" id="snipcart-total-price"></span>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="{{ route('pedidos.index') }}">Mis pedidos</a>
                      <a class="dropdown-item" href="{{ route('usuarios.verLista') }}">Lista deseados</a>
                      <a class="dropdown-item" href="{{ route('usuarios.modificarDatos') }}">Configuración</a>
                      <div class="dropdown-divider"></div>
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Cerrar sesión</a>
                      </form>
                  </div>
              </div>
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
      <div id="top">
        <div class="container-md p-5">
          <div class="row pt-5">
            <h3 class="text-center pb-5 pt-5 h1">Tu lista</h3>
          </div>
      
          <div class="row justify-content-center">
            @foreach($productos as $producto)
            <div class="col-md-4">
              <div class="card card-border mb-5">
                <button type="button" data-bs-toggle="modal" data-bs-target="#detallesModal" data-producto="{{ $producto }}">
                <img src="{{$producto->imagen_producto}}" class="card-img-top custom-image" alt="" style="object-fit: cover; height: 200px; width: 100%; height: auto;">
                <div class="card-body">
                  <h5 class="card-title">{{$producto->nombre_producto}}</h5>
                  <p class="card-text">Precio: {{$producto->precio_producto}}</p>
                </div>
                </button>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      @isset($producto)
      <div class="modal fade" id="detallesModal" tabindex="-1" aria-labelledby="detallesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable custom-modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-secondary text-light">
              <h5 class="modal-title" id="detallesModalLabel"><b>Detalles del producto</b></h5>
              <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="d-flex align-items-center">
                <div class="col-md-6">
                  <img id="detalles-imagen_producto" src="" alt="Imagen del producto" class="img-fluid rounded">
                </div>
                <div class="col-md-6">
                  <div>
                    <h4 id="detalles-nombre_producto"></h4>
                    <p id="detalles-descripcion_producto"></p>
                    <h5>Precio: <span id="detalles-precio_producto"></span></h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <h4 style="visibility: hidden" id="detalles-productos_id"></h4>
              <a class="x-icon" href="{{ route('usuarios.eliminarDeseados', $producto)}}" role="button"></a>
              <button class="snipcart-add-item btn btn-success snipcart-btn"
                data-item-id="{{$producto->productos_id}}"
                data-item-price="{{$producto->precio_producto}}"
                data-item-url="/paintings/starry-night"
                data-item-description="{{$producto->descripcion_producto}}"
                data-item-image="{{$producto->imagen_producto}}"
                data-item-name="{{$producto->nombre_producto}}"
                data-item-custom1-name="Frame color"
                data-item-custom1-options="Negro|Gris[+9.00]|Dorado[+12.00]">
                <i class="bi bi-cart-plus-fill" style="font-size: 20px;"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      @endisset               
</body>
<script>
    window.SnipcartSettings = {
      publicApiKey: "M2M2NzhkYWUtZTMzOC00YmI5LThkMDktMDkyN2MxNWUyYTg5NjM4MTg3NDU4MzYyODc4MjUx",
      templatesUrl: "../../resources/views/snipcart-templates.html",
      loadStrategy: "on-user-interaction",
      modalStyle: "side",
    };
  
    (function(){var c,d;(d=(c=window.SnipcartSettings).version)!=null||(c.version="3.0");var s,S;(S=(s=window.SnipcartSettings).timeoutDuration)!=null||(s.timeoutDuration=2750);var l,p;(p=(l=window.SnipcartSettings).domain)!=null||(l.domain="cdn.snipcart.com");var w,u;(u=(w=window.SnipcartSettings).protocol)!=null||(w.protocol="https");var m,g;(g=(m=window.SnipcartSettings).loadCSS)!=null||(m.loadCSS=!0);var y=window.SnipcartSettings.version.includes("v3.0.0-ci")||window.SnipcartSettings.version!="3.0"&&window.SnipcartSettings.version.localeCompare("3.4.0",void 0,{numeric:!0,sensitivity:"base"})===-1,f=["focus","mouseover","touchmove","scroll","keydown"];window.LoadSnipcart=o;document.readyState==="loading"?document.addEventListener("DOMContentLoaded",r):r();function r(){window.SnipcartSettings.loadStrategy?window.SnipcartSettings.loadStrategy==="on-user-interaction"&&(f.forEach(function(t){return document.addEventListener(t,o)}),setTimeout(o,window.SnipcartSettings.timeoutDuration)):o()}var a=!1;function o(){if(a)return;a=!0;let t=document.getElementsByTagName("head")[0],n=document.querySelector("#snipcart"),i=document.querySelector('src[src^="'.concat(window.SnipcartSettings.protocol,"://").concat(window.SnipcartSettings.domain,'"][src$="snipcart.js"]')),e=document.querySelector('link[href^="'.concat(window.SnipcartSettings.protocol,"://").concat(window.SnipcartSettings.domain,'"][href$="snipcart.css"]'));n||(n=document.createElement("div"),n.id="snipcart",n.setAttribute("hidden","true"),document.body.appendChild(n)),h(n),i||(i=document.createElement("script"),i.src="".concat(window.SnipcartSettings.protocol,"://").concat(window.SnipcartSettings.domain,"/themes/v").concat(window.SnipcartSettings.version,"/default/snipcart.js"),i.async=!0,t.appendChild(i)),!e&&window.SnipcartSettings.loadCSS&&(e=document.createElement("link"),e.rel="stylesheet",e.type="text/css",e.href="".concat(window.SnipcartSettings.protocol,"://").concat(window.SnipcartSettings.domain,"/themes/v").concat(window.SnipcartSettings.version,"/default/snipcart.css"),t.prepend(e)),f.forEach(function(v){return document.removeEventListener(v,o)})}function h(t){!y||(t.dataset.apiKey=window.SnipcartSettings.publicApiKey,window.SnipcartSettings.addProductBehavior&&(t.dataset.configAddProductBehavior=window.SnipcartSettings.addProductBehavior),window.SnipcartSettings.modalStyle&&(t.dataset.configModalStyle=window.SnipcartSettings.modalStyle),window.SnipcartSettings.currency&&(t.dataset.currency=window.SnipcartSettings.currency),window.SnipcartSettings.templatesUrl&&(t.dataset.templatesUrl=window.SnipcartSettings.templatesUrl))}})();
  </script>
  <script>
    $(document).ready(function() {
      $('#detallesModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var producto = button.data('producto');
        
        // Asignar los datos del producto al botón de Snipcart dentro del modal
        var snipcartBtn = $('#detallesModal').find('.snipcart-btn');
        snipcartBtn.attr('data-item-id', producto.productos_id);
        snipcartBtn.attr('data-item-price', producto.precio_producto);
        snipcartBtn.attr('data-item-url', '/paintings/starry-night');
        snipcartBtn.attr('data-item-description', producto.descripcion_producto);
        snipcartBtn.attr('data-item-image', producto.imagen_producto);
        snipcartBtn.attr('data-item-name', producto.nombre_producto);

        var eliminarDeseadosLink = $('#detallesModal').find('.x-icon');
        var eliminarDeseadosRoute = eliminarDeseadosLink.attr('href');
        var segments = eliminarDeseadosRoute.split('/');
        segments[segments.length - 1] = producto.id.toString();
        var eliminarDeseadosRouteFinal = segments.join('/');
        eliminarDeseadosLink.attr('href', eliminarDeseadosRouteFinal);

        $('#detalles-productos_id').text(producto.productos_id);
        $('#detalles-imagen_producto').attr('src', producto.imagen_producto); // Asignar la URL de la imagen al atributo src
        $('#detalles-nombre_producto').text(producto.nombre_producto);
        $('#detalles-descripcion_producto').text(producto.descripcion_producto);
        $('#detalles-precio_producto').text(producto.precio_producto);
      });
    });
  </script>
</html>