@extends('base')

   @section('mostrarExtension')
   <main class="table">
    <section class="table__header">
        <h1>Lista de empleados</h1>
        <div class="input-group">
            <input type="search" placeholder="Search Data...">
            <img src="../resources/img/search.png" alt="">
        </div>
        {{-- <div class="export__file">
            <label for="export-file" class="export__file-btn" title="Export File"></label>
            <input type="checkbox" id="export-file">
            <div class="export__file-options">
                <label>Export As &nbsp; &#10140;</label>
                <label for="export-file" id="toPDF">PDF <img src="../resources/img/pdf.png" alt=""></label>
                <label for="export-file" id="toJSON">JSON <img src="../resources/img/json.png" alt=""></label>
                <label for="export-file" id="toCSV">CSV <img src="../resources/img/csv.png" alt=""></label>
                <label for="export-file" id="toEXCEL">EXCEL <img src="../resources/img/excel.png" alt=""></label>
            </div>
        </div> --}}
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
                       <td><a class="btn btn-secondary" href="{{ route('empleados.edit', $empleado) }}" role="button"> <i class="bi bi-pencil-square"></a></i>
                        <a class="btn btn-secondary" href="{{ route('empleados.edit', $empleado) }}" role="button"><i class="bi bi-trash3"></i></a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
    @endsection