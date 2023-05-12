@extends('base')
@section('scripts')

<script>
$(document).ready(function() {
  $('#borrarModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var usuario = button.data('usuario');
      $('#borrar-DNI').text(usuario.DNI);
      $('#borrar-name').text(usuario.name);
      $('#borrar-lastname').text(usuario.lastname);
      $('#borrar-email').text(usuario.email);
      $('#borrar-usuario-form').submit(function() {
          var url = "{{ route('usuarios.destroy', ['usuario' => ':usuario']) }}";
          url = url.replace(':usuario', usuario.id);
          $('#borrar-usuario-form').attr('action', url);
      });
  });
});
</script>
@endsection
<head><link rel="stylesheet" href="../../resources/css/style.css"> </head>
   @section('mostrarExtension')
   <main class="table">
    <section class="table__header">
        <h1>Lista de usuarios</h1>
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
                        <th> <a class="my-link" href="{{ route('usuarios.index', ['ordenar_por' => 'id', 'orden' => $ordenActual]) }}">Id <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('usuarios.index', ['ordenar_por' => 'DNI', 'orden' => $ordenActual]) }}">DNI <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('usuarios.index', ['ordenar_por' => 'name', 'orden' => $ordenActual]) }}">Name <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> <a class="my-link" href="{{ route('usuarios.index', ['ordenar_por' => 'lastname', 'orden' => $ordenActual]) }}">Lastname <span class="icon-arrow">&UpArrow;</span></a></th>
                        <th> Phone <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                       <td>{{$usuario->id}}</td>
                       <td>{{$usuario->DNI}}</td>
                       <td>{{$usuario->name}}</td>
                       <td>{{$usuario->lastname}}</td>
                       <td>{{$usuario->phone}}</td>
                       <td>{{$usuario->email}}</td>
                       <td><a class="btn btn-primary" href="{{ route('usuarios.edit', $usuario) }}" role="button"> <i class="bi bi-pencil-square"></a></i>
                        <button type="button" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#borrarModal" data-usuario="{{ $usuario }}">
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
                <li class="page-item {{ $usuarios->currentPage() == 1 ? 'disabled' : '' }}">
                  <a class="page-link" href="{{ $usuarios->url(1) }}">Primera</a>
                </li>
                  <li class="page-item {{ $usuarios->currentPage() == 1 ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $usuarios->previousPageUrl() }}">Anterior</a>
                  </li>
                  @for ($i = 1; $i <= $usuarios->lastPage(); $i++)
                      <li class="page-item {{ $usuarios->currentPage() == $i ? 'active' : '' }}">
                          <a class="page-link" href="{{ $usuarios->url($i) }}">{{ $i }}</a>
                      </li>
                  @endfor
                  <li class="page-item {{ $usuarios->currentPage() == $usuarios->lastPage() ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $usuarios->nextPageUrl() }}">Siguiente</a>
                  </li>
                  <li class="page-item {{ $usuarios->currentPage() == $usuarios->lastPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $usuarios->url($usuarios->lastPage()) }}">Última</a>
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
          <h5 class="modal-title" id="borrarModalLabel"><b>Eliminar usuario</b></h5>
          <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="lead mb-4">¿Estás seguro que deseas eliminar este usuario?</p>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <th class="bg-secondary text-white" scope="row" style="width: 30%">DNI</th>
                <td style="width: 70%"><span id="borrar-DNI"></span></td>
              </tr>
              <tr>
                <th class="bg-secondary text-white" scope="row">name</th>
                <td><span id="borrar-name"></span></td>
              </tr>
              <tr>
                <th class="bg-secondary text-white" scope="row">lastname</th>
                <td><span id="borrar-lastname"></span></td>
              </tr>
              <tr>
                <th class="bg-secondary text-white" scope="row">email</th>
                <td><span id="borrar-email"></span></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <form method="POST" id="borrar-usuario-form" action="">
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