@extends('base')

   @section('mostrarExtension')

   <main class="table">
    <section class="table__header">
        <h1>Modificar producto</h1>
    </section>
        <section class="table__body">
          <table>
            <form action="{{ route('productos.update', $producto) }}" class="row g-3" method="POST">
                @method('put')
                <div class="col-md-3">
                  <label for="inputPassword4" class="form-label">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="{{ old("nombre", $producto->nombre) }}">
                  @error('nombre')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-md-3">
                  <label for="inputCity" class="form-label">Stock</label>
                  <input type="text" class="form-control" name="stock" value="{{ old("stock", $producto->stock) }}">
                  @error('stock')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-3">
                  <label for="inputAddress" class="form-label">Description</label>
                  <input type="text" class="form-control" placeholder="description" name="description" value="{{ old("description", $producto->description) }}">
                  @error('description')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                  <label for="inputAddress2" class="form-label">Precio</label>
                  <input type="text" class="form-control" placeholder="example@gamil.com" name="precio" value="{{ old("precio", $producto->precio )}}">
                  @error('precio')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-2">
                    <label for="inputAddress2" class="form-label">Marca</label>
                    <input type="text" class="form-control" placeholder="example@gamil.com" name="marcas_id" value="{{ old("marcas_id", $producto->marcas_id )}}">
                    @error('marcas_id')
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