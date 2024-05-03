<x-vista-principal>

    <h1>Edita un Usuario</h1>
    <form class="form" action="{{ route('user.update', $usuario) }}" method="POST">
        @csrf
        @method('PATCH')

        <label class="form-label" for="name">Nombre:</label> <br>
        <input class="form-control" type="text" name="name" placeholder="Nombre" value="{{ $usuario->name }}" required maxlength="255" />
        @error('name')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>Error.</strong> El campo nombre solo puede contener letras, espacios, puntos y comillas simples. Minimo 2 y Maximo 255 caracteres.
        </div>
        @enderror

        <label class="form-label" style="margin-top: 3vh;" for="email">Correo:</label> <br>
        <input class="form-control" type="email" name="email" placeholder="test@dominio.com" value="{{ $usuario->email }}" required maxlength="255" />
        @error('email')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>Error.</strong> El campo email debe ser una dirección de correo electrónico válida.
        </div>
        @enderror

        <label class="form-label" style="margin-top: 3vh;" for="role">Rol del Usuario:</label> <br>
        <select name="role" id="role">
            <option value="Cliente" {{ $usuario->role == 'Cliente' ? 'selected' : '' }}>Cliente</option>
            <option value="Admin" {{ $usuario->role == 'Admin' ? 'selected' : '' }}>Administrador</option>
        </select>

        <button type="submit"  style="margin-left: 3vw;" class="btn btn-primary">Guardar</button>
    </form>

</x-vista-principal>
