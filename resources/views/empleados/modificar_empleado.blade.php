@extends('base')

   @section('mostrarExtension')

   <main class="table">
    <section class="table__header">
        <h1>Modificar empleado</h1>
    </section>
        <section class="table__body">
          <table>
            <form action="{{ route('empleados.update', $empleado) }}" class="row g-3" method="POST">
                @method('put')
              <div class="col-md-3">
                <label for="inputPassword4" class="form-label">DNI</label>
                <input type="text" class="form-control" name="DNI" value="{{ old("DNI", $empleado->DNI) }}">
                @error('DNI')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
              </div>
                <div class="col-md-3">
                  <label for="inputPassword4" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="{{ old("nombre", $empleado->nombre) }}">
                  @error('nombre')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-md-3">
                  <label for="inputCity" class="form-label">Apellido</label>
                  <input type="text" class="form-control" name="apellido" value="{{ old("apellido", $empleado->apellido) }}">
                  @error('apellido')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-3">
                  <label for="inputAddress" class="form-label">Telefono</label>
                  <input type="text" class="form-control" placeholder="telefono" name="telefono" value="{{ old("telefono", $empleado->telefono) }}">
                  @error('telefono')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Correo</label>
                  <input type="text" class="form-control" placeholder="example@gamil.com" name="correo" value="{{ old("correo", $empleado->correo )}}">
                  @error('correo')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-md-3">
                  <label for="inputState" class="form-label">Role</label>
                  <select id="inputState" class="form-select" name="role">
                    <option selected>{{ old("role", $empleado->role)}}</option>
                    <option>Admin</option>
                    <option>Operario</option>
                  </select>
                  @error('role')
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