<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="../resources/img/logo-vt.svg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap Login Page</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
  </head>
  <body class="bg-info d-flex justify-content-center align-items-center vh-100">
    <form method="POST" action="{{ route('login') }}">
        @csrf
    <div
      class="bg-white p-5 rounded-5 text-secondary shadow"
      style="width: 25rem"
    >
      <div class="d-flex justify-content-center">
        <img
          src="../resources/img/login-icon.svg"
          alt="login-icon"
          style="height: 7rem"
        />
      </div>
      <div class="text-center fs-1 fw-bold">Login</div>
      <div class="input-group mt-4">
        <div class="input-group-text bg-info">
          <img
            src="../resources/img/username-icon.svg"
            alt="username-icon"
            style="height: 1rem"
          />
        </div>
        <x-input
          class="form-control bg-light"
          id="email"
          type="email"
          name="email"
          placeholder="Email"
          :value="old('email')" required autofocus
        />
      </div>
      <div class="input-group mt-1">
        <div class="input-group-text bg-info">
          <img
            src="../resources/img/password-icon.svg"
            alt="password-icon"
            style="height: 1rem"
          />
        </div>
        <x-input
          class="form-control bg-light"
          id="password"
          type="password"
          placeholder="Password"
          name="password"
          required autocomplete="current-password"
        />
      </div>
      <div class="d-flex justify-content-around mt-1">
        <div class="d-flex align-items-center gap-1">
          <input class="form-check-input" type="checkbox" />
          <div class="pt-1" style="font-size: 0.9rem">Remember me</div>
        </div>
        <div class="pt-1">
          <a
            href="#"
            class="text-decoration-none text-info fw-semibold fst-italic"
            style="font-size: 0.9rem"
            >Olvidaste tu contraseña?</a
          >
        </div>
      </div>
      <x-button class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm">
        Login
    </x-button>
    </form>
      <div class="d-flex gap-1 justify-content-center mt-1">
        <div>No tienes una cuenta?</div>
        <a href="{{ route('register') }}" class="text-decoration-none text-info fw-semibold"
          >Registrar</a
        >
      </div>
      <div class="p-3">
        <div class="border-bottom text-center" style="height: 0.9rem">
          <span class="bg-white px-3">or</span>
        </div>
      </div>
      <div
        class="btn d-flex gap-2 justify-content-center border mt-3 shadow-sm"
      >
        <img
          src="../resources/img/google-icon.svg"
          alt="google-icon"
          style="height: 1.6rem"
        />
        <div class="fw-semibold text-secondary">Continue with Google</div>
      </div>
      <div
        class="btn d-flex gap-2 justify-content-center border mt-3 shadow-sm"
      >
        <img
          src="../resources/img/github.png"
          alt="google-icon"
          style="height: 1.6rem"
        />
        <div><a href="{{ route('github.redirectGithub') }}" class="fw-semibold text-secondary">Continuar con Github</a></div>
      </div>
    </div>
  </body>
</html>