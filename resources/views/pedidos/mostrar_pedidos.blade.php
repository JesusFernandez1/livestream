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
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> DNI <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nombre <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Apellido <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Correo <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Telefono <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Codgio postal <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Fecha del pedido <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Fecha de entrega <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Estado <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Cliente <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                    <tr>
                       <td>{{$pedido->DNI}}</td>
                       <td>{{$pedido->nombre}}</td>
                       <td>{{$pedido->apellido}}</td>
                       <td>{{$pedido->correo}}</td>
                       <td>{{$pedido->telefono}}</td>
                       <td>{{$pedido->codigo_postal}}</td>
                       <td>{{$pedido->fecha_pedido}}</td>
                       <td>{{$pedido->fecha_entrega}}</td>
                       <td>{{$pedido->estado}}</td>
                       <td>{{$pedido->users_id}}</td>
                       <td><a href="{{ route('pedidos.edit', $pedido) }}" role="button"><i class="bi bi-pencil-square"></i><i class="bi bi-trash3"></i></a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
    @endsection