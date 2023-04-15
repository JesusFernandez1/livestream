<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <select name="comunidad" id="comunidad">
        <option value="">Selecciona una comunidad autónoma</option>
        @foreach ($comunidades as $comunidad)
            <option value="{{ $comunidad->id }}">{{ $comunidad->nombre }}</option>
        @endforeach
    </select>
    
    <select name="provincia" id="provincia">
        <option value="">Selecciona una provincia</option>
    </select>
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

