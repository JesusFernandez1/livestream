@extends('baseForm')
   @section('mostrarExtensionForm')
   <section class="d-flex justify-content-center align-items-center">
    <div class="card shadow col-xs-12 col-sm-6 col-md-6 col-lg-4   p-4"> 
        <div class="mb-4 d-flex justify-content-start align-items-center">
            <h4>  <i class="bi bi-chat-left-quote"></i> &nbsp; Contacto</h4>
        </div>
        <div class="mb-1">
            <form id = "contacto" action="{{ route('usuarios.update', $usuario) }}" method="POST">
              @method('put')
              <div class="row">
                <div class="col-12">
                  <label for="DNI"> DNI:</label>
                  <input type="text" class="form-control" name="DNI" value="{{ old("DNI", $usuario->DNI) }}">
                  @error('DNI')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
              </div>
                <div class="col-6 mt-5">
                    <label for="name"> <i class="bi bi-person-fill"></i> Nombre:</label>
                    <input type="text" class="form-control" name="name" value="{{ old("name", $usuario->name) }}">
                    @error('name')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6 mt-5">
                    <label for="lastname"> <i class="bi bi-person-bounding-box"></i> Apellido:</label>
                    <input type="text" class="form-control" name="lastname" value="{{ old("lastname", $usuario->lastname) }}">
                    @error('lastname')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            
                <div class="col-4 mt-5">
                  <label for="phone"><i class="bi bi-telephone-fill"></i> Telefono:</label>
                  <input type="text" class="form-control" name="phone" value="{{ old("phone", $usuario->phone) }}">
                  @error('phone')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
              </div>
                <div class="col-8 mt-5">
                    <label for="email"> <i class="bi bi-envelope-at-fill"></i> Correo:</label>
                    <input type="text" class="form-control" name="email" value="{{ old("email", $usuario->email) }}">
                    @error('email')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>           
            </div>
              <div class="mb-2 mt-5">
                <button id ="botton" class="col-12 btn btn-primary d-flex justify-content-between ">
                    <span> Confirmar </span><i class="bi bi-check-square-fill"></i>
                </button>
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
</style>
@endsection