<x-vista-principal>

    <h1>Pedido & Producto M:N</h1>

    @if(session('success'))
    <br>
    <div class="alert alert-success">
        <i class="bi bi-clipboard2-check"></i>
        <strong>Exito!</strong> {{ session('success') }} !
    </div>
    @endif
    <br>
    <h2>Crea un nuevo producto: </h2>
    <a class="btn btn-warning" style="margin-bottom:3vh;" href="{{ route('productos.create') }}">Crear</a>

    <table class="table-fixed w-full table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Creado</th>
                <th>Modificaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{$producto->id}}</td>
                <td>{{$producto->nombre}}</td>
                <td>$ {{$producto->precio}}</td>
                <td>{{$producto->descripcion}}</td>
                <td><img class="img-fluid" width="200" src="/storage/{{ $producto->photo_path }}" alt="Pedido"></td>
                <td>{{ $producto->created_at ? $producto->created_at->format('d/m/Y H:i:s') : '-' }}</td>
                <td>{{ $producto->updated_at ? $producto->updated_at->diffForHumans() : '-' }}</td>
                <td>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                    <a class="btn btn-warning" style="margin: 4%;" href="{{ route('productos.edit', $producto->id) }}">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</x-vista-principal>