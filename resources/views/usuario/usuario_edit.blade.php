<x-vista-principal>

    <form class="form" action="{{ route('user.update', $usuario) }}" method="POST">
        @csrf
        @method('PATCH')

        <input class="form-control" type="text" name="name" placeholder="name" value="{{ $usuario->name }}" required maxlength="255" />
        <label class="form-label" for="name">Nombre:</label> <br><br>
        @error('nombre')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>Error.</strong> El nombre ingresado es inválido.
        </div>
        @enderror

        <input class="form-control" type="email" name="email" placeholder="test@dominio.com" value="{{ $usuario->email }}" required maxlength="255" />
        <label class="form-label" for="email">Correo:</label> <br><br>
        @error('correo')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>Error.</strong> El correo es invalido.
        </div>
        @enderror

        <button type="submit">Guardar</button>
    </form>

</x-vista-principal>