<x-vista-principal>

    <table class="table-fixed w-full table">
        <thead>
            <tr>
                @if (auth()->user() && auth()->user()->role == 'Admin')
                <th>ID</th>
                @endif
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Imagen</th>
                @if (auth()->user() && auth()->user()->role == 'Admin')
                <th>Creado</th>
                <th>Modificaciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @if($pro)
            <tr>
                @if (auth()->user() && auth()->user()->role == 'Admin')
                <td>{{ $pro->id }}</td>
                @endif
                <td>{{ $pro->nombre }}</td>
                <td>$ {{ $pro->precio }}</td>
                <td>{{$pro->descripcion}}</td>
                <td><img class="img-fluid" width="150" src="/storage/{{ $pro->photo_path }}" alt="Productos"></td>
                @if (auth()->user() && auth()->user()->role == 'Admin')
                <td>{{ $pro->created_at? $pro->created_at->format('d/m/Y H:i:s') : '-' }}</td>
                <td>{{ $pro->updated_at? $pro->updated_at->diffForHumans() : '-' }}</td>
                @endif
            </tr>
            @else
            <tr>
                <td colspan="6">No se encontró el producto</td>
            </tr>
            @endif
        </tbody>
    </table>

</x-vista-principal>