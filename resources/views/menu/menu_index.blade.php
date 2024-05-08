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


    <form action="{{ route('menu.guardar') }}" method="POST">
        @csrf
        <ul class="list-group">
            @foreach($productos as $producto)
            <li class="list-group-item">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" id="producto{{ $producto->id }}" name="productos[{{ $producto->id }}][selected]" value="1" data-precio="{{ $producto->precio }}" @if(old('productos.'.$producto->id.'.selected', 0) == 1) checked @endif>
                        </div>
                    </div>
                    <label for="producto{{ $producto->id }}" class="form-control">
                        <img class="img-fluid" width="200" src="/storage/{{ $producto->photo_path }}" alt="Pedido">
                        <p><strong>{{ $producto->nombre }} </strong>- $<span class="precio">{{ $producto->precio }}</span></p><br>
                        <p>{{ $producto->descripcion }}</p>
                    </label>
                    <div class="cantidad-container input-group-append">
                        <label for="cantidad{{ $producto->id }}" class="input-group-text">Cantidad:</label>
                        <input type="number" id="cantidad{{ $producto->id }}" name="productos[{{ $producto->id }}][cantidad]" value="1" min="1" max="9" class="form-control">
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
                const hiddenInput = checkbox.nextElementSibling;
                checkbox.addEventListener('change', function() {
                    hiddenInput.value = this.checked ? 1 : 0;
                    const cantidadContainer = this.parentElement.parentElement.querySelector('.cantidad-container');
                    cantidadContainer.style.display = this.checked ? 'block' : 'none';
                });
            });

            const cantidadInputs = document.querySelectorAll('input[name^="productos["][name$="][cantidad]"]');
            cantidadInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const precio = parseFloat(this.parentElement.parentElement.querySelector('.input-group-text input[type="checkbox"]').dataset.precio);
                    const cantidad = parseInt(this.value);
                    const subtotal = precio * cantidad;
                    this.parentElement.parentElement.querySelector('.precio').textContent = subtotal.toFixed(2);
                });
            });
        });
    </script>



</x-vista-principal>