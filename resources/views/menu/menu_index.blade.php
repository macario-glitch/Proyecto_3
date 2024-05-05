<x-vista-principal>
    <h1 class="text-center" style="margin: 5%">Compra en linea</h1>

    @if(session('success'))
    <br>
    <div class="alert alert-success">
        <i class="bi bi-bag-fill"></i>
        <strong>Exito!</strong> {{ session('success') }}
    </div>
    @endif

    @if(session('alert'))
    <br>
    <div class="alert alert-warning">
        <i class="bi bi-bag-fill"></i>
        <strong>OH NO!</strong> {{ session('alert') }}
    </div>
    @endif
    <br>
    Mostrar la lista de productos

    <form action="{{ route('menu.guardar') }}" method="POST">
        @csrf
        <ul class="list-group">
            @foreach($productos as $producto)
            <li class="list-group-item">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" id="producto{{ $producto->id }}" name="producto[]" value="{{ $producto->id }}" data-precio="{{ $producto->precio }}">
                        </div>
                    </div>
                    <label for="producto{{ $producto->id }}" class="form-control">
                        <img class="img-fluid" width="200" src="/storage/{{ $producto->photo_path }}" alt="Pedido">
                        <p><strong>{{ $producto->nombre }} </strong>- $<span class="precio">{{ $producto->precio }}</span></p><br>
                        <p>{{ $producto->descripcion }}</p>
                    </label>
                    <div class="cantidad-container input-group-append">
                        <label for="cantidad{{ $producto->id }}" class="input-group-text">Cantidad:</label>
                        <input type="number" id="cantidad{{ $producto->id }}" name="cantidad[]" value="1" min="1" class="form-control">
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        @if (auth()->user())
        <input type="hidden" name="total" id="total" value="0">
        <button type="submit" class="btn btn-primary" style="margin-top: 3vh;">Enviar</button>
        @endif
    </form>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const cantidadContainer = this.parentElement.querySelector('.cantidad-container');
                    cantidadContainer.style.display = this.checked ? 'block' : 'none';
                    recalcularTotal();
                });
            });

            const cantidadInputs = document.querySelectorAll('input[name="cantidad[]"]');
            cantidadInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const precio = parseFloat(this.parentElement.parentElement.querySelector('.input-group-text input[type="checkbox"]').dataset.precio);
                    const cantidad = parseInt(this.value);
                    const subtotal = precio * cantidad;
                    this.parentElement.parentElement.querySelector('.precio').textContent = subtotal.toFixed(2);
                    recalcularTotal();
                });
            });

            // Función para recalcular el total sumando los subtotales
            function recalcularTotal() {
                let total = 0;
                const subtotales = document.querySelectorAll('.precio');
                subtotales.forEach(subtotalElement => {
                    total += parseFloat(subtotalElement.textContent);
                });
                document.getElementById('total').value = total.toFixed(2);
            }

            // Llamar a la función recalcularTotal al cargar la página
            recalcularTotal();
        });
    </script>


</x-vista-principal>