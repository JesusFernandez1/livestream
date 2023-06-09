@extends('base')
@section('scripts')

<script>
$(document).ready(function() {
  $('#detallesModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var peticione = button.data('peticione');
      $('#detalles-nombre_cliente').text(peticione.nombre_cliente);
      $('#detalles-correo_cliente').text(peticione.correo_cliente);
      $('#detalles-asunto').text(peticione.asunto);
      $('#detalles-mensaje').text(peticione.mensaje);
  });
});
</script>
@endsection
<head><link rel="stylesheet" href="../../resources/css/style.css"> </head>
   @section('mostrarExtension')
   <main class="table">
    <section class="table__header">
        <h1>Lista de peticiones</h1>
        <div class="input-group">
            <input type="search" placeholder="Search Data...">
            <img src="../../resources/img/search.png" alt="">
        </div>
    </section>
    @php
    $ordenActual = session('orden') == 'asc' ? 'desc' : 'asc';
        @endphp
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> <a class="my-link" href="{{ route('usuarios.peticiones', ['ordenar_por' => 'id', 'orden' => $ordenActual]) }}">Id <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('usuarios.peticiones', ['ordenar_por' => 'nombre_cliente', 'orden' => $ordenActual]) }}">Nombre cliente <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('usuarios.peticiones', ['ordenar_por' => 'correo_cliente', 'orden' => $ordenActual]) }}">Correo cliente <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('usuarios.peticiones', ['ordenar_por' => 'asunto', 'orden' => $ordenActual]) }}">Asunto <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peticiones as $peticione)
                    <tr>
                       <td>{{$peticione->id}}</td>
                       <td>{{$peticione->nombre_cliente}}</td>
                       <td>{{$peticione->correo_cliente}}</td>
                       <td>{{$peticione->asunto}}</td>
                       <td><button type="button" class="btn btn-warning"data-bs-toggle="modal" data-bs-target="#detallesModal" data-peticione="{{ $peticione }}">
                        <i class="bi bi-eye"></i>
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
                <li class="page-item {{ $peticiones->currentPage() == 1 ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $peticiones->url(1) }}">Primera</a>
                </li>
                  <li class="page-item {{ $peticiones->currentPage() == 1 ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $peticiones->previousPageUrl() }}">Anterior</a>
                  </li>
                  @for ($i = 1; $i <= $peticiones->lastPage(); $i++)
                      <li class="page-item {{ $peticiones->currentPage() == $i ? 'active' : '' }}">
                          <a class="page-link" href="{{ $peticiones->url($i) }}">{{ $i }}</a>
                      </li>
                  @endfor
                  <li class="page-item {{ $peticiones->currentPage() == $peticiones->lastPage() ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $peticiones->nextPageUrl() }}">Siguiente</a>
                  </li>
                  <li class="page-item {{ $peticiones->currentPage() == $peticiones->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $peticiones->url($peticiones->lastPage()) }}">Última</a>
                </li>
              </ul>
          </nav>
      </div>
    </main>
<!-- Modal -->
<div class="modal fade" id="detallesModal" tabpeticiones="-1" aria-labelledby="detallesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-light">
        <h5 class="modal-title" id="detallesModalLabel"><b>Detalles del peticione</b></h5>
        <button type="button" class="btn-close text-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th scope="row">Nombre</th>
              <td><span id="detalles-nombre_cliente"></span></td>
            </tr>
            <tr>
              <th scope="row">Correo</th>
              <td><span id="detalles-correo_cliente"></span></td>
            </tr>
            <tr>
              <th scope="row">Asunto</th>
              <td><span id="detalles-asunto"></span></td>
            </tr>
            <tr>
              <th scope="row">Mensaje</th>
              <td><span id="detalles-mensaje"></span></td>
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