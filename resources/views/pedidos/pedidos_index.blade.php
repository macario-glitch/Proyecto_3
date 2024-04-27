<x-vista-principal>

    <h1>Clientes Y Pedidos 1:M</h1>

    <table class="table-fixed w-full table">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID del Cliente</th>
                <th>Nombre de Cliente</th>
                <th>Total del Pedido</th>
                <th>Creado</th>
                <th>Modificaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr>
                <td>{{$pedido->id}}</td>
                <td>{{$pedido->id_cliente}}</td>
                <td>{{$pedido->cliente->nombre}}</td>
                <td>{{$pedido->total}}</td>
                {{--
                    <td><a href="{{ route('pedidos.show', $cliente->id) }}">Info..</a></td> 
                --}}
                <td>{{ $pedido->created_at ? $pedido->created_at->format('d/m/Y H:i:s') : '-' }}</td>
                <td>{{ $pedido->updated_at ? $pedido->updated_at->diffForHumans() : '-' }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>

</x-vista-principal>