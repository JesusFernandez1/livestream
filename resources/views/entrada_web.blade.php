<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LiveStream</title>
  <meta name="description" content="Descripción de la página aquí">
  <meta name="keywords" content="palabra clave aquí">
  <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
  <link rel="stylesheet" href="../resources/css/main.css">
  <link rel="stylesheet" href="../resources/css/snipcart.css">
  <link rel="icon" type="image/png" href="../resources/img/logo.png">
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
  <!-- NAVBAR-->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link" href="{{ route('/')}}">Intro</a></li>
          <li class="nav-item"><a class="nav-link" href="#masVendidos">Mas vendidos</a></li>
          <li class="nav-item"><a class="nav-link" href="#nuestrosProductos">Nuestros productos</a></li>
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

  <div>
    <img src="../resources/img/portada.jpg" alt="Portada de portada1" class="d-block w-100">
  </div>

  <div id="separator-ribbon">
    <div class="content bg-dark"></div>
  </div>
  <!-- top-->

  <div id="top">
  <div id="masVendidos" class="container-md p-5">

    <div class="row pt-5">
      <h3 class="text-center pb-5 pt-5 h1">Lo mas vendido!</h3>
    </div>

    <div class="row">
      <div class="col-sm">
        <div class="card w-100 card-border mb-5">
          <img src="../resources/img/camara4.png" class="card-img-top" alt="Camara Sony 4k">
          <div class="card-body">
            <p class="card-text">Este excelente y completo camcorder es la elección perfecta para una amplia variedad de tomas con una sola cámara 4K y HD con un nuevo sensor 3CMOS de tipo 1/3. Un potente objetivo con zoom 25x con tres anillos de zoom independientes ofrece imágenes 4K de perfecta nitidez en prácticamente cualquier situación de grabación profesional. El AF con reconocimiento facial avanzado y el exclusivo filtro de densidad neutra variable electrónico de Sony permiten grabar contenidos excelentes sin complicaciones.</p>
          </div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card w-100 card-border mb-5">
          <img src="../resources/img/microfono2.png" class="card-img-top" alt="Microfono Shure"></a>
          <div class="card-body">
            <p class="card-text">El Shure SM7B es un micrófono dinámico de bobina móvil con característica cardioide fija ideal para grabar locuciones y voces, aunque también hace muy buena camara en las tomas de instrumentos. Su rango de transmisión amplio y lineal proporciona una reproducción natural de voces e instrumentos. Un absorbente por amortiguación de aire contra las vibraciones y un blindaje sofisticado evitan que las interferencias electromagnéticas mecánicas y de banda ancha de cualquier tipo puedan afectar a las grabaciones. De manera que, ¡nada se interpone ante una grabación libre de problemas!</p>
          </div>
          <div style="text-align: center" class="alert alert-success">
            <strong>De lo mejor!</strong>
          </div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card w-100 card-border mb-5">
          <img src="../resources/img/camara2.png" class="card-img-top" alt="camara Nikon FULL HD">
          <div class="card-body">
            <p class="card-text">Camara Digital Reflex Nikon D3300+Af-S Dx 18-55mm 1:3.5-5.6g es un objeto de segunda mano que se ofrece en estado Muy bueno. Cómpralo al Mejor Precio Solo en Cash Converters en la tienda. El objeto funciona perfectamente, tiene garantía y te lo trasladamos por correo aproximadamente en 72 horas.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <div id="separator-camaras">
    <div class="content bg-dark"></div>
  </div>

  <div id="camaras">
    <div id="nuestrosProductos" class="container">
      <div class="row">
        <h2 class="text-center text-danger text-shadow h1">Nuestros productos:</h2>
      </div>
      <div class="row row-cols-1 row-cols-2 row-cols-sm-2 row-cols-md-4">
        @foreach($productos as $producto)
        <div class="col-sm">
          <button type="button" class="btn btn-dark btn-lg rounded-pill p-3 font-weight-bold" data-bs-toggle="modal" data-bs-target="#detallesModal" data-producto="{{ $producto }}">
          <img src={{$producto->imagen}} alt="camara Nikon" class="w-100 camara">
          <div class="text-center"><span class="camara-name h5 p-2">{{$producto->nombre}}</span></div>
          </button>
        </div>
        @endforeach
      </div>
      <div class="row py-5">
        <div class="col text-center">
          <a href="#" class="link-dark">
            <button class="btn btn-dark btn-lg rounded-pill p-3 font-weight-bold">Ver todos los productos</button>
          </a>
        </div>
      </div>
    </div>
  </div>

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
              <img id="detalles-imagen" src="" alt="Imagen del producto" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
              <div>
                <h4 id="detalles-nombre"></h4>
                <p id="detalles-descripcion"></p>
                <h5>Precio: <span id="detalles-precio"></span></h5>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <h4 style="visibility: hidden" id="detalles-id"></h4>
          <button class="heart-icon mr-3"></button>
          <button class="snipcart-add-item btn btn-success snipcart-btn"
            data-item-id="{{$producto->id}}"
            data-item-price="{{$producto->precio}}"
            data-item-url="/paintings/starry-night"
            data-item-description="{{$producto->descripcion}}"
            data-item-image="{{$producto->imagen}}"
            data-item-name="{{$producto->nombre}}"
            data-item-custom1-name="Frame color"
            data-item-custom1-options="Negro|Gris[+9.00]|Dorado[+12.00]">
            <i class="bi bi-cart-plus-fill" style="font-size: 20px;"></i>
          </button>
        </div>
      </div>
    </div>
  </div>  
