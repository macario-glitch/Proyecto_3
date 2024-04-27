<x-vista-principal>

    <h1>Clientes Y Pedidos 1:M</h1>

    <table class="table-fixed w-full table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electronico</th>
                <th>Contraseña</th>
                <th>Pedidos</th>
                <th>Creado</th>
                <th>Modificaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->correo}}</td>
                <td>{{$cliente->contraseña}}</td>
                <td><a href="{{ route('pedidos.show', $cliente->id) }}">Info..</a></td>
                <td>{{ $cliente->created_at ? $cliente->created_at->format('d/m/Y H:i:s') : '-' }}</td>
                <td>{{ $cliente->updated_at ? $cliente->updated_at->diffForHumans() : '-' }}</td>
                <td>
                    <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                    <a class="btn btn-warning" href="{{ route('cliente.edit', $cliente->id) }}">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-vista-principal>