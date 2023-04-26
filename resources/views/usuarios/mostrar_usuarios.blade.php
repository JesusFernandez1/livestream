@extends('base')

   @section('mostrarExtension')
   <main class="table">
    <section class="table__header">
        <h1>Lista de usuarios</h1>
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
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> DNI <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nombre <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Apellido <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Correo <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Telefono <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                       <td>{{$usuario->DNI}}</td>
                       <td>{{$usuario->name}}</td>
                       <td>{{$usuario->lastname}}</td>
                       <td>{{$usuario->email}}</td>
                       <td>{{$usuario->phone}}</td>
                       <td><a href="{{ route('usuarios.edit', $usuario) }}" role="button"><i class="bi bi-pencil-square"></i><i class="bi bi-trash3"></i></a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
    @endsection