</body>
<script>
  window.SnipcartSettings = {
    publicApiKey: "M2M2NzhkYWUtZTMzOC00YmI5LThkMDktMDkyN2MxNWUyYTg5NjM4MTg3NDU4MzYyODc4MjUx",
    templatesUrl: "../resources/views/snipcart-templates.html",
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
      snipcartBtn.attr('data-item-id', producto.id);
      snipcartBtn.attr('data-item-price', producto.precio);
      snipcartBtn.attr('data-item-url', '/paintings/starry-night');
      snipcartBtn.attr('data-item-description', producto.descripcion);
      snipcartBtn.attr('data-item-image', producto.imagen);
      snipcartBtn.attr('data-item-name', producto.nombre);
      
      $('#detalles-id').text(producto.id);
      $('#detalles-imagen').attr('src', producto.imagen); // Asignar la URL de la imagen al atributo src
      $('#detalles-nombre').text(producto.nombre);
      $('#detalles-descripcion').text(producto.descripcion);
      $('#detalles-precio').text(producto.precio);
    });
  });
</script>
<script>
$(document).ready(function() {
  $('.heart-icon').click(function() {
    var productId = $('#detalles-id').text();
    $(this).toggleClass('is-active');

    $.ajax({
      url: 'http://localhost/livestream/public/agregarListaDeseados?productId=' + encodeURIComponent(productId),
      method: 'GET',
      success: function(response) {
        console.log('Producto agregado a la lista de deseados');
        // Puedes mostrar una notificación o realizar otras acciones después de agregar el producto a la lista de deseados
      },
      error: function(xhr, status, error) {
        console.error(error);
        // Manejar el error en caso de que no se pueda agregar el producto a la lista de deseados
      }
    });
  });
});
</script>
<style>
  .custom-modal-dialog {
    max-width: 700px;
  }
  .visa {
  font-size: 24px;
  position: absolute;
  width: 130px;
  top: 50%;
  left: 45%;
  transform: translate(-50%, -50%);
  }
  .paypal {
  font-size: 24px;
  position: absolute;
  width: 130px;
  top: 50%;
  left: 53%;
  transform: translate(-50%, -50%);
  }
  .mensaje {
  font-size: 28px;
  position: absolute;
  top: 40%;
  left: 49%;
  transform: translate(-50%, -50%);
  }
  .heart-icon {
  border: none;
  background-color: transparent;
  padding: 0;
  width: 40px;
  height: 40px;
  background-image: url('../resources/img/corazon.png');
  background-size: cover;
  transition: background-image 0.3s ease-in-out;
  }

.heart-icon.is-active {
  background-image: url('../resources/img/corazon.png');
  animation: heartBeat 0.8s ease-in-out;
}

@keyframes heartBeat {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.3);
  }
  100% {
    transform: scale(1);
  }
}
  </style>
{{-- <script>
  document.addEventListener('DOMContentLoaded', function() {
    setInterval(function() {
      var itemList = document.getElementsByClassName('snipcart-item-line');
      console.log(itemList);
      for (var i = 0; i < itemList.length; i++) {
        var item = itemList[i];
        var productId = item.getAttribute('data-item-id');
        console.log(productId);
      }
      }, 1000);
        });
</script> --}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
    setInterval(function() {
      var spanElement = document.getElementById('snipcart-total-price');
      var totalPrice = spanElement.innerText;

      if (document.getElementById('comprar-link') != null) {
        var linkElement = document.getElementById('comprar-link');

        var baseHref = linkElement.href.split('?')[0];

        var updatedHref = baseHref + '?total=' + encodeURIComponent(totalPrice);

        linkElement.setAttribute('href', updatedHref);

        var linkElement2 = document.getElementById('comprar-linkPaypal');

        var baseHref2 = linkElement2.href.split('?')[0];

        var updatedHref2 = baseHref2 + '?total=' + encodeURIComponent(totalPrice);

        linkElement2.setAttribute('href', updatedHref2);

      }
    }, 1000);
  });
</script>
<script>
  $(document).ready(function() {
    $('.snipcart-add-item').click(function(e) {
      e.preventDefault();
      
      // Verificar si el usuario está logueado
      var isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
      
      if (isLoggedIn) {
        // Si el usuario está logueado, agregar el producto normalmente
        $('#product-form').submit();
      } else {
        // Si el usuario no está logueado, redirigir al formulario de inicio de sesión
        window.location.href = 'http://localhost/livestream/public/login';
      }
    });
  });
</script>
</html>