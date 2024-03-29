@extends('base')
@section('scripts')

<script>
$(document).ready(function() {
  $('#borrarModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var producto = button.data('producto');
      $('#borrar-nombre').text(producto.nombre);
      $('#borrar-descripcion').text(producto.descripcion);
      $('#borrar-precio').text(producto.precio);
      $('#borrar-marca').text(producto.marca);
      $('#borrar-producto-form').submit(function() {
          var url = "{{ route('productos.destroy', ['producto' => ':producto']) }}";
          url = url.replace(':producto', producto.id);
          $('#borrar-producto-form').attr('action', url);
      });
  });
});
</script>
@endsection
   @section('mostrarExtension')
   <main class="table">
    <section class="table__header">
        <h1>Lista de productos</h1>
        <div class="input-group">
            <input type="search" placeholder="Search Data...">
            <img src="../resources/img/search.png" alt="">
        </div>
    </section>
    @php
    $ordenActual = session('orden') == 'asc' ? 'desc' : 'asc';
        @endphp
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> <a class="my-link" href="{{ route('productos.index', ['ordenar_por' => 'id', 'orden' => $ordenActual]) }}">Id <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('productos.index', ['ordenar_por' => 'nombre', 'orden' => $ordenActual]) }}">Nombre <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('productos.index', ['ordenar_por' => 'precio', 'orden' => $ordenActual]) }}">Precio <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('productos.index', ['ordenar_por' => 'stock', 'orden' => $ordenActual]) }}">Stock <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('productos.index', ['ordenar_por' => 'marcas_id', 'orden' => $ordenActual]) }}">Marca <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> Descripcion </th>
                        <th> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                    <tr>
                       <td>{{$producto->id}}</td>
                       <td>{{$producto->nombre}}</td>
                       <td>{{$producto->precio}}</td>
                       <td>{{$producto->stock}}</td>
                       <td>{{$producto->marcas_id}}</td>
                       <td>{{$producto->descripcion}}</td>
                       <td><a class="btn btn-primary" href="{{ route('productos.edit', $producto) }}" role="button"> <i class="bi bi-pencil-square"></a></i>
                        <button type="button" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#borrarModal" data-producto="{{ $producto }}">
                          <i class="bi bi-trash3"></i>
                      </button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <a class="btn btn-secondary custom-button" href="{{ route('base')}}" role="button"><i class="bi bi-arrow-left-square"></i> Volver</a>
        <div id="centrar">
          <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item {{ $productos->currentPage() == 1 ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $productos->url(1) }}">Primera</a>
                </li>
                  <li class="page-item {{ $productos->currentPage() == 1 ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $productos->previousPageUrl() }}">Anterior</a>
                  </li>
                  @for ($i = 1; $i <= $productos->lastPage(); $i++)
                      <li class="page-item {{ $productos->currentPage() == $i ? 'active' : '' }}">
                          <a class="page-link" href="{{ $productos->url($i) }}">{{ $i }}</a>
                      </li>
                  @endfor
                  <li class="page-item {{ $productos->currentPage() == $productos->lastPage() ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $productos->nextPageUrl() }}">Siguiente</a>
                  </li>
                  <li class="page-item {{ $productos->currentPage() == $productos->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $productos->url($productos->lastPage()) }}">Última</a>
                </li>
              </ul>
          </nav>
      </div>
    </main>
<!-- Modal -->
<div class="modal fade" id="borrarModal" tabindex="-1" aria-labelledby="borrarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="borrarModalLabel"><b>Eliminar producto</b></h5>
          <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="lead mb-4">¿Estás seguro que deseas eliminar este producto?</p>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th class="bg-secondary text-white" scope="row" style="width: 30%">Nombre</th>
                <td style="width: 70%"><span id="borrar-nombre"></span></td>
              </tr>
              <tr>
                <th class="bg-secondary text-white" scope="row">Descripcion</th>
                <td><span id="borrar-descripcion"></span></td>
              </tr>
              <tr>
                <th class="bg-secondary text-white" scope="row">Precio</th>
                <td><span id="borrar-precio"></span></td>
              </tr>
              <tr>
                <th class="bg-secondary text-white" scope="row">Marca</th>
                <td><span id="borrar-marca"></span></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <form method="POST" id="borrar-producto-form" action="">
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
          <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  <style>
  .custom-button {
    position: absolute;
    top: 1030px;
    left: 30px;
    }
    #centrar {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 1020px;
    left: 720px;
    }
    .pagination {
    display: inline-block;
    list-style: none;
    padding: 0;
    margin: 0;
}

.pagination li {
    display: inline;
}

.pagination li a,
.pagination li span {
    color: #333;
    display: inline-block;
    padding: 6px 12px;
    text-decoration: none;
    border: 1px solid #ddd;
    margin-left: -1px;
}

.pagination li a:hover {
    background-color: #f5f5f5;
}

.pagination li.active span {
    background-color: #337ab7;
    color: #fff;
    border-color: #337ab7;
}

.pagination li.disabled span,
.pagination li.disabled a {
    color: #777;
    pointer-events: none;
    cursor: not-allowed;
}
  </style>
@endsection