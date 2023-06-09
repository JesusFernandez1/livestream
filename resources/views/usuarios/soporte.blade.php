@extends('baseForm')
   @section('mostrarExtensionForm')
   <section class="d-flex justify-content-center align-items-center">
    <div class="card shadow col-xs-12 col-sm-6 col-md-6 col-lg-4 p-4 formulario-con-fondo"> 
        <div class="mb-4 d-flex justify-content-start align-items-center">
            <h4>  <i class="bi bi-chat-left-quote"></i> &nbsp;Contacto</h4>
        </div>
        <div class="mb-1">
            <form id = "contacto" action="{{ route('usuarios.enviarComentario') }}" method="POST">
              <div class="row">
                <div class="col-3">
                    <label for="nombre_usuario"> <i class="bi bi-person-fill"></i> Nombre:</label>
                    <input readonly type="text" class="form-control" name="nombre_usuario" value="{{ $usuario->name }}">
                    @error('nombre_usuario')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-6 mt-4">
                        <label for="correo_usuario"><i class="bi bi-envelope-fill"></i> Correo:</label>
                        <input readonly type="text" class="form-control" name="correo_usuario" value="{{ $usuario->email }}">
                        @error('correo_usuario')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-6 mt-4">
                    <label for="asunto"> <i class="bi bi-pen-fill"></i> Asunto:</label>
                    <input type="text" class="form-control" name="asunto" value="{{ old("asunto") }}">
                    @error('asunto')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 mt-4">
                    <label for="mensaje"> <i class="bi bi-envelope-fill"></i> Mensaje:</label>
                    <textarea class="form-control" name="mensaje" rows="3" value="{{ old("mensaje") }}"></textarea>
                    @error('mensaje')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-1"></div> <!-- Columna vacía para crear espacio -->
                <div class="col-5 mt-5">
                  <a class="col-12 btn btn-danger d-flex justify-content-center" href="{{ route('/')}}" role="button">
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
    body{
        background: url(../../resources/img/contacto.png) center / cover !important
    }
    .formulario-con-fondo {
        background-color: #E08159;
        backdrop-filter: blur(10px);
    }
    .icono {
        margin-left: 7px;
    }
</style>
@endsection