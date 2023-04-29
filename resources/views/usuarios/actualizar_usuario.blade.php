@extends('base')

   @section('mostrarExtension')

   <main class="table">
    <section class="table__header">
        <h1>Modificar user</h1>
    </section>
        <section class="table__body">
          <table>
            <form action="{{ route('usuarios.update', $user) }}" class="row g-3" method="POST">
                @method('put')
              <div class="col-md-3">
                <label for="inputPassword4" class="form-label">DNI</label>
                <input type="text" class="form-control" name="DNI" value="{{ old("DNI", $user->DNI) }}">
                @error('DNI')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
              </div>
                <div class="col-md-3">
                  <label for="inputPassword4" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="name" value="{{ old("name", $user->name) }}">
                  @error('name')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-md-3">
                  <label for="inputCity" class="form-label">Apellido</label>
                  <input type="text" class="form-control" name="lastname" value="{{ old("lastname", $user->lastname) }}">
                  @error('lastname')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Email</label>
                  <input type="text" class="form-control" placeholder="example@gamil.com" name="email" value="{{ old("email", $user->email )}}">
                  @error('email')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-3">
                    <label for="inputAddress" class="form-label">Phone</label>
                    <input type="text" class="form-control" placeholder="phone" name="phone" value="{{ old("phone", $user->phone) }}">
                    @error('phone')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                  </div>
                <div class="col-12">
                  <input type="submit" class="btn btn-primary" value="Insert">
                </div>
              </form>
            </table>
        </section>
    </main>
@endsection