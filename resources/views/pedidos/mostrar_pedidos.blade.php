@extends('base')
@section('scripts')

<script>
$(document).ready(function() {
  $('#detallesModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var pedido = button.data('pedido');
      $('#detalles-numero_pedido').text(pedido.numero_pedido);
      $('#detalles-DNI').text(pedido.DNI);
      $('#detalles-nombre').text(pedido.nombre);
      $('#detalles-apellido').text(pedido.apellido);
      $('#detalles-correo').text(pedido.correo);
      $('#detalles-direccion').text(pedido.direccion);
      $('#detalles-codigo_postal').text(pedido.codigo_postal);
      $('#detalles-datos_adicionales').text(pedido.apellido);
      $('#detalles-fecha_pedido').text(pedido.fecha_pedido);
      $('#detalles-fecha_entrega').text(pedido.fecha_entrega);
      $('#detalles-estado').text(pedido.estado);
      $('#detalles-importe_total').text(pedido.importe_total);
  });
  $('#detallesDevolucion').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var pedido = button.data('pedido');
      $('#detallesDevolucion-numero_pedido').text(pedido.numero_pedido);
      $('#detallesDevolucion-DNI').text(pedido.DNI);
      $('#detallesDevolucion-nombre').text(pedido.nombre);
      $('#detallesDevolucion-apellido').text(pedido.apellido);
      $('#detallesDevolucion-correo').text(pedido.correo);
      $('#detallesDevolucion-estado').text(pedido.estado);
      $('#detallesDevolucion-importe_total').text(pedido.importe_total);
  });
  $('#borrarModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var pedido = button.data('pedido');
      $('#borrar-DNI').text(pedido.DNI);
      $('#borrar-nombre').text(pedido.nombre);
      $('#borrar-apellido').text(pedido.apellido);
      $('#borrar-correo').text(pedido.correo);
      $('#borrar-estado').text(pedido.estado);
      $('#borrar-importe_total').text(pedido.importe_total);
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
        <div class="export__file">
          <label for="export-file" class="export__file-btn" title="Export File"></label>
          <input type="checkbox" id="export-file">
          <div class="export__file-options">
              <label>Export As &nbsp; &#10140;</label>
              <label for="export-file" id="toPDF">PDF <img src="../resources/img/pdf.png" alt=""></label>
              <label for="export-file" id="toJSON">JSON <img src="../resources/img/json.png" alt=""></label>
              <label for="export-file" id="toCSV">CSV <img src="../resources/img/csv.png" alt=""></label>
              <label for="export-file" id="toEXCEL">EXCEL <img src="../resources/img/excel.png" alt=""></label>
          </div>
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
                        <th> Estado <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Importe <span class="icon-arrow">&UpArrow;</span></th>
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
                       <td>{{$pedido->estado}}</td>
                       <td>{{$pedido->importe_total}}€</td>
                       <td><button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#detallesModal" data-pedido="{{ $pedido }}">
                        <i class="bi bi-eye"></i>
                          </button>
                          @if($pedido->estado != 'Cancelado' && $pedido->users_id == Auth::user()->id) <button type="button" class="btn btn-warning"data-bs-toggle="modal" data-bs-target="#detallesDevolucion" data-pedido="{{ $pedido }}">
                            <i class="bi bi-box-seam-fill"></i>
                          </button> @endif
                         @if($pedido->estado != 'Cancelado' && ($grupo == 'Gestor de pedidos' || $grupo == null)) 
                         <a class="btn btn-secondary" href="{{ route('pedidos.edit', $pedido) }}" role="button"> <i class="bi bi-pencil-square"></a></i>
                        <button type="button" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#borrarModal" data-pedido="{{ $pedido }}"><i class="bi bi-trash3"></i>
                      </button> @endif </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        @if(auth()->user()->empleados_id) 
          <a class="btn btn-secondary custom-button" href="{{ route('base')}}" role="button"><i class="bi bi-arrow-left-square"></i> Volver</a>
         @else 
        <a class="btn btn-secondary custom-button" href="{{ route('/')}}" role="button"><i class="bi bi-arrow-left-square"></i> Volver</a>
        
        @endif
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
              <th scope="row">Nº pedido</th>
              <td><span id="detalles-numero_pedido"></span></td>
            </tr>
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
            <tr>
              <th scope="row">Direccion</th>
              <td><span id="detalles-direccion"></span></td>
            </tr>
            <tr>
              <th scope="row">Codigo postal</th>
              <td><span id="detalles-codigo_postal"></span></td>
            </tr>
            <tr>
              <th scope="row">Datos adicionales</th>
              <td><span id="detalles-datos_adicionales"></span></td>
            </tr>
            <tr>
              <th scope="row">Fecha del pedido</th>
              <td><span id="detalles-fecha_pedido"></span></td>
            </tr>
            <tr>
              <th scope="row">Fecha de entrega</th>
              <td><span id="detalles-fecha_entrega"></span></td>
            </tr>
            <tr>
              <th scope="row">Estado</th>
              <td><span id="detalles-estado"></span></td>
            </tr>
            <tr>
              <th scope="row">Importe</th>
              <td><span id="detalles-importe_total"></span>€</td>
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
<div class="modal fade" id="detallesDevolucion" tabindex="-1" aria-labelledby="detallesDevolucionLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <h5 class="modal-title" id="detallesDevolucionLabel"><b>¿Estas seguro/a de realizar la devolucion?</b></h5>
        <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th scope="row">Nº pedido</th>
              <td><span id="detallesDevolucion-numero_pedido"></span></td>
            </tr>
            <tr>
              <th scope="row">DNI</th>
              <td><span id="detallesDevolucion-DNI"></span></td>
            </tr>
            <tr>
              <th scope="row">Nombre</th>
              <td><span id="detallesDevolucion-nombre"></span></td>
            </tr>
            <tr>
              <th scope="row">Apellido</th>
              <td><span id="detallesDevolucion-apellido"></span></td>
            </tr>
            <tr>
              <th scope="row">Correo</th>
              <td><span id="detallesDevolucion-correo"></span></td>
            </tr>
            <tr>
              <th scope="row">Estado</th>
              <td><span id="detallesDevolucion-estado"></span></td>
            </tr>
            <tr>
              <th scope="row">Importe</th>
              <td><span id="detallesDevolucion-importe_total"></span>€</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Si</button>
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="borrarModal" tabindex="-1" aria-labelledby="borrarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="borrarModalLabel"><b>Cancelar pedido</b></h5>
          <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="lead mb-4">¿Estás seguro que deseas cancelar este pedido?</p>
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
              <tr>
                <th class="bg-secondary text-white" scope="row">Estado</th>
                <td><span id="borrar-estado"></span></td>
              </tr>
              <tr>
                <th class="bg-secondary text-white" scope="row">Importe</th>
                <td><span id="borrar-importe_total"></span></td>
              </tr>
            </tbody>
          </table>
        </div>
        @isset($pedido)
        <div class="modal-footer">
          <a href="{{ route('pedidos.cancelarPedido', $pedido->id)}}" class="btn btn-danger cancelar">Aceptar</a>
          <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
        </div>
        @endisset
      </div>
    </div>
  </div>
  <script>
 $(document).ready(function() {
  $('#borrarModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var pedido = button.data('pedido');

    // Obtener el valor correcto del objeto "pedido"
    var pedidoId = pedido.id;

    var eliminarDeseadosLink = $('#borrarModal').find('.cancelar');
    var eliminarDeseadosRoute = eliminarDeseadosLink.attr('href');
    
    // Reemplazar el número final con el valor de "pedidoId"
    eliminarDeseadosRoute = eliminarDeseadosRoute.replace(/\d+$/, pedidoId);

    // Actualizar el atributo "href" del enlace
    eliminarDeseadosLink.attr('href', eliminarDeseadosRoute);
  });
});

  </script>
  <style>
  .custom-button {
    position: absolute;
    top: 820px;
    left: 30px;
    }
    #centrar {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 820px;
    left: 660px;
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