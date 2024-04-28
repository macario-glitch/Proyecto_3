<x-vista-principal>

    <h1>Users Y Pedidos 1:M</h1>

    <table class="table-fixed w-full table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electronico</th>
                <th>Verificación de Correo Electronico</th>
                <th>Contraseña</th>
                <th>Rol</th>
                <th>Foto de Perfil</th>
                <th>Pedidos</th>
                <th>Creado</th>
                <th>Modificaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{ $user->email_verified_at ? $user->email_verified_at->format('d/m/Y H:i:s') : '-' }}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->profile_photo_path}}</td>
                <td><a href="{{ route('pedidos.show', $user->id) }}">Info..</a></td>
                <td>{{ $user->created_at ? $user->created_at->format('d/m/Y H:i:s') : '-' }}</td>
                <td>{{ $user->updated_at ? $user->updated_at->diffForHumans() : '-' }}</td>
                <td>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                    <a class="btn btn-warning" href="{{ route('user.edit', $user->id) }}">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-vista-principal>