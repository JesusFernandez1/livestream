<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LiveStream</title>
  <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
  <link rel="stylesheet" href="../resources/css/main.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

  <!-- NAVBAR-->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      {{-- <a class="navbar-brand" href="#">
        <img src="img/logoFrom.png" alt="" width="200">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> --}}

      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="{{ route('pedido.create') }}">Intro</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Mas vendidos</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Nuestros productos</a></li>
     @if (Route::has('login'))
          <li class="nav-item">
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
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
        <img src="../resources/img/camara2.jpg" alt="Portada de camara2" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="../resources/img/camara3.jpg" alt="Portada de camara3" class="d-block w-100">
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

    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card h-100 card-border">
          <img src="../resources/img/camara4.png" class="card-img-top" alt="Camara Sony 4k">
          <div class="card-body">
            <p class="card-text">Este excelente y completo camcorder es la elección perfecta para una amplia variedad de tomas con una sola cámara 4K y HD con un nuevo sensor 3CMOS de tipo 1/3. Un potente objetivo con zoom 25x con tres anillos de zoom independientes ofrece imágenes 4K de perfecta nitidez en prácticamente cualquier situación de grabación profesional. El AF con reconocimiento facial avanzado y el exclusivo filtro de densidad neutra variable electrónico de Sony permiten grabar contenidos excelentes sin complicaciones.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 card-border">
          <a href="#malenia" data-toggle="modal"><img src="../resources/img/microfono2.png" class="card-img-top" alt="Microfono Shure"></a>
          <div class="card-body">
            <p class="card-text">El Shure SM7B es un micrófono dinámico de bobina móvil con característica cardioide fija ideal para grabar locuciones y voces, aunque también hace muy buena camara en las tomas de instrumentos. Su rango de transmisión amplio y lineal proporciona una reproducción natural de voces e instrumentos. Un absorbente por amortiguación de aire contra las vibraciones y un blindaje sofisticado evitan que las interferencias electromagnéticas mecánicas y de banda ancha de cualquier tipo puedan afectar a las grabaciones. De manera que, ¡nada se interpone ante una grabación libre de problemas!</p>
          </div>
          <div class="alert alert-warning">
            <strong>Cuidado!</strong>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 card-border">
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
          <img src="../resources/img/camara2.png" alt="camara Nikon" class="w-100 camara">
          <div class="text-center"><span class="camara-name h5 p-2">Warrior</span></div>
        </div>
        <div class="col-sm">
          <img src="../resources/img/camara3.png" alt="camara Canon" class="w-100 camara">
          <div class="text-center"><span class="camara-name h5 p-2">Healer</span></div>
        </div>
        <div class="col-sm">
          <img src="../resources/img/camara6.png" alt="camara Canon" class="w-100 camara">
          <div class="text-center"><span class="camara-name h5 p-2">Thief</span></div>
        </div>
        <div id="myButton" class="col-sm">
          <img src="../resources/img/camara8.png" alt="camara Logitect" class="w-100 camara">
          <div class="text-center"><span class="camara-name h5 p-2">Death</span></div>
        </div>
      </div>
      
      <div class="row py-5">
        <div class="col text-center">
          <a href="#" class="link-dark">
            <button class="btn btn-dark btn-lg rounded-pill p-3 font-weight-bold">View Elden figures catalog</button>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="video-container">
  <video controls>
    <source src="../resources/img/ELDEN RING - Official Gameplay Reveal.mp4" type="video/mp4">
  </video>
</div>

  <!-- MOdals -->

  <div id="malenia" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">YouTube Video</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe id="cartoonVideo" class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/D_iqjI2p7F4" allowfullscreen></iframe>
              </div>
            </div>
        </div>
    </div>
</div>

  <script>
    $(document).ready(function(){
  $('#myButton').click(function(){
    $(this).fadeOut('slow');
  });
});
  </script>
</body>
</html>