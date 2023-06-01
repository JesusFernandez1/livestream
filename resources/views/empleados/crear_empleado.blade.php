@extends('baseForm')
@section('scripts')
<script>
  $(function() {
      $('#comunidad').change(function() {
          var comunidadId = $(this).val();
          if (comunidadId) {
              $.get('{{ url('provincias') }}/' + comunidadId, function(provincias) {
                  $('#provincia').empty().append($('<option>').val('').text('Selecciona una provincia'));
                  $.each(provincias, function(key, provincia) {
                      $('#provincia').append($('<option>').val(provincia.id).text(provincia.nombre));
                  });
              });
          } else {
              $('#provincia').empty().append($('<option>').val('').text('Selecciona una provincia'));
          }
      });
  });
</script>
@endsection
   @section('mostrarExtensionForm')
   <section class="d-flex justify-content-center align-items-center">
    <div class="card shadow col-xs-12 col-sm-6 col-md-6 col-lg-4   p-4"> 
        <div class="mb-4 d-flex justify-content-start align-items-center">
            <h4>  <i class="bi bi-chat-left-quote"></i> &nbsp; Contacto</h4>
        </div>
        <div class="mb-1">
            <form id = "contacto" action="{{ route('empleados.store') }}" method="POST">
              <div class="row">
                <div class="col-12">
                  <label for="DNI"> DNI:</label>
                  <input type="text" class="form-control" name="DNI" value="{{ old("DNI") }}">
                  @error('DNI')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
              </div>
                <div class="col-6 mt-5">
                    <label for="nombre"> <i class="bi bi-person-fill"></i> Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="{{ old("nombre") }}">
                    @error('nombre')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6 mt-5">
                    <label for="apellido"> <i class="bi bi-person-bounding-box"></i> Apellido:</label>
                    <input type="text" class="form-control" name="apellido" value="{{ old("apellido") }}">
                    @error('apellido')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
            
                <div class="col-4 mt-5">
                  <label for="telefono"><i class="bi bi-telephone-fill"></i> Telefono:</label>
                  <input type="text" class="form-control" name="telefono" value="{{ old("telefono") }}">
                  @error('telefono')
                      <small style="color: red">{{ $message }}</small>
                  @enderror
              </div>
                <div class="col-8 mt-5">
                    <label for="correo"> <i class="bi bi-envelope-at-fill"></i> Correo:</label>
                    <input type="text" class="form-control" name="correo" value="{{ old("correo") }}">
                    @error('correo')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-4 mt-4">
                    <label for="inputState" class="form-label">Role</label>
                    <select id="inputState" class="form-select" name="role">
                      <option disabled selected>{{ old("role")}}</option>
                      <option>Admin</option>
                      <option>Empleado</option>
                    </select>
                    @error('role')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                  </div>          
                </div>
                <div class="row">
                    <div class="col-1"></div> <!-- Columna vacía para crear espacio -->
                    <div class="col-5 mt-5">
                      <a class="col-12 btn btn-danger d-flex justify-content-center" href="{{ route('empleados.index')}}" role="button">
                        <span>Cancelar</span> <i class="bi bi-x-square-fill icono"></i>
                      </a>                
                    </div>
                    <div class="col-5 mt-5">
                      <button id="botton" class="col-12 btn btn-primary d-flex justify-content-center" style="margin-bottom: 10px;">
                        <span>Enviar</span>
                        <i class="bi bi-check-square-fill icono"></i>
                      </button>   
                    </div>
                    <div class="col-1"></div> <!-- Columna vacía para crear espacio -->
                  </div>  
            </form>
        </div>
    </div>
</section>
<style>
    .icono {
        margin-left: 7px;
    }
</style>
@endsection