<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Empleados</title>
    <link rel="stylesheet" href="../resources/css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
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
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> DNI <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nombre <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Apellido <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Telefono <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Correo <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Acciones <span class="icon-arrow"></span></th>
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
                       <td>{{$empleado->correo}}<i class="bi bi-pencil-square"></i></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>