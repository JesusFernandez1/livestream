{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
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
    <div>
    <form method="POST" action="{{ route('register') }}">
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
      <div class="text-center fs-1 fw-bold">Register</div>

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
          id="name"
          type="text"
          name="name"
          placeholder="Nombre"
          :value="old('name')" required autofocus
        />
      </div>

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
          id="lastname"
          type="text"
          name="lastname"
          placeholder="Apellido"
          :value="old('lastname')" required autofocus
        />
      </div>

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
          placeholder="Correo"
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
          name="password"
          placeholder="Contraseña"
          required autocomplete="new-password"
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
          id="password_confirmation"
          type="password"
          name="password_confirmation"
          placeholder="Repetir contraseña"
          required
        />
      </div>
      <x-button class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm">
        Registrar
    </x-button>
    </form>
      <div class="d-flex gap-1 justify-content-center mt-1">
        <div>Ya tienes una cuenta?</div>
        <a href="{{ route('login') }}" class="text-decoration-none text-info fw-semibold"
          >Login</a
        >
      </div>
    </div>
    </div>
  </body>
</html>