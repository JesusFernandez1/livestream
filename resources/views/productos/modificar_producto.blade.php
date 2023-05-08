@extends('baseForm')
   @section('mostrarExtensionForm')
   <section class="d-flex justify-content-center align-items-center">
    <div class="card shadow col-xs-12 col-sm-6 col-md-6 col-lg-4   p-4"> 
        <div class="mb-4 d-flex justify-content-start align-items-center">
            <h4>  <i class="bi bi-chat-left-quote"></i> &nbsp; Contacto</h4>
        </div>
        <div class="mb-1">
            <form id = "contacto" action="{{ route('productos.update', $producto) }}" method="POST">
              @method('put')
              <div class="row">
                <div class="col-6 mt-5">
                    <label for="nombre"> <i class="bi bi-person-fill"></i>Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="{{ old("nombre", $producto->nombre) }}">
                    @error('nombre')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6 mt-5">
                    <label for="stock"> <i class="bi bi-person-bounding-box"></i>Stock:</label>
                    <input type="text" class="form-control" name="stock" value="{{ old("stock", $producto->stock) }}">
                    @error('stock')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            
                <div class="col-4 mt-5">
                  <label for="descripcion"><i class="bi bi-telephone-fill"></i> Descripcion:</label>
                  <input type="text" class="form-control" name="descripcion" value="{{ old("descripcion", $producto->descripcion) }}">
                  @error('descripcion')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
              </div>
                <div class="col-8 mt-5">
                    <label for="precio"> <i class="bi bi-person-fill"></i>Precio:</label>
                    <input type="text" class="form-control" name="precio" value="{{ old("precio", $producto->precio) }}">
                    @error('precio')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-8 mt-5">
                  <label for="marcas_id"> <i class="bi bi-person-fill"></i>Marca:</label>
                  <input type="text" class="form-control" name="marcas_id" value="{{ old("marcas_id", $producto->marcas_id) }}">
                  @error('marcas_id')
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