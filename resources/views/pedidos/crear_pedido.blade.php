@extends('baseForm')

@section('mostrarExtensionForm')
<section class="d-flex justify-content-center align-items-center">
 <div class="card shadow col-xs-12 col-sm-6 col-md-6 col-lg-4   p-4"> 
     <div class="mb-4 d-flex justify-content-start align-items-center">
         <h4>  <i class="bi bi-chat-left-quote"></i> &nbsp; Contacto</h4>
     </div>
     <div class="mb-1">
         <form id = "contacto" action="{{ route('pedidos.realizarPedido', $totalPrice) }}" method="POST">
           <div class="row">
             <div class="col-9">
               <label for="DNI"> DNI:</label>
               <input type="text" class="form-control" name="DNI" value="{{ old("DNI", $usuario->first()->DNI) }}">
               @error('DNI')
                   <small style="color: red">{{ $message }}</small>
               @enderror
            </div>
             <div class="col-6 mt-5">
                 <label for="nombre"> <i class="bi bi-person-fill"></i> Nombre:</label>
                 <input type="text" class="form-control" name="nombre" value="{{ old("nombre", $usuario->first()->name) }}">
                 @error('nombre')
                     <small style="color: red">{{ $message }}</small>
                 @enderror
             </div>
             <div class="col-6 mt-5">
                 <label for="apellido"> <i class="bi bi-person-bounding-box"></i> Apellido:</label>
                 <input type="text" class="form-control" name="apellido" value="{{ old("apellido", $usuario->first()->lastname) }}">
                 @error('apellido')
                     <small style="color: red">{{ $message }}</small>
                 @enderror
             </div>
             <div class="col-4 mt-5">
               <label for="telefono"><i class="bi bi-telephone-fill"></i> Telefono:</label>
               <input type="text" class="form-control" name="telefono" value="{{ old("telefono", $usuario->first()->phone) }}">
               @error('telefono')
                   <small style="color: red">{{ $message }}</small>
               @enderror
            </div>
            <div class="col-8 mt-5">
                 <label for="correo"> <i class="bi bi-envelope-at-fill"></i> Correo:</label>
                 <input type="text" class="form-control" name="correo" placeholder="ejemplo@gmail.com" value="{{ old("correo", $usuario->first()->email) }}">
                 @error('correo')
                     <small style="color: red">{{ $message }}</small>
                 @enderror
             </div>
             <div class="col-6 mt-5">
                <label for="inputState" class="form-label"><i class="bi bi-pin-map-fill"></i> Comunidad</label>
                <select name="comunidades_id" id="comunidades_id" class="form-select">
                    <option selected disabled value="">Selecciona una comunidad autónoma</option>
                    @foreach ($comunidades as $comunidad)
                        <option value="{{ $comunidad->id }}">{{ $comunidad->nombre }}</option>
                    @endforeach
                </select>
                @error('comunidades_id')
                    <small style="color: red">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-6 mt-5">
                <label for="inputState" class="form-label"><i class="bi bi-geo"></i> Provincia</label>
                <select name="provincias_cod" id="provincias_cod" class="form-select">
                    <option value="">Selecciona una provincia</option>
                </select>
                @error('provincias_cod')
                    <small style="color: red">{{ $message }}</small>
                @enderror
              </div>
             <div class="col-6 mt-5">
                <label for="direccion"> <i class="bi bi-signpost-2-fill"></i> Direccion:</label>
                <input type="text" class="form-control" name="direccion" value="{{ old("direccion") }}">
                @error('direccion')
                     <small style="color: red">{{ $message }}</small>
                 @enderror
            </div>
            <div class="col-6 mt-5">
                <label for="codigo_postal"> <i class="bi bi-mailbox2"></i> Codigo postal:</label>
                <input type="text" class="form-control" name="codigo_postal" value="{{ old("codigo_postal") }}">
                @error('codigo_postal')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>  
            <div class="col-6 mt-5">
                <label for="datos_adicionales"> <i class="bi bi-card-heading"></i> Datos adicionales:</label>
                <input type="text" class="form-control" placeholder="Puerta, piso, nª..." name="datos_adicionales" value="{{ old("datos_adicionales") }}">
                @error('datos_adicionales')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-6 mt-5">
                <label for="observaciones"> <i class="bi bi-card-heading"></i> Observaciones:</label>
                <input type="text" class="form-control" name="observaciones" value="{{ old("observaciones") }}">
                @error('observaciones')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-6 mt-5">
                <label for="fecha_pedido" class="form-label"><i class="bi bi-calendar-fill"></i> Fecha del pedido</label>
                <input readonly type="datetime-local" class="form-control" name="fecha_pedido" value="{{ $fecha_actual }}">
                @error('fecha_pedido')
                    <small style="color: red">{{ $message }}</small>
                @enderror
              </div>
              <div class="col-6 mt-5">
                <label for="fecha_entrega" class="form-label"><i class="bi bi-calendar-fill"></i> Fecha estimada de la entrega</label>
                <input readonly type="datetime-local" class="form-control" name="fecha_entrega" value="{{ $fecha_estimada }}">
                @error('fecha_entrega')
                    <small style="color: red">{{ $message }}</small>
                @enderror
              </div> 
          </div>
            <div class="col-4 mt-5">
                <label for="importe_total"> <i class="bi bi-cash-coin"></i> Importe: {{$totalPrice}}</label>
            </div>
           <div class="mb-2 mt-5">
             <button id ="botton" class="col-12 btn btn-primary d-flex justify-content-between ">
                 <span> Enviar </span><i class="bi bi-check-square-fill"></i>
             </button>
           </div>    
         </form>
     </div>
 </div>
</section>
<script>
    $(function() {
        $('#comunidades_id').change(function() {
            var comunidadId = $(this).val();
            if (comunidadId) {
                $.get('{{ url('provincias') }}/' + comunidadId, function(provincias) {
                    $('#provincias_cod').empty().append($('<option>').val('').text('Selecciona una provincia'));
                    $.each(provincias, function(key, provincia) {
                        $('#provincias_cod').append($('<option>').val(provincia.cod).text(provincia.nombre));
                    });
                });
            } else {
                $('#provincias_cod').empty().append($('<option>').val('').text('Selecciona una provincia'));
            }
        });
    });
</script>
@endsection


