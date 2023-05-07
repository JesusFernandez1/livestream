@extends('base')

   @section('mostrarExtension')
   <p>Total Price: {{ $total_price }}</p>
   <main class="table">
    <section class="table__header">
        <h1>Realizar pedido</h1>
    </section>
        <section class="table__body">
          <table>
            <form action="{{ route('pedidos.store') }}" class="row g-3" method="POST">
              <div class="col-md-3">
                <label for="inputPassword4" class="form-label">DNI</label>
                <input type="text" class="form-control" name="DNI" value="{{ old("DNI") }}">
                @error('DNI')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
              </div>
                <div class="col-md-3">
                  <label for="inputPassword4" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="{{ old("nombre") }}">
                  @error('nombre')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-md-3">
                  <label for="inputCity" class="form-label">Apellido</label>
                  <input type="text" class="form-control" name="apellido" value="{{ old("apellido") }}">
                  @error('apellido')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-3">
                  <label for="inputAddress" class="form-label">Telefono</label>
                  <input type="text" class="form-control" placeholder="telefono" name="telefono" value="{{ old("telefono") }}">
                  @error('telefono')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Correo</label>
                  <input type="text" class="form-control" placeholder="example@gamil.com" name="correo" value="{{ old("correo")}}">
                  @error('correo')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-md-3">
                    <label for="inputState" class="form-label">Comunidad</label>
                    <select name="comunidad_id" id="comunidad_id">
                      <option disabled value="">Selecciona una comunidad autónoma</option>
                      @foreach ($comunidades as $comunidad)
                          <option value="{{ $comunidad->id }}">{{ $comunidad->nombre }}</option>
                      @endforeach
                    </select>
                    @error('estado')
                    <small style="color: red">{{ $message }}</small>
                      @enderror
                  </div>
                  <div class="col-md-3">
                      <label for="inputState" class="form-label">Provincia</label>
                      <select name="provincia_id" id="provincia_id">
                          <option disabled value="">Selecciona una provincia</option>
                      </select>
                      @error('estado')
                      <small style="color: red">{{ $message }}</small>
                        @enderror
                    </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Direccion</label>
                  <input type="text" class="form-control" name="direccion" value="{{ old("direccion")}}">
                  @error('direccion')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Datos adicionales</label>
                  <input type="text" class="form-control" name="datos_adicionales" value="{{ old("datos_adicionales")}}">
                  @error('datos_adicionales')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Observaciones</label>
                  <input type="text" class="form-control" name="observaciones" value="{{ old("observaciones")}}">
                  @error('observaciones')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Codigo postal</label>
                  <input type="text" class="form-control" name="codigo_postal" value="{{ old("codigo_postal")}}">
                  @error('codigo_postal')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Fecha del pedido</label>
                  <input type="text" class="form-control" name="fecha_pedido" value="{{ old("fecha_pedido")}}">
                  @error('fecha_pedido')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Fecha de entrega</label>
                  <input type="text" class="form-control" name="fecha_entrega" value="{{ old("fecha_entrega")}}">
                  @error('fecha_entrega')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                  <div class="col-2">
                    <label for="inputAddress2" class="form-label">Importe total</label>
                    <input type="text" class="form-control" name="importe_total" value="{{ old("importe_total")}}">
                    @error('importe_total')
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


