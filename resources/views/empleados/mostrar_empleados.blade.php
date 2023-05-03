@extends('base')
@section('scripts')

<script>
 $(document).ready(function() {

//Este evento se activa al abrir el modal de borrar y se encarga de cargar los datos del empleado.

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
        <h1>Lista de empleados</h1>
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
                       <td><a class="btn btn-primary" href="{{ route('empleados.edit', $empleado) }}" role="button"> <i class="bi bi-pencil-square"></a></i>
                        <button type="button" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#borrarModal" data-empleado="{{ $empleado }}">
                          <i class="bi bi-trash3"></i>
                      </button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
<!-- Modal -->
<div class="modal fade" id="borrarModal" tabindex="-1" aria-labelledby="borrarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="borrarModalLabel"><b>Eliminar empleado </b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <p>¿Estás seguro que deseas elminar este empleado?</p>
              <table class="table">
                  <tr>
                      <th scope="row" class="bg-dark text-light">DNI</th>
                      <td class="bg-light"><span id="borrar-DNI"></span></td>
                  </tr>
                  <tr>
                      <th scope="row" class="bg-dark text-light">Nombre</th>
                      <td><span id="borrar-nombre"></span></td>
                  </tr>
                  <tr>
                      <th scope="row" class="bg-dark text-light">Apellido</th>
                      <td><span id="borrar-apellido"></span></td>
                  </tr>
                  <tr>
                      <th scope="row" class="bg-dark text-light">Correo</th>
                      <td><span id="borrar-correo"></span></td>
                  </tr>
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
@endsection