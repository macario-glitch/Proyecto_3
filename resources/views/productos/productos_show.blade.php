<x-vista-principal>

    <table class="table-fixed w-full table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Creado</th>
                <th>Modificaciones</th>
            </tr>
        </thead>
        <tbody>
            @if($pro)
            <tr>
                <td>{{ $pro->id }}</td>
                <td>{{ $pro->nombre }}</td>
                <td>$ {{ $pro->precio }}</td>
                <td>{{$pro->descripcion}}</td>
                <td><img class="img-fluid" width="150" src="/storage/{{ $pro->photo_path }}" alt="Pedido"></td>
                <td>{{ $pro->created_at? $pro->created_at->format('d/m/Y H:i:s') : '-' }}</td>
                <td>{{ $pro->updated_at? $pro->updated_at->diffForHumans() : '-' }}</td>
            </tr>
            @else
            <tr>
                <td colspan="6">No se encontró el producto</td>
            </tr>
            @endif
        </tbody>
    </table>

</x-vista-principal>