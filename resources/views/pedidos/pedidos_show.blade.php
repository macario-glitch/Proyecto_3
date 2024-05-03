<x-vista-principal>

    <h1>{{ $nombre }}</h1> <br>

    @if($pedidos_info->isnotEmpty())
    <h2>Pedidos:</h2>

    <table class="table-fixed w-full table">
        <thead>
            <tr>
                <th>ID del Pedido</th>
                <th>Total del Pedido</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos_info as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>$ {{ $pedido->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h3>No hay pedidos</h3>
    @endif

</x-vista-principal>