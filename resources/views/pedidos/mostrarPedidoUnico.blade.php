@extends('base')
   @section('mostrarExtension')
   <main class="table">
    <section class="table__header">
        <h1>Lista de pedidos</h1>
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
                        <th> Nª pedido </th>
                        <th> Direccion </th>
                        <th> Fecha del pedido </th>
                        <th> Fecha de entrega estimada </th>
                        <th> Importe total </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                    <tr>
                       <td>{{$pedido->id}}</td>
                       <td>{{$pedido->direccion}}</td>
                       <td>{{$pedido->fecha_pedido}}</td>
                       <td>{{$pedido->fecha_entrega}}</td>
                       <td>{{$pedido->importe_total}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection