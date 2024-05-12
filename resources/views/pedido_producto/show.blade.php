<x-vista-principal>

    <h1>Contenido del Pedido</h1> <br>

    @if($pp_info->isnotEmpty())
    <h2>Total: $ {{$pedido_info->total}}</h2>

    <table class="table-fixed w-full table">
        <thead>
            <tr>
                <th>Nombre del Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Información del Producto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedido_info->productos as $pedido)
            <tr>
                <td>{{ $pedido->nombre }}</td>
                @foreach ($pp_info as $detalle)
                @if ($detalle->id_producto === $pedido->id)
                <td>{{ $detalle->cantidad }}</td>
                <td>$ {{ $detalle->subtotal }}</td>
                <th><a href="{{ route('productos.show', $detalle->id_producto) }}">Info..</a></th>
                @endif
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h3>Error</h3>
    @endif

</x-vista-principal>