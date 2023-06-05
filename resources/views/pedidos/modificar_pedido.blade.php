@extends('baseForm')
   @section('mostrarExtensionForm')
   <section class="d-flex justify-content-center align-items-center">
    <div class="card shadow col-xs-12 col-sm-6 col-md-6 col-lg-4   p-4"> 
        <div class="mb-4 d-flex justify-content-start align-items-center">
            <h4>  <i class="bi bi-chat-left-quote"></i> &nbsp; Contacto</h4>
        </div>
        <div class="mb-1">
            <form id = "contacto" action="{{ route('pedidos.update', $pedido) }}" method="POST">
            @method('put')
              <div class="row">
                <div class="col-3">
                  <label for="DNI"> DNI:</label>
                  <input readonly type="text" class="form-control" name="DNI" value="{{ $pedido->DNI }}">
                  @error('DNI')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
               </div>
                <div class="col-7">
                    <label for="numero_tarjeta"> Nº de tarjeta:</label>
                    <input readonly type="text" class="form-control" name="numero_tarjeta" value="{{ $pedido->numero_tarjeta }}">
                    @error('numero_tarjeta')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-2">
                    <label for="cv"> CV:</label>
                    <input readonly type="text" class="form-control" name="cv" value="{{ $pedido->cv }}">
                    @error('cv')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6 mt-5">
                    <label for="nombre"> <i class="bi bi-person-fill"></i>Nombre:</label>
                    <input readonly type="text" class="form-control" name="nombre" value="{{ $pedido->nombre }}">
                    @error('nombre')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6 mt-5">
                    <label for="apellido"> <i class="bi bi-person-bounding-box"></i>Apellido:</label>
                    <input readonly type="text" class="form-control" name="apellido" value="{{ $pedido->apellido }}">
                    @error('apellido')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-4 mt-5">
                  <label for="telefono"><i class="bi bi-telephone-fill"></i> Telefono:</label>
                  <input readonly type="text" class="form-control" name="telefono" value="{{ $pedido->telefono }}">
                  @error('telefono')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
               </div>
               <div class="col-8 mt-5">
                    <label for="correo"> <i class="bi bi-envelope-at-fill"></i> Correo:</label>
                    <input readonly type="text" class="form-control" name="correo" value="{{ $pedido->correo }}">
                    @error('correo')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
               <div class="col-6 mt-5">
                <label for="comunidades_id"> <i class="bi bi-envelope-at-fill"></i> Comunidad:</label>
                <input readonly type="text" class="form-control" name="comunidades_id" value="{{ $pedido->comunidades_id }}">
                @error('comunidades_id')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-6 mt-5">
               <label for="provincias_cod"> <i class="bi bi-signpost-2-fill"></i> Provincia:</label>
               <input readonly type="text" class="form-control" name="provincias_cod" value="{{ $pedido->provincias_cod }}">
               @error('provincias_cod')
                   <small style="color: red">{{ $message }}</small>
               @enderror
           </div>
           <div class="col-6 mt-5">
                <label for="direccion"> <i class="bi bi-signpost-2-fill"></i> Direccion:</label>
                <input readonly type="text" class="form-control" name="direccion" value="{{ $pedido->direccion }}">
                @error('direccion')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
               <div class="col-6 mt-5">
                   <label for="codigo_postal"> <i class="bi bi-mailbox2"></i> Codigo postal:</label>
                   <input readonly type="text" class="form-control" name="codigo_postal" value="{{ $pedido->codigo_postal }}">
                   @error('codigo_postal')
                       <small style="color: red">{{ $message }}</small>
                   @enderror
               </div>  
               <div class="col-6 mt-5">
                   <label for="datos_adicionales"> <i class="bi bi-card-heading"></i> Datos adicionales:</label>
                   <input readonly type="text" class="form-control" placeholder="Puerta, piso, nª..." name="datos_adicionales" value="{{ $pedido->datos_adicionales }}">
                   @error('datos_adicionales')
                       <small style="color: red">{{ $message }}</small>
                   @enderror
               </div>
               <div class="col-6 mt-5">
                   <label for="observaciones"> <i class="bi bi-card-heading"></i> Observaciones:</label>
                   <input readonly type="text" class="form-control" name="observaciones" value="{{ $pedido->observaciones }}">
                   @error('observaciones')
                       <small style="color: red">{{ $message }}</small>
                   @enderror
               </div>
               <div class="col-6 mt-5">
                   <label for="fecha_pedido" class="form-label"><i class="bi bi-calendar-fill"></i> Fecha del pedido</label>
                   <input readonly readonly type="datetime-local" class="form-control" name="fecha_pedido" value="{{ $pedido->fecha_pedido }}">
                   @error('fecha_pedido')
                       <small style="color: red">{{ $message }}</small>
                   @enderror
                 </div>
                 <div class="col-6 mt-5">
                   <label for="fecha_entrega" class="form-label"><i class="bi bi-calendar-check-fill"></i> Fecha de entrega</label>
                   <input type="datetime-local" class="form-control" name="fecha_entrega" value="{{ $pedido->fecha_entrega }}">
                   @error('fecha_entrega')
                       <small style="color: red">{{ $message }}</small>
                   @enderror
                 </div>
                 <div class="col-4 mt-5">
                    <label for="estado"> <i class="bi bi-envelope-at-fill"></i> Estado:</label>
                    <select name="estado" id="estado" class="form-select">
                        <option selected>{{ old('estado', $pedido->estado) }}</option>
                        <option>Pendiente</option>
                        <option>Listo</option>
                        <option>Cancelado</option>
                        <option>Confirmado</option>
                    </select>
                    @error('estado')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                  </div>
               <div class="col-2 mt-5">
                   <label for="importe_total"> <i class="bi bi-cash-coin"></i> Importe:</label>
                   <input readonly type="text" class="form-control" name="importe_total" value="{{ $pedido->importe_total }}">
                   @error('importe_total')
                       <small style="color: red">{{ $message }}</small>
                   @enderror
               </div>      
             </div>
             <div class="row">
                <div class="col-1"></div> <!-- Columna vacía para crear espacio -->
                <div class="col-5 mt-5">
                  <a class="col-12 btn btn-danger d-flex justify-content-center" href="{{ route('pedidos.index')}}" role="button">
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