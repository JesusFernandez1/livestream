<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="../../resources/img/logo-vt.svg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cambiar datos</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
  </head>
  <body class="bg-info d-flex justify-content-center align-items-center vh-100">
    <div
      class="bg-white p-5 rounded-5 text-secondary shadow"
      style="width: 25rem"
    >
      <div class="d-flex justify-content-center">
        <img
          src="../../resources/img/login-icon.svg"
          alt="login-icon"
          style="height: 7rem"
        />
      </div>
      <div class="text-center fs-1 fw-bold">Mis datos</div>
      <form id = "contacto" action="{{ route('usuarios.cambiarDatos') }}" method="POST">
      <div class="input-group mt-4">
        <div class="input-group-text bg-info">
          <img
            src="../../resources/img/username-icon.svg"
            alt="username-icon"
            style="height: 1rem"
          />
        </div>
        <input
          id="name"
          name="name"
          readonly
          class="form-control bg-light"
          type="text"
          placeholder="Nombre"
          value="{{ old("name", $usuario->name) }}"
        />
      </div>
      <div class="input-group mt-1">
        <div class="input-group-text bg-info">
          <img
            src="../../resources/img/username-icon.svg"
            alt="username-icon"
            style="height: 1rem"
          />
        </div>
        <input
          id="lastname"
          name="lastname"
          readonly
          class="form-control bg-light"
          type="text"
          placeholder="Apellido"
          value="{{ old("lastname", $usuario->lastname) }}"
        />
      </div>
      <div class="input-group mt-4">
        <div class="input-group-text bg-info">
          <img
            src="../../resources/img/email.png"
            alt="username-icon"
            style="height: 1rem"
          />
        </div>
        <input
          id="email"
          name="email"
          readonly
          class="form-control bg-light"
          type="text"
          placeholder="Correo"
          value="{{ old("email", $usuario->email) }}"
        />
      </div>
      <div class="input-group mt-1">
        <div class="input-group-text bg-info">
          <img
            src="../../resources/img/telefono.png"
            alt="username-icon"
            style="height: 1rem"
          />
        </div>
        <input
          id="phone"
          name="phone"
          readonly
          class="form-control bg-light"
          type="text"
          placeholder="Telefono"
          value="{{ old("phone", $usuario->phone) }}"
        />
      </div>
      <button id="botonOculto" class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm" style="display: none;">Confirmar cambios</button>
    </form>
      <div id="cambiarDatos" class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm">
        Cambiar datos
      </div>
      <div class="d-flex gap-1 justify-content-center mt-1">
        <div>Quieres cambiar la cotraseña?</div>
        <a href="{{ route('usuarios.verCambiarPass') }}" class="text-decoration-none text-info fw-semibold"
          >Cambiar</a
        >
      </div>
      <div class="p-3">
        <div class="border-bottom text-center" style="height: 0.9rem">
          <span class="bg-white px-3">or</span>
        </div>
      </div>
      <a class="d-flex gap-1 justify-content-center mt-1 btn btn-secondary custom-button" href="{{ route('/')}}" role="button"><i class="bi bi-arrow-left-square"></i> Volver al inicio</a>
    </div>
  </body>
  <script>
    document.getElementById("cambiarDatos").addEventListener("click", function() {
      // Obtener todos los elementos de entrada por su id
      var name = document.getElementById("name");
      var lastname = document.getElementById("lastname");
      var email = document.getElementById("email");
      var phone = document.getElementById("phone");
      // ... otros elementos de entrada
  
      // Quitar el atributo readonly de los elementos de entrada
      name.removeAttribute("readonly");
      lastname.removeAttribute("readonly");
      email.removeAttribute("readonly");
      phone.removeAttribute("readonly");
      // ... quitar readonly de otros elementos de entrada
  
      // Hacer visible el botón oculto
      document.getElementById("botonOculto").style.display = "block";
      document.getElementById("cambiarDatos").style.display = "none";
    });
  </script>
</html>