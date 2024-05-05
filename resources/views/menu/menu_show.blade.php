<x-vista-principal>

    <h1>Mi carrito</h1> <br>

    @if(session('success'))
    <br>
    <div class="alert alert-success">
        <i class="bi bi-clipboard2-check"></i>
        <strong>Exito!</strong> {{ session('success') }} !
    </div>
    @endif

    @if($pedidos->isNotEmpty())
    @foreach ($pedidos as $pedido)
    <h2>Pedido {{ $pedido->id }} | Total: ${{ $pedido->total }}</h2> <br>
    <form action="{{ route('menu.destroy', $pedido->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Borrar</button>
    </form>
    <br>
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
            @foreach ($pedido->productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $infoPivot[$pedido->id][$producto->id]['cantidad'] ?? 'Cantidad no disponible' }}</td>
                <td>${{ $infoPivot[$pedido->id][$producto->id]['subtotal'] ?? 'Subtotal no disponible' }}</td>
                <td><a href="{{ route('productos.show', $producto->id) }}">Info..</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
    @endforeach
    @else
    <h3>No hay pedidos</h3>
    @endif

</x-vista-principal>