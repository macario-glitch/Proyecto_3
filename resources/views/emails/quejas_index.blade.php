<x-vista-principal>

    <h1 style="margin-top: 3vh;">Sección de Quejas</h1>

    <h3 style="margin-top: 3vh;">QUEREMOS ESCUCHARTE!</h3>

    <h5 style="margin-top: 3vh;">Desde aqui puedes ayudarnos a crear una pagina web mas cómoda para todos!</h5>

    <form class="form" action="{{ route('quejas.store') }}" method="POST">
        @csrf
        @if($usuario)
        <input class="form-control" type="hidden" name="nombre" value="{{ $usuario->name }}" />
        <input class="form-control" type="hidden" name="correo" value="{{ $usuario->email }}" />

        <label class="form-label" for="desc" style="margin-top: 3vh;">Problema:</label> <br>
        <textarea class="form-control" rows="12" cols="50" name="desc" required></textarea>
        @error('desc')
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <i class="bi bi-exclamation-triangle me-1"></i>
            <strong>Error.</strong> La descripción es inválida. [Mayor a 10 y Menor a 255 caracteres]
        </div>
        @enderror
        @if(session('success'))
        <br><div class="alert alert-success">
        <i class="bi bi-building-check"></i>
            <strong>Exito!</strong> {{ session('success') }} Gracias por aportar con tu opinion!
        </div>
        @endif
        @else
        <h1>Problemas al Cargar!</h1>
        @endif

        <br><br><button type="submit" class="btn btn-primary">Guardar</button>
    </form>

</x-vista-principal>