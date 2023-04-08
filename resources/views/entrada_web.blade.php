<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Elden Ring</title>
  <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
  <link rel="stylesheet" href="../resources/css/main.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

  <!-- NAVBAR-->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="img/logoFrom.png" alt="" width="200">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="#">Intro</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Mas vendidos</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Nuestros productos</a></li>
    {{-- @if (Route::has('login'))
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
        @endif --}}</li>
        </ul>
      </div>

    </div>
  </nav>

  <!-- CAROUSEL-->
  <div class="carousel slide" id="mainSlider" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../resources/img/camara1.jpg" alt="Portada de camara1" class="d-block w-100">
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
  <!-- boss-->

  <div id="boss">
  <div class="container-md p-5">

    <div class="row pt-5">
      <h3 class="text-center pb-5 pt-5 h1">Los mas vendidos!</h3>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card h-100 card-border">
          <img src="img/caballero.jpg" class="card-img-top" alt="Enemigo comun en Elden Ring, caballero">
          <div class="card-body">
            <p class="card-text">Commander O'Neil is a human who wields a halberd with a battle standard and summons
              aid from ghostly warriors. He can be found at the heart of the Swamp of Aeonia in eastern Caelid. This
              is an optional boss as players are not required to defeat him in order to advance in Elden Ring, but he
              provides useful items and Runes upon defeat.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 card-border">
          <a href="#malenia" data-toggle="modal"><img src="img/male.jpg" class="card-img-top" alt="Uno de los jefes mas dificiles, La espada de Miquella"></a>
          <div class="card-body">
            <p class="card-text">Malenia was born as a twin to Miquella, the most powerful of the Empyreans. She is
              renowned for her legendary battle against Starscourge Radahn during the Shattering, during which she
              unleashed the power of the Scarlet Rot, reducing Caelid to ruins. Wielding a prosthetic arm and leg,
              Malenia is located in Elphael, Brace of the Haligtree.</p>
          </div>
          <div class="alert alert-warning">
            <strong>Cuidado!</strong> Este boss es un abuso de personaje
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 card-border">
          <img src="img/fin.jpg" class="card-img-top" alt="Chica misteriosa que te guia en Elden Ring">
          <div class="card-body">
            <p class="card-text">She is a mysterious young lady seen in an opening cutscene with Torrent, the Spirit
              Steed, and first met at the beginning of the Tarnished's journey. Melina wears a black robe and
              approaches players while they are resting at different Sites of Grace. She offers guidance throughout
              the game, grants the ability to level up and teleports you to certain key areas. She also later becomes
              available as an NPC Summon.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <div id="separator-figuras">
    <div class="content bg-dark"></div>
  </div>

  <div id="figuras">
    <div class="container">
      <div class="row">
        <h2 class="text-center text-danger text-shadow h1">Nuestros productos:</h2>
      </div>
      <div class="row row-cols-1 row-cols-2 row-cols-sm-2 row-cols-md-4">
        <div class="col-sm">
          <img src="img/figura2.png" alt="Figura de un guerrero" class="w-100 figura">
          <div class="text-center"><span class="figura-name h5 p-2">Warrior</span></div>
        </div>
        <div class="col-sm">
          <img src="img/figura3.png" alt="Figura de un healer" class="w-100 figura">
          <div class="text-center"><span class="figura-name h5 p-2">Healer</span></div>
        </div>
        <div class="col-sm">
          <img src="img/figura4.png" alt="Figura de un ladron" class="w-100 figura">
          <div class="text-center"><span class="figura-name h5 p-2">Thief</span></div>
        </div>
        <div id="myButton" class="col-sm">
          <img src="img/figura5.png" alt="Figura de un no-muerto" class="w-100 figura">
          <div class="text-center"><span class="figura-name h5 p-2">Death</span></div>
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
    <source src="img/ELDEN RING - Official Gameplay Reveal.mp4" type="video/mp4">
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