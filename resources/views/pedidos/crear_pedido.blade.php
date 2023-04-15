<select name="comunidad" id="comunidad">
    @foreach($comunidades as $comunidad)
        <option value="{{ $comunidad->id }}">{{ $comunidad->nombre }}</option>
    @endforeach
</select>

<select name="provincia" id="provincia"></select>

<script>
    $(document).ready(function () {
        $('#comunidad').on('change', function () {
            var comunidadId = $(this).val();
            $.ajax({
                url: '/provincias/' + comunidadId,
                type: 'GET',
                dataType: 'json',
                success: function (provincias) {
                    $('#provincia').empty();
                    $.each(provincias, function (key, value) {
                        $('#provincia').append('<option value="' + value.id + '">' + value.nombre + '</option>');
                    });
                }
            });
        });
    });
</script>