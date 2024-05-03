<x-vista-principal>

<h1>Crea un Nuevo Producto</h1> <br>

    <form class="form" action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input class="form-control" style="margin-bottom: 2vh;" type="text" name="nombre" placeholder="Ingrese el Nombre" required maxlength="255" />
        @error('nombre')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>Error.</strong> El nombre ingresado es inválido.
        </div>
        @enderror

        <input class="form-control" style="margin-bottom: 2vh;" type="number" name="precio" placeholder="Coloque un Precio" required/>
        @error('precio')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>Error.</strong> El precio es inválido.
        </div>
        @enderror

        <input class="form-control" style="margin-bottom: 2vh;" type="text" name="descripcion" placeholder="Descripción del Producto" required/>
        @error('descripcion')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>Error.</strong> La descripción es inválida.
        </div>
        @enderror

        <input class="form-control" style="margin-bottom: 2vh;" type="file" name="photo_path" accept="image/*" required/>

        <button class="btn btn-primary" type="submit">Guardar</button>
    </form>
</x-vista-principal>
