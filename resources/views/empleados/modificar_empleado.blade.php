@extends('baseForm')
   @section('mostrarExtensionForm')
   <section class="d-flex justify-content-center align-items-center">
    <div class="card shadow col-xs-12 col-sm-6 col-md-6 col-lg-4   p-4"> 
        <div class="mb-4 d-flex justify-content-start align-items-center">
            <h4>  <i class="bi bi-chat-left-quote"></i> &nbsp; Contacto</h4>
        </div>
        <div class="mb-1">
            <form id = "contacto" action="{{ route('empleados.update', $empleado) }}" method="POST">
              @method('put')
              <div class="row">
                <div class="col-12">
                  <label for="DNI"> DNI:</label>
                  <input type="text" class="form-control" name="DNI" value="{{ old("DNI", $empleado->DNI) }}">
                  @error('DNI')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
              </div>
                <div class="col-6 mt-5">
                    <label for="nombre"> <i class="bi bi-person-fill"></i>Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="{{ old("nombre", $empleado->nombre) }}">
                    @error('nombre')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6 mt-5">
                    <label for="apellido"> <i class="bi bi-person-bounding-box"></i>Apellido:</label>
                    <input type="text" class="form-control" name="apellido" value="{{ old("apellido", $empleado->apellido) }}">
                    @error('apellido')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            
                <div class="col-4 mt-5">
                  <label for="telefono"><i class="bi bi-telephone-fill"></i> Telefono:</label>
                  <input type="text" class="form-control" name="telefono" value="{{ old("telefono", $empleado->telefono) }}">
                  @error('telefono')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
              </div>
                <div class="col-8 mt-5">
                    <label for="correo"> <i class="bi bi-person-fill"></i>Correo:</label>
                    <input type="text" class="form-control" name="correo" value="{{ old("correo", $empleado->correo) }}">
                    @error('correo')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-4 mt-4">
                  <label for="inputState" class="form-label">Role</label>
                  <select id="inputState" class="form-select" name="role">
                    <option selected>{{ old("role", $empleado->role)}}</option>
                    <option>Admin</option>
                    <option>Empleado</option>
                  </select>
                  @error('role')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>              
            </div>
            <div class="row">
                <div class="col-1"></div> <!-- Columna vacía para crear espacio -->
                <div class="col-5 mt-5">
                  <a class="col-12 btn btn-danger d-flex justify-content-center" href="{{ route('empleados.index')}}" role="button">
                    <span>Cancelar</span> <i class="bi bi-x-square-fill icono"></i>
                  </a>                
                </div>
                <div class="col-5 mt-5">
                  <button id="botton" class="col-12 btn btn-primary d-flex justify-content-center" style="margin-bottom: 10px;">
                    <span>Enviar</span>
                    <i class="bi bi-check-square-fill icono"></i>
                  </button>   
                </div>
                <div class="col-1"></div> <!-- Columna vacía para crear espacio -->
              </div>     
            </form>
        </div>
    </div>
</section>
<style>
    *{
    padding: 0;
    margin: 0;
}
html, body, section {
    height: 100%;
    min-height: 100%;
}
body{
    background-color: lightgray;
    background: url(../../../resources/img/fondo1.jpg) center / cover !important
}
.icono {
        margin-left: 7px;
    }
</style>
@endsection