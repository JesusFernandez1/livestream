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
      <div class="text-center fs-1 fw-bold">Cambiar contraseña</div>
      <form id = "contacto" action="{{ route('usuarios.cambiarPass') }}" method="POST">
        <div class="input-group mt-1">
            <div class="input-group-text bg-info">
              <img
                src="../../resources/img/password-icon.svg"
                alt="password-icon"
                style="height: 1rem"
              />
            </div>
    
            <x-input
              class="form-control bg-light"
              id="password"
              type="password"
              name="password"
              placeholder="Contraseña"
              required autocomplete="new-password"
            />
          </div>
          @error('password')
            <small style="color: red">{{ $message }}</small>
          @enderror
    
          <div class="input-group mt-1">
            <div class="input-group-text bg-info">
              <img
                src="../../resources/img/password-icon.svg"
                alt="password-icon"
                style="height: 1rem"
              />
            </div>
    
            <x-input
              class="form-control bg-light"
              id="password_confirmation"
              type="password"
              name="password_confirmation"
              placeholder="Repetir contraseña"
              required
            />
          </div>
          <x-button class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm">
            Confirmar
        </x-button>
    </form>
      <a class="d-flex gap-1 justify-content-center mt-1 btn btn-secondary custom-button" href="{{ route('/')}}" role="button"><i class="bi bi-arrow-left-square"></i> Volver al inicio</a>
    </div>
  </body>
</html>