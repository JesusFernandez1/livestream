@extends('base')
@section('scripts')

<script>
$(document).ready(function() {
  $('#detallesModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var pedido = button.data('pedido');
      $('#detalles-DNI').text(pedido.DNI);
      $('#detalles-nombre').text(pedido.nombre);
      $('#detalles-apellido').text(pedido.apellido);
      $('#detalles-correo').text(pedido.correo);
      $('#detalles-telefono').text(pedido.telefono);
  });
  $('#borrarModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var pedido = button.data('pedido');
      $('#borrar-DNI').text(pedido.DNI);
      $('#borrar-nombre').text(pedido.nombre);
      $('#borrar-apellido').text(pedido.apellido);
      $('#borrar-correo').text(pedido.correo);
      $('#borrar-pedido-form').submit(function() {
          var url = "{{ route('pedidos.destroy', ['pedido' => ':pedido']) }}";
          url = url.replace(':pedido', pedido.id);
          $('#borrar-pedido-form').attr('action', url);
      });
  });
});
</script>
@endsection
   @section('mostrarExtension')
   <main class="table">
    <section class="table__header">
        <h1>Lista de pedidos</h1>
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
                        <th> <a class="my-link" href="{{ route('pedidos.index', ['ordenar_por' => 'id', 'orden' => $ordenActual]) }}">Id <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('pedidos.index', ['ordenar_por' => 'DNI', 'orden' => $ordenActual]) }}">DNI <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('pedidos.index', ['ordenar_por' => 'nombre', 'orden' => $ordenActual]) }}">Nombre <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('pedidos.index', ['ordenar_por' => 'apellido', 'orden' => $ordenActual]) }}">Apellido <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> Telefono <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Correo <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                    <tr>
                       <td>{{$pedido->id}}</td>
                       <td>{{$pedido->DNI}}</td>
                       <td>{{$pedido->nombre}}</td>
                       <td>{{$pedido->apellido}}</td>
                       <td>{{$pedido->telefono}}</td>
                       <td>{{$pedido->correo}}</td>
                       <td><button type="button" class="btn btn-warning"data-bs-toggle="modal" data-bs-target="#detallesModal" data-pedido="{{ $pedido }}">
                        <i class="bi bi-eye"></i>
                          </button>
                          <a class="btn btn-primary" href="{{ route('pedidos.edit', $pedido) }}" role="button"> <i class="bi bi-pencil-square"></a></i>
                        <button type="button" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#borrarModal" data-pedido="{{ $pedido }}">
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
                <li class="page-item {{ $pedidos->currentPage() == 1 ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $pedidos->url(1) }}">Primera</a>
                </li>
                  <li class="page-item {{ $pedidos->currentPage() == 1 ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $pedidos->previousPageUrl() }}">Anterior</a>
                  </li>
                  @for ($i = 1; $i <= $pedidos->lastPage(); $i++)
                      <li class="page-item {{ $pedidos->currentPage() == $i ? 'active' : '' }}">
                          <a class="page-link" href="{{ $pedidos->url($i) }}">{{ $i }}</a>
                      </li>
                  @endfor
                  <li class="page-item {{ $pedidos->currentPage() == $pedidos->lastPage() ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $pedidos->nextPageUrl() }}">Siguiente</a>
                  </li>
                  <li class="page-item {{ $pedidos->currentPage() == $pedidos->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $pedidos->url($pedidos->lastPage()) }}">Última</a>
                </li>
              </ul>
          </nav>
      </div>
    </main>
<!-- Modal -->
<div class="modal fade" id="detallesModal" tabindex="-1" aria-labelledby="detallesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <h5 class="modal-title" id="detallesModalLabel"><b>Detalles del pedido</b></h5>
        <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th scope="row">DNI</th>
              <td><span id="detalles-DNI"></span></td>
            </tr>
            <tr>
              <th scope="row">Nombre</th>
              <td><span id="detalles-nombre"></span></td>
            </tr>
            <tr>
              <th scope="row">Apellido</th>
              <td><span id="detalles-apellido"></span></td>
            </tr>
            <tr>
              <th scope="row">Correo</th>
              <td><span id="detalles-correo"></span></td>
            </tr>
            <tr>
              <th scope="row">Teléfono</th>
              <td><span id="detalles-telefono"></span></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="borrarModal" tabindex="-1" aria-labelledby="borrarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="borrarModalLabel"><b>Eliminar pedido</b></h5>
          <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="lead mb-4">¿Estás seguro que deseas eliminar este pedido?</p>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th class="bg-secondary text-white" scope="row" style="width: 30%">DNI</th>
                <td style="width: 70%"><span id="borrar-DNI"></span></td>
              </tr>
              <tr>
                <th class="bg-secondary text-white" scope="row">Nombre</th>
                <td><span id="borrar-nombre"></span></td>
              </tr>
              <tr>
                <th class="bg-secondary text-white" scope="row">Apellido</th>
                <td><span id="borrar-apellido"></span></td>
              </tr>
              <tr>
                <th class="bg-secondary text-white" scope="row">Correo</th>
                <td><span id="borrar-correo"></span></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <form method="POST" id="borrar-pedido-form" action="">
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