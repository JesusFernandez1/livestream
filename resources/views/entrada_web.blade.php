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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  <link rel="icon" type="image/png" href="../resources/img/logo.png">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
</head>

<body>

  <!-- NAVBAR-->

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toogle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="{{ route('empleados.create') }}">Intro</a></li>
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
                @if (auth()->user()->empleados_id)
                <a href="{{ route('empleados.index') }}" class="nav-link">Zona administracion</a>
                @endif
                    <h6>Bienvenido: {{Auth::user()->name}}</h6>
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

  <!-- CAROUSEL-->
  <div class="carousel slide" id="mainSlider" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../resources/img/portada1.jpg" alt="Portada de portada1" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="../resources/img/portada2.jpg" alt="Portada de camara2" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="../resources/img/portada3.jpg" alt="Portada de camara3" class="d-block w-100">
      </div>
    </div>
  </div>
  <!-- CAROUSEL-->

  <div id="separator-ribbon">
    <div class="content bg-dark"></div>
  </div>
  <!-- top-->

  <div id="top">
  <div class="container-md p-5">

    <div class="row pt-5">
      <h3 class="text-center pb-5 pt-5 h1">Lo mas vendido!</h3>
    </div>

    <div class="row">
      <div class="col-sm">
        <div class="card w-100 card-border mb-5 product-card">
          <img src="../resources/img/camara4.png" class="card-img-top" alt="Camara Sony 4k">
          <div class="card-body">
            <p class="card-text">Este excelente y completo camcorder es la elección perfecta para una amplia variedad de tomas con una sola cámara 4K y HD con un nuevo sensor 3CMOS de tipo 1/3. Un potente objetivo con zoom 25x con tres anillos de zoom independientes ofrece imágenes 4K de perfecta nitidez en prácticamente cualquier situación de grabación profesional. El AF con reconocimiento facial avanzado y el exclusivo filtro de densidad neutra variable electrónico de Sony permiten grabar contenidos excelentes sin complicaciones.</p>
          </div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card w-100 card-border mb-5 product-card">
          <a href="#malenia" data-toggle="modal"><img src="../resources/img/microfono2.png" class="card-img-top" alt="Microfono Shure"></a>
          <div class="card-body">
            <p class="card-text">El Shure SM7B es un micrófono dinámico de bobina móvil con característica cardioide fija ideal para grabar locuciones y voces, aunque también hace muy buena camara en las tomas de instrumentos. Su rango de transmisión amplio y lineal proporciona una reproducción natural de voces e instrumentos. Un absorbente por amortiguación de aire contra las vibraciones y un blindaje sofisticado evitan que las interferencias electromagnéticas mecánicas y de banda ancha de cualquier tipo puedan afectar a las grabaciones. De manera que, ¡nada se interpone ante una grabación libre de problemas!</p>
          </div>
          <div style="text-align: center" class="alert alert-success">
            <strong>De lo mejor!</strong>
          </div>
        </div>
      </div>
      <div class="col-sm">
        <div class="card w-100 card-border mb-5 product-card">
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
    <div class="container">
      <div class="row">
        <h2 class="text-center text-danger text-shadow h1">Nuestros productos:</h2>
      </div>
      <div class="row row-cols-1 row-cols-2 row-cols-sm-2 row-cols-md-4">
        <div class="col-sm">
          <button class="snipcart-add-item btn btn-dark btn-lg rounded-pill p-3 font-weight-bold"
          data-item-id="camara2"
          data-item-price="349.99"
          data-item-url="/paintings/starry-night"
          data-item-description="Camara Nikon de maxima calidad."
          data-item-image="../resources/img/camara2.png"
          data-item-name="Nikon"
          data-item-custom1-name="Frame color"
          data-item-custom1-options="Black|Brown[+9.00]|Grey[+12.00]">
          <img src="../resources/img/camara2.png" alt="camara Nikon" class="w-100 camara">
          <div class="text-center"><span class="camara-name h5 p-2">Nicon</span></div>
          </button>
        </div>
        <div class="col-sm">
          <button class="snipcart-add-item btn btn-dark btn-lg rounded-pill p-3 font-weight-bold"
          data-item-id="camara3"
          data-item-price="349.99"
          data-item-url="/paintings/starry-night"
          data-item-description="Camara Cannon de maxima calidad."
          data-item-image="../resources/img/camara3.png"
          data-item-name="Cannon"
          data-item-custom1-name="Frame color"
          data-item-custom1-options="Black|Brown[+10.00]|Platinum[+35.00]">
          <img src="../resources/img/camara3.png" alt="camara Canon" class="w-100 camara">
          <div class="text-center"><span class="camara-name h5 p-2">Cannon</span></div>
        </button>
        </div>
        <div class="col-sm">
          <button class="snipcart-add-item btn btn-dark btn-lg rounded-pill p-3 font-weight-bold"
          data-item-id="Cannon 4K"
          data-item-price="349.99"
          data-item-url="/paintings/starry-night"
          data-item-description="Camara Cannon 4K de maxima calidad."
          data-item-image="../resources/img/camara6.png"
          data-item-name="Cannon 4K"
          data-item-custom1-name="Frame color"
          data-item-custom1-options="Black|Brown[+10.00]|Gold[+30.00]">
          <img src="../resources/img/camara6.png" alt="camara Canon" class="w-100 camara">
          <div class="text-center"><span class="camara-name h5 p-2">Cannon 4K</span></div>
        </button>
        </div>
        <div class="col-sm">
          <button class="snipcart-add-item btn btn-dark btn-lg rounded-pill p-3 font-weight-bold"
          data-item-id="Logitect"
          data-item-price="349.99"
          data-item-url="/paintings/starry-night"
          data-item-description="Camara Logitect de maxima calidad."
          data-item-image="../resources/img/camara8.png"
          data-item-name="Logitect"
          data-item-custom1-name="Frame color"
          data-item-custom1-options="Black|Brown[+10.00]|Gold[+30.00]">
          <img src="../resources/img/camara8.png" alt="camara Logitect" class="w-100 camara">
          <div class="text-center"><span class="camara-name h5 p-2">Logitect</span></div>
        </button>
        </div>
        <div class="col-sm">
          <button class="snipcart-add-item btn btn-dark btn-lg rounded-pill p-3 font-weight-bold"
          data-item-id="Razer"
          data-item-price="119.99"
          data-item-url="/paintings/starry-night"
          data-item-description="Microfono Razer de maxima calidad."
          data-item-image="../resources/img/microfono1.png"
          data-item-name="Razer"
          data-item-custom1-name="Frame color"
          data-item-custom1-options="Black|Brown[+10.00]|Gold[+30.00]">
          <img src="../resources/img/microfono1.png" alt="camara Nikon" class="w-100 camara">
          <div class="text-center"><span class="camara-name h5 p-2">Razer</span></div>
        </button>
        </div>
        <div class="col-sm">
          <button class="snipcart-add-item btn btn-dark btn-lg rounded-pill p-3 font-weight-bold"
          data-item-id="Shure"
          data-item-price="349.99"
          data-item-url="/paintings/starry-night"
          data-item-description="Microfono Shure de maxima calidad."
          data-item-image="../resources/img/microfono2.png"
          data-item-name="Shure"
          data-item-custom1-name="Frame color"
          data-item-custom1-options="Black|Brown[+10.00]|V2[+50.00]">
          <img src="../resources/img/microfono2.png" alt="camara Canon" class="w-100 camara">
          <div class="text-center"><span class="camara-name h5 p-2">Shure</span></div>
        </button>
        </div>
        <div class="col-sm">
          <button class="snipcart-add-item btn btn-dark btn-lg rounded-pill p-3 font-weight-bold"
          data-item-id="ElGato"
          data-item-price="99.99"
          data-item-url="/paintings/starry-night"
          data-item-description="Microfono ElGato de maxima calidad."
          data-item-image="../resources/img/microfono3.png"
          data-item-name="ElGato"
          data-item-custom1-name="Frame color"
          data-item-custom1-options="Black|V2[+10.00]|V3[+40.00]">
          <img src="../resources/img/microfono3.png" alt="camara Canon" class="w-100 camara">
          <div class="text-center"><span class="camara-name h5 p-2">ElGato</span></div>
        </button>
        </div>
        <div id="myButton" class="col-sm">
          <button class="snipcart-add-item btn btn-dark btn-lg rounded-pill p-3 font-weight-bold"
          data-item-id="Blue-Yeti"
          data-item-price="149.99"
          data-item-url="/paintings/starry-night"
          data-item-description="Microfono Blue Yeti de maxima calidad."
          data-item-image="../resources/img/microfono4.png"
          data-item-name="Blue Yeti"
          data-item-custom1-name="Frame color"
          data-item-custom1-options="Black|Brown[+10.00]|Gold[+15.00]">
          <img src="../resources/img/microfono4.png" alt="camara Logitect" class="w-100 camara">
          <div class="text-center"><span class="camara-name h5 p-2">Blue Yeti</span></div>
        </button>
        </div>
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
<button class="snipcart-add-item"
  data-item-id="starry-night"
  data-item-price="79.99"
  data-item-url="/paintings/starry-night"
  data-item-description="High-quality replica of The Starry Night by the Dutch post-impressionist painter Vincent van Gogh."
  data-item-image="../resources/img/microfono4.png"
  data-item-name="The Starry Night"
  data-item-custom1-name="Frame color"
  data-item-custom1-options="Black|Brown[+100.00]|Gold[+300.00]">
  Add to cart
</button>

  {{-- <div class="video-container">
  <video controls>
    <source src="../resources/img/ELDEN RING - Official Gameplay Reveal.mp4" type="video/mp4">
  </video>
</div> --}}
</body>
<script>
  window.SnipcartSettings = {
    publicApiKey: "M2M2NzhkYWUtZTMzOC00YmI5LThkMDktMDkyN2MxNWUyYTg5NjM4MTg3NDU4MzYyODc4MjUx",
    loadStrategy: "on-user-interaction",
    modalStyle: "side",
  };

  (function(){var c,d;(d=(c=window.SnipcartSettings).version)!=null||(c.version="3.0");var s,S;(S=(s=window.SnipcartSettings).timeoutDuration)!=null||(s.timeoutDuration=2750);var l,p;(p=(l=window.SnipcartSettings).domain)!=null||(l.domain="cdn.snipcart.com");var w,u;(u=(w=window.SnipcartSettings).protocol)!=null||(w.protocol="https");var m,g;(g=(m=window.SnipcartSettings).loadCSS)!=null||(m.loadCSS=!0);var y=window.SnipcartSettings.version.includes("v3.0.0-ci")||window.SnipcartSettings.version!="3.0"&&window.SnipcartSettings.version.localeCompare("3.4.0",void 0,{numeric:!0,sensitivity:"base"})===-1,f=["focus","mouseover","touchmove","scroll","keydown"];window.LoadSnipcart=o;document.readyState==="loading"?document.addEventListener("DOMContentLoaded",r):r();function r(){window.SnipcartSettings.loadStrategy?window.SnipcartSettings.loadStrategy==="on-user-interaction"&&(f.forEach(function(t){return document.addEventListener(t,o)}),setTimeout(o,window.SnipcartSettings.timeoutDuration)):o()}var a=!1;function o(){if(a)return;a=!0;let t=document.getElementsByTagName("head")[0],n=document.querySelector("#snipcart"),i=document.querySelector('src[src^="'.concat(window.SnipcartSettings.protocol,"://").concat(window.SnipcartSettings.domain,'"][src$="snipcart.js"]')),e=document.querySelector('link[href^="'.concat(window.SnipcartSettings.protocol,"://").concat(window.SnipcartSettings.domain,'"][href$="snipcart.css"]'));n||(n=document.createElement("div"),n.id="snipcart",n.setAttribute("hidden","true"),document.body.appendChild(n)),h(n),i||(i=document.createElement("script"),i.src="".concat(window.SnipcartSettings.protocol,"://").concat(window.SnipcartSettings.domain,"/themes/v").concat(window.SnipcartSettings.version,"/default/snipcart.js"),i.async=!0,t.appendChild(i)),!e&&window.SnipcartSettings.loadCSS&&(e=document.createElement("link"),e.rel="stylesheet",e.type="text/css",e.href="".concat(window.SnipcartSettings.protocol,"://").concat(window.SnipcartSettings.domain,"/themes/v").concat(window.SnipcartSettings.version,"/default/snipcart.css"),t.prepend(e)),f.forEach(function(v){return document.removeEventListener(v,o)})}function h(t){!y||(t.dataset.apiKey=window.SnipcartSettings.publicApiKey,window.SnipcartSettings.addProductBehavior&&(t.dataset.configAddProductBehavior=window.SnipcartSettings.addProductBehavior),window.SnipcartSettings.modalStyle&&(t.dataset.configModalStyle=window.SnipcartSettings.modalStyle),window.SnipcartSettings.currency&&(t.dataset.currency=window.SnipcartSettings.currency),window.SnipcartSettings.templatesUrl&&(t.dataset.templatesUrl=window.SnipcartSettings.templatesUrl))}})();
</script>
<script src="../resources/js/botonCheck.js"></script>
</html>