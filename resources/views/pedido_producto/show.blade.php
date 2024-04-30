<x-vista-principal>

    <h1>Contenido del Pedido</h1>

    <h2>Productos:</h2>
    <ul>
        @foreach ($productos as $producto)
        <li>{{ $producto->nombre }} - {{ $producto->precio }} - <a href="{{ route('productos.show', $producto->id) }}">Info...</a></li>
        @endforeach
    </ul>

</x-vista-principal>