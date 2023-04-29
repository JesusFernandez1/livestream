@extends('base')

   @section('mostrarExtension')

   <main class="table">
    <section class="table__header">
        <h1>Modificar pedido</h1>
    </section>
        <section class="table__body">
          <table>
            <form action="{{ route('pedidos.update', $pedido) }}" class="row g-3" method="POST">
                @method('put')
              <div class="col-md-3">
                <label for="inputPassword4" class="form-label">DNI</label>
                <input type="text" class="form-control" name="DNI" value="{{ old("DNI", $pedido->DNI) }}">
                @error('DNI')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
              </div>
                <div class="col-md-3">
                  <label for="inputPassword4" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="{{ old("nombre", $pedido->nombre) }}">
                  @error('nombre')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-md-3">
                  <label for="inputCity" class="form-label">Apellido</label>
                  <input type="text" class="form-control" name="apellido" value="{{ old("apellido", $pedido->apellido) }}">
                  @error('apellido')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-3">
                  <label for="inputAddress" class="form-label">Telefono</label>
                  <input type="text" class="form-control" placeholder="telefono" name="telefono" value="{{ old("telefono", $pedido->telefono) }}">
                  @error('telefono')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Correo</label>
                  <input type="text" class="form-control" placeholder="example@gamil.com" name="correo" value="{{ old("correo", $pedido->correo )}}">
                  @error('correo')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Direccion</label>
                  <input type="text" class="form-control"  name="direccion" value="{{ old("direccion", $pedido->direccion )}}">
                  @error('direccion')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Datos adicionales</label>
                  <input type="text" class="form-control"  name="datos_adicionales" value="{{ old("datos_adicionales", $pedido->datos_adicionales )}}">
                  @error('datos_adicionales')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Observaciones</label>
                  <input type="text" class="form-control"  name="observaciones" value="{{ old("observaciones", $pedido->observaciones )}}">
                  @error('observaciones')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Codigo postal</label>
                  <input type="text" class="form-control"  name="codigo_postal" value="{{ old("codigo_postal", $pedido->codigo_postal )}}">
                  @error('codigo_postal')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Fecha del pedido</label>
                  <input type="text" class="form-control"  name="fecha_pedido" value="{{ old("fecha_pedido", $pedido->fecha_pedido )}}">
                  @error('fecha_pedido')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Fecha de entrega</label>
                  <input type="text" class="form-control"  name="fecha_entrega" value="{{ old("fecha_entrega", $pedido->fecha_entrega )}}">
                  @error('fecha_entrega')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-md-3">
                    <label for="inputState" class="form-label">Estado de la entrega</label>
                    <select id="inputState" class="form-select" name="estado">
                      <option selected>{{ old("estado", $pedido->estado)}}</option>
                      <option>Retraso</option>
                      <option>Aceptada</option>
                      <option>Cancelada</option>
                    </select>
                    @error('estado')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="col-2">
                    <label for="inputAddress2" class="form-label">Importe total</label>
                    <input type="text" class="form-control"  name="importe_total" value="{{ old("importe_total", $pedido->importe_total )}}">
                    @error('importe_total')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="col-md-2">
                    <label for="inputState" class="form-label">Cliente</label>
                    <select id="inputState" class="form-select" name="users_id">
                      @foreach ($clientes as $cliente)
                      <option value="{{$cliente->id}}" @selected(old("users_id", $pedido->users_id)==$cliente->id)>{{$cliente->name}}</option>
                      @endforeach
                    </select>
                    @error('users_id')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                  </div>
                  <div class="col-md-2">
                    <label for="inputState" class="form-label">Empleado</label>
                    <select id="inputState" class="form-select" name="users_id">
                      @foreach ($empleados as $empleado)
                      <option value="{{$empleado->id}}" @selected(old("users_id", $pedido->users_id)==$empleado->id)>{{$empleado->nombre}}</option>
                      @endforeach
                    </select>
                    @error('users_id')
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