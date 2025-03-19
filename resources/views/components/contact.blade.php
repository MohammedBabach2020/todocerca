@php

@endphp

<div id="contact" style="display: none;" class="p-2">
    <a href="javascript:void(0)" class="text-dark text-left closebtn " onclick="toggleContact()">&times;</a>
    <form class="mt-3" action="{{ route('edit.users') }}" method="POST">
        @csrf

        @if (!session()->has('logged'))
            <div class="mb-5">
                <input type="email" name="email" placeholder="Correo electrónico"
                    class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                    required>
            </div>
        @endif

        <div class="mb-5">
            <input type="text" name="topic" placeholder="Tema"
                class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                required>
        </div>

        <div class="mb-5">
            <textarea name="meassage" placeholder="Mensaje"
                class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0" required></textarea>
        </div>




        <button type="submit" class="btn text-light bg-green pt-3 pb-3 mt-3"><b>Enviar</b></button>
    </form>
</div>
