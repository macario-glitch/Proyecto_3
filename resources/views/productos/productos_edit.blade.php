<x-vista-principal>
    <h1>Edita el Producto</h1> <br>

    <form class="form" action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <input class="form-control" style="margin-bottom: 2vh;" type="text" name="nombre" placeholder="Ingrese el Nombre" value="{{ $producto->nombre }}" required maxlength="255" />
        @error('nombre')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>Error.</strong> El nombre ingresado es inválido.
        </div>
        @enderror

        <input class="form-control" style="margin-bottom: 2vh;" type="number" name="precio" placeholder="Coloque un Precio" value="{{ $producto->precio }}" required/>
        @error('precio')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>Error.</strong> El precio es inválido.
        </div>
        @enderror

        <input class="form-control" style="margin-bottom: 2vh;" type="text" name="descripcion" placeholder="Descripción del Producto" value="{{ $producto->descripcion }}" required/>
        @error('descripcion')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>Error.</strong> La descripción es inválida.
        </div>
        @enderror

        <input class="form-control" style="margin-bottom: 2vh;" type="file" name="photo_path" accept="image/*"/>

        <button class="btn btn-primary" type="submit">Guardar</button>
    </form>
</x-vista-principal>
