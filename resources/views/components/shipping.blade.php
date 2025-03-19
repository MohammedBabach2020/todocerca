<div id="shipping" style="display: none;" class="p-2">

    <a href="javascript:void(0)" class="text-dark text-left closebtn " onclick="toggleShippingInfos()">&times;</a>
    <form class="mt-3" action="{{ route('saveAddress') }}" method="POST">
        @csrf
        <div class="mb-5">
            <input type="text" name="name" placeholder="Nombre del receptor"
                class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                value="{{ $address != null ? $address->name : '' }}" required>
        </div>

        <div class="mb-5">
            <input type="text" name="lastname" placeholder="Apellido"
                class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                value="{{ $address != null ? $address->lastname : '' }}" required>
        </div>
        <div class="mb-5">
            <input type="email" name="email" placeholder="Correo electrónico"
                class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                value="{{ $address != null ? $address->email : '' }}" required>
        </div>
        <div class="mb-5">
            <input type="tel" name="phone" placeholder="Teléfono"
                class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                value="{{ $address != null ? $address->phone : '' }}" required>
        </div>
        <div class="mb-5">
            <input type="text" name="address" placeholder="Dirección"
                class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                value="{{ $address != null ? $address->address : '' }}" required>
        </div>

        <div class="row mb-5">
            <div class="col-4">
                <input type="text" name="country" placeholder="País"
                    class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                    value="{{ $address != null ? $address->country : '' }}" required>
            </div>
            <div class="col-4">
                <input type="text" name="city" placeholder="Ciudad"
                    class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                    value="{{ $address != null ? $address->city : '' }}" required>
            </div>
            <div class="col-4">
                <input type="number" name="zip" placeholder="Código postal"
                    class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                    value="{{ $address != null ? $address->zip : '' }}" required>
            </div>
        </div>

        <button type="submit" class="btn text-light bg-green
         pt-3 pb-3 mt-3"><b>Ahorrar</b></button>
    </form>
</div>
