<x-vista-principal>

    <h1>Editar Producto</h1> <br>
    <form class="form" action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf
        @method('PATCH')

        <input class="form-control" type="text" name="nombre" placeholder="nombre" value="{{ $producto->nombre }}" required maxlength="255" />
        <label class="form-label" for="nombre">Nombre:</label> <br><br>
        @error('nombre')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>Error.</strong> El nombre ingresado es inválido.
        </div>
        @enderror

        <input class="form-control" type="number" name="precio" value="{{ $producto->precio }}" required maxlength="255" />
        <label class="form-label" for="precio">Precio:</label> <br><br>
        @error('precio')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>Error.</strong> El precio es invalido.
        </div>
        @enderror

        <button type="submit">Guardar</button>
    </form>

</x-vista-principal>