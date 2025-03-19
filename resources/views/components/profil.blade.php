<div id="profil" style="display: none;" class="p-2">
    <a href="javascript:void(0)" class="text-dark text-left closebtn " onclick="toggleProfilEdit()">&times;</a>
    <form class="mt-3" action="{{ route('edit.users') }}" method="POST">
        @csrf

        <div class="mb-5">
            <input type="text" name="name" placeholder="Nombre de pila"
                class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                value={{ $auth != null ? $auth->name : '' }}>
        </div>
        <div class="mb-5">
            <input type="text" name="lastname" placeholder="Apellido"
                class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                value={{ $auth != null ? $auth->lastname : '' }}>
        </div>
        <div class="mb-5">
            <input type="email" name="email" placeholder="Correo electrónico"
                class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                value={{ $auth != null ? $auth->email : '' }}>
        </div>
        <div class="mb-5">
            <input type="tel" name="phone" placeholder="Teléfono"
                class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                value={{ $auth != null ? $auth->phone : '' }}>
        </div>
        <div class="mb-5">
            <input type="text" name="country" placeholder="País"
                class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                value={{ $auth != null ? $auth->country : '' }}>
        </div>
        <?php ?>
        <div class="mb-3 text-center">
            <label class="form-check-label form-text text-dark" for="exampleCheck1"><b>Edita tu
                    cumpleaños</b></label>
            <div class="row mt-1">
                <div class="col-4 text-center">
                    <select name="day" class="form-select w-100 border-3 rounded-0 border-secondary text-center"
                        aria-label="Default select example">
                        <option selected>Día</option>
                        @foreach ($dates as $item)
                            @if (!empty($item->days))
                                <option value="{{ $item->days }}"
                                    {{ $auth != null && $auth->day == $item->days ? 'selected' : '' }}>
                                    {{ $item->days }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-4 text-center">
                    <select name="mounth" class="form-select w-100 border-3 rounded-0 border-secondary text-center"
                        aria-label="Default select example">
                        <option selected>Mes</option>
                        @foreach ($dates as $item)
                            @if (!empty($item->mounths))
                                <option value="{{ $item->mounths }}"
                                    {{ $auth != null && $auth->mounth == $item->mounths ? 'selected' : '' }}>
                                    {{ $item->mounths }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-4 text-center">
                    <select name="year" class="form-select w-100 border-3 rounded-0 border-secondary text-center"
                        aria-label="Default select example">
                        <option selected>Año</option>
                        @foreach ($dates as $item)
                            @if (!empty($item->years))
                                <option value="{{ $item->years }}"
                                    {{ $auth != null && $auth->year == $item->years ? 'selected' : '' }}>
                                    {{ $item->years }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn text-light bg-green pt-3 pb-3 mt-3"><b>Editar mi cuenta</b></button>
    </form>
</div>
