<x-vista-principal>
    <h1>Users & Pedidos 1:M</h1>

    @if(session('success'))
    <br>
    <div class="alert alert-success">
        <i class="bi bi-emoji-grin-fill"></i>
        <strong>Exito!</strong> {{ session('success') }} !
    </div>
    @endif

    <br>
    <table class="table-fixed w-full table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electronico</th>
                <th>Verificación de Correo Electronico</th>
                <th>Contraseña</th>
                <th>Rol</th>
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
                <td><a href="{{ route('pedidos.show', $user->id) }}">Info..</a></td>
                <td>{{ $user->created_at ? $user->created_at->format('d/m/Y H:i:s') : '-' }}</td>
                <td>{{ $user->updated_at ? $user->updated_at->diffForHumans() : '-' }}</td>
                <td>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                    <a class="btn btn-warning" style="margin-top: 3vh;" href="{{ route('user.edit', $user->id) }}">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-vista-principal>