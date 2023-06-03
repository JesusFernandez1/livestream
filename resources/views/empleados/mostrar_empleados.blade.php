@extends('base')
@section('scripts')

<script>
$(document).ready(function() {
  $('#detallesModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var empleado = button.data('empleado');
      $('#detalles-DNI').text(empleado.DNI);
      $('#detalles-nombre').text(empleado.nombre);
      $('#detalles-apellido').text(empleado.apellido);
      $('#detalles-correo').text(empleado.correo);
      $('#detalles-telefono').text(empleado.telefono);
  });
  $('#borrarModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var empleado = button.data('empleado');
      $('#borrar-DNI').text(empleado.DNI);
      $('#borrar-nombre').text(empleado.nombre);
      $('#borrar-apellido').text(empleado.apellido);
      $('#borrar-correo').text(empleado.correo);
      $('#borrar-empleado-form').submit(function() {
          var url = "{{ route('empleados.destroy', ['empleado' => ':empleado']) }}";
          url = url.replace(':empleado', empleado.id);
          $('#borrar-empleado-form').attr('action', url);
      });
  });
});
</script>
@endsection
   @section('mostrarExtension')
   <main class="table">
    <section class="table__header">
        <h1>Lista de empleados</h1><a class="btn btn-success create-button" href="{{ route('empleados.create')}}" role="button">Crear <i class="bi bi-plus-circle"></i></a>
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
                        <th> <a class="my-link" href="{{ route('empleados.index', ['ordenar_por' => 'id', 'orden' => $ordenActual]) }}">Id <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('empleados.index', ['ordenar_por' => 'DNI', 'orden' => $ordenActual]) }}">DNI <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('empleados.index', ['ordenar_por' => 'nombre', 'orden' => $ordenActual]) }}">Nombre <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('empleados.index', ['ordenar_por' => 'apellido', 'orden' => $ordenActual]) }}">Apellido <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> Telefono <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Correo <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                    <tr>
                       <td>{{$empleado->id}}</td>
                       <td>{{$empleado->DNI}}</td>
                       <td>{{$empleado->nombre}}</td>
                       <td>{{$empleado->apellido}}</td>
                       <td>{{$empleado->telefono}}</td>
                       <td>{{$empleado->correo}}</td>
                       <td><button type="button" class="btn btn-warning"data-bs-toggle="modal" data-bs-target="#detallesModal" data-empleado="{{ $empleado }}">
                        <i class="bi bi-eye"></i>
                          </button>
                        <a class="btn btn-primary" href="{{ route('empleados.edit', $empleado) }}" role="button"> <i class="bi bi-pencil-square"></i></a>
                        <button type="button" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#borrarModal" data-empleado="{{ $empleado }}">
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
                <li class="page-item {{ $empleados->currentPage() == 1 ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $empleados->url(1) }}">Primera</a>
                </li>
                  <li class="page-item {{ $empleados->currentPage() == 1 ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $empleados->previousPageUrl() }}">Anterior</a>
                  </li>
                  @for ($i = 1; $i <= $empleados->lastPage(); $i++)
                      <li class="page-item {{ $empleados->currentPage() == $i ? 'active' : '' }}">
                          <a class="page-link" href="{{ $empleados->url($i) }}">{{ $i }}</a>
                      </li>
                  @endfor
                  <li class="page-item {{ $empleados->currentPage() == $empleados->lastPage() ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $empleados->nextPageUrl() }}">Siguiente</a>
                  </li>
                  <li class="page-item {{ $empleados->currentPage() == $empleados->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $empleados->url($empleados->lastPage()) }}">Última</a>
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
        <h5 class="modal-title" id="detallesModalLabel"><b>Detalles del empleado</b></h5>
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
          <h5 class="modal-title" id="borrarModalLabel"><b>Eliminar empleado</b></h5>
          <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="lead mb-4">¿Estás seguro que deseas eliminar este empleado?</p>
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
          <form method="POST" id="borrar-empleado-form" action="">
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
    top: 820px;
    left: 30px;
    }
    .create-button {
    position: absolute;
    left: 390px;
    font-size: 21px;
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
/* @media (max-width: 768px) {
    main.table {
        padding: 10px;
    }

    section.table__header {
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-bottom: 20px;
    }

    section.table__header h1 {
        margin-bottom: 10px;
    }

    section.table__header .btn {
        margin-bottom: 10px;
    }

    section.table__header .input-group {
        display: none;
    }

    section.table__body table {
        font-size: 14px;
    }

    section.table__body table thead th:nth-child(n+4),
    section.table__body table tbody td:nth-child(n+4) {
        display: none;
    }

    .pagination {
        justify-content: center;
        margin-top: 20px;
    }

    .custom-button {
        display: block;
        margin: 20px auto;
    }
} */

  </style>
@endsection