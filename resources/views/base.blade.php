<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empleados</title>
  
    <!-- Carga de estilos CSS -->
    <link rel="stylesheet" href="../resources/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  
    <!-- Carga de scripts JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-/LZlqVwA29MIdU6Y7Et1O5U8FxTJiPgFj8E6KE0I5wGv8a4qPJvqgurbtE9Htb+a" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.3/dist/esm/popper-lite" integrity="sha384-EaHdNfliZ8WwQ2rcvfn/07flFJmszLr0T3qMeX/SO1ePvZ5PfB5Q2O8K7WprSQvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-rq3VeXd5e5LkZjIYehPvHbVmJWf8+IyTkLy7V+UO2kGs7VhBdvlJk9XpU6H1UOus" crossorigin="anonymous"></script>
  </head>

<body>
   

@yield('mostrarExtension')



</body>
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
</html>