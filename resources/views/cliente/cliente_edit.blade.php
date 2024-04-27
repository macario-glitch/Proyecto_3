<x-vista-principal>

    <form class="form" action="{{ route('cliente.update', $cliente) }}" method="POST">
        @csrf
        @method('PATCH')

        <input class="form-control" type="text" name="nombre" placeholder="nombre" value="{{ $cliente->nombre }}" required maxlength="255" />
        <label class="form-label" for="nombre">Nombre:</label> <br><br>
        @error('nombre')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>Error.</strong> El nombre ingresado es inválido.
        </div>
        @enderror

        <input class="form-control" type="email" name="correo" placeholder="test@dominio.com" value="{{ $cliente->correo }}" required maxlength="255" />
        <label class="form-label" for="correo">Correo:</label> <br><br>
        @error('correo')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>Error.</strong> El correo es invalido.
        </div>
        @enderror

        <button type="submit">Guardar</button>
    </form>

</x-vista-principal>