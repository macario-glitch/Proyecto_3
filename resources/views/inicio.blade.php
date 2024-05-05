<x-vista-principal>

    <div class="text-center" style="margin-top: 3vh;">
        <h2>Pasteleria Delicious</h2>
    </div>

    <div class="container" style="margin-top: 3vh;">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 text-center border border-2 border-dark rounded border" style="background-color: rgb( 255, 145, 145 ); margin-bottom:2%;">
                <h3 style="padding-top: 2vh; padding-bottom: 8vh;">Deliciosos Pasteles. Come los que puedas!!</h3>
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('NiceAdmin/assets/img/cake_intro.png') }}" alt="Cake" class="img-fluid" style="max-width: 400px;">
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 text-center border border-2 border-dark rounded border" style="background-color: rgb( 246, 255, 178 ); margin-bottom:2%; position: relative;">
                <h3 style="padding-top: 5vh; padding-bottom: 10vh;">ORDENA YA !!</h3>
                <a href="{{ route('menu.index') }}" class="btn btn-light border border-2 border-dark rounded border" style="margin-bottom: 1vh; padding: 2%; font-size:larger; position: absolute; top: 25%; left: 50%; transform: translate(-50%, -50%); z-index: 1;">PEDIDOS</a>
                <img src="{{ asset('NiceAdmin/assets/img/pedido_intro.png') }}" alt="Cake" class="img-fluid" style="max-width: 300px; position: relative; z-index: 0;">
            </div>


            <div class="col-12 text-center border border-2 border-dark rounded border" style="background-color: rgb( 178, 204, 255 );">
                <h3 style="padding-top: 5vh; padding-bottom: 5vh;">Escoge de nuestra GRAN VARIEDAD !!</h3>

            </div>
        </div>
    </div>


</x-vista-principal>