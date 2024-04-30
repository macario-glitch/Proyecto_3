<x-vista-principal>

    <table class="table-fixed w-full table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Creado</th>
                <th>Modificaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if($pro)
            <tr>
                <td>{{ $pro->id }}</td>
                <td>{{ $pro->nombre }}</td>
                <td>{{ $pro->precio }}</td>
                <td>{{ $pro->created_at? $pro->created_at->format('d/m/Y H:i:s') : '-' }}</td>
                <td>{{ $pro->updated_at? $pro->updated_at->diffForHumans() : '-' }}</td>
                <td>
                    <form action="{{ route('productos.destroy', $pro->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
            @else
            <tr>
                <td colspan="6">No se encontró el producto</td>
            </tr>
            @endif
        </tbody>
    </table>

</x-vista-principal>