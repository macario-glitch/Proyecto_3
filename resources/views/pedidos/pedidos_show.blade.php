<x-vista-principal>

<h1>{{ $nombre }}</h1>

@if($pedidos_info->isNotEmpty())
    <h2>Pedidos:</h2>
    <ul>
        @foreach ($pedidos_info as $pedido)
        <li>{{ $pedido->id }} - {{ $pedido->total }}</li>
        @endforeach
    </ul>
@else
    <h3>No hay pedidos</h3>
@endif

</x-vista-principal>