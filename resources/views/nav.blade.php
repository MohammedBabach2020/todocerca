<!-- ---------------------------------- ------------------------------- ----------------------------------------login -->

@php
    use App\User;
    use App\Subscribe;
    use App\Address;
    use App\Order;
    if (session()->has('logged')) {
        $auth = User::where('id', session()->get('logged'))->first();
        $orders = Order::where('client_id', $auth->id)->get();
        $address = Address::where('user_id', $auth->id)->first();
    }
    $dates = DB::table('dates')->get();

@endphp

<div id="loginnav" class="rightsidenav text-start" style="direction: ltr">




    @if (session()->has('logged'))
        <div id="list-account" class="p-2">

            <div class="text-start ps-3 ">
                <a href="javascript:void(0)" class="text-dark text-left closebtn " onclick="closelogNav()">&times;</a>
                <p><b>Hola, {{ $auth->name }} {{ $auth->lastname }}! </b></p>
                <p><b>Esperamos que estés bien..</b></p>
            </div>

            <ul class="list-group mt-5 text-start">
                <li class="list-group-item border-0 pt-0"><a href="javascript:void(0)"
                        onclick="toggleProfilEdit()"><b>Mi
                            perfil</b></a>
                </li>
                <li class="list-group-item border-0 pt-0"><a href="javascript:void(0)" onclick="toggleOrders()"><b>Mis
                            órdenes</b></a></li>
                <li class="list-group-item border-0 pt-0"><a href="javascript:void(0)"
                        onclick="togglePwdEdit()"><b>Editar contraseña</b></a></li>
                <li class="list-group-item border-0 pt-0"><a href="javascript:void(0)"
                        onclick="toggleShippingInfos()"><b>Información de envío</b></a>
                </li>

            </ul>
            <div class="text-start ps-3  pt-5">
                <p class="text-secondary">Si tiene alguna consulta o necesita más ayuda, póngase en contacto con
                    nosotros.</p>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn text-light bg-green pt-3 pb-3 mt-3"><b>SIGN OUT</b></button>
            </div>
            </form>
        </div>
        @include('components.orders')
        @include('components.pwdmodal')
        @include('components.profil')
        @include('components.shipping')
    @else
        <div id="sign" class="p-4">
            <div class="row">
                <div class="col-5 text-star" onclick="signin()" role="button"><b>SIGN IN</b></div>
                <div class="col-7 text-end from-text text-secondary" onclick="signup()" role="button"><b>CREATE AN
                        ACCOUNT</b></div>
            </div>

            <form class="mt-5" method="POST" action="{{ route('confirm.login') }}">
                @csrf
                <div class="mb-5">
                    <input type="email" name="email" placeholder="Correo electrónico"
                        class="@error('email') is-invalid @enderror ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-4">
                    <input type="password" name="password" placeholder="Password"
                        class="@error('password') is-invalid @enderror ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0">
                </div>
                <div>
                    <div class="mb-3 form-check float-start">
                        <input type="checkbox" class="form-check-input rounded-0 border-3 border-dark"
                            id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">REMEMBER ME</label>
                    </div>
                    <div class="mb-3 form-check float-end">
                        <label class="form-check-label form-text" for="exampleCheck1">FORGOT PASSWORD</label>
                    </div>
                </div>
                <div class="text-center mt-5 pt-5">
                    <button type="submit" class="btn btn-light w-100 pt-3 pb-3 mt-3"
                        style="background:#ebe2d7 !important"><b>SIGN IN</b></button>
                    <label class="form-check-label text-secondary mt-2 form-text"><b>SIGN IN WITH <a>FACEBOOK</a> OR
                            <a>GOOGLE</a></b></label>
                </div>
            </form>

        </div>

        <!------------------>

        <div id="signup" class="p-4" style="display: none">
            <div class="row">
                <div class="col-5 text-star from-text text-secondary" onclick="signin()" role="button"><b>SIGN
                        IN</b></div>
                <div class="col-7 text-end" onclick="signup()" role="button"><b>CREATE AN ACCOUNT</b></div>
            </div>

            <form class="mt-3" action="{{ route('confirm.register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <input type="email" name="email" placeholder="Correo electrónico"
                        class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-5">
                    <input type="password" name="password" placeholder="Password"
                        class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0">
                </div>
                <div class="mb-5">
                    <input type="password" name="conpassword" placeholder="Confirm password"
                        class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0">
                </div>
                <div class="mb-5">
                    <input type="text" name="name" placeholder="Nombre de pila"
                        class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0">
                </div>
                <div class="mb-5">
                    <input type="text" name="lastname" placeholder="Apellido"
                        class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0">
                </div>
                <div class="mb-5">
                    <input type="text" name="country" placeholder="País"
                        class="ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0">
                </div>

                <div class="mb-5 text-center">
                    <label class="form-check-label form-text text-dark" for="exampleCheck1"><b>WE WOULD LOVE TO KNOW
                            YOUR BIRTHDAY</b></label>
                    <div class="row mt-1">
                        <div class="col-4 text-center">
                            <select name="day"
                                class="form-select w-100 border-3 rounded-0 border-secondary text-center"
                                aria-label="Default select example">
                                <option selected>Día</option>
                                @foreach ($dates as $item)
                                    @if (!empty($item->days))
                                        <option value="{{ $item->days }}">{{ $item->days }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 text-center">
                            <select name="mounth"
                                class="form-select w-100 border-3 rounded-0 border-secondary text-center"
                                aria-label="Default select example">
                                <option selected>Mes</option>
                                @foreach ($dates as $item)
                                    @if (!empty($item->mounths))
                                        <option value="{{ $item->mounths }}">{{ $item->mounths }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 text-center">
                            <select name="year"
                                class="form-select w-100 border-3 rounded-0 border-secondary text-center"
                                aria-label="Default select example">
                                <option selected>Año</option>
                                @foreach ($dates as $item)
                                    @if (!empty($item->years))
                                        <option value="{{ $item->years }}">{{ $item->years }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input rounded-0 border-3 border-dark"
                        id="exampleCheck1">
                    <label class="form-check-label text-secondary" for="exampleCheck1">I SUBSCRIBE FOR EXCLUSIVE
                        UPDATES</label>
                </div>
                <div class="mb-1 form-check">
                    <input type="checkbox" class="form-check-input rounded-0 border-3 border-dark"
                        id="exampleCheck1">
                    <label class="form-check-label text-secondary" for="exampleCheck1">I AGREE TO TERMS &
                        CONDITIONS</label>
                </div>

                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-light w-100 pt-3 pb-3 mt-3"
                        style="background:#ebe2d7 !important"><b>Crear una cuenta</b></button>
                    <label class="form-check-label text-secondary mt-2 form-text"><b>SIGN IN WITH <a>FACEBOOK</a> OR
                            <a>GOOGLE</a></b></label>
                </div>
            </form>

        </div>

    @endif

</div>

<!-- ---------------------------------- ------------------------------- ----------------------------------------login -->
@include('search')

<nav class="navbar navbar-light bg-green" id="nosearch">
    <div class="container-fluid">
        <div>
            <span style="font-size:30px;cursor:pointer;" class="navbar-brand ps-3" onclick="openNav()"><i
                    class="fas fa-equals text-white"></i> </span>
            <a href="/" class="text-white fs-2"><b>TODO CERCA</b></a>
        </div>



        <div class="d-flex text-end">

            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchmodal">
                <button type="button" class="btn position-relative pb-0">
                    <i class="fas fa-search fs-5 text-white" aria-hidden="true"></i>
                </button>
            </a>

            <a class="nav-link" onclick="openlogNav()">
                <button type="button" class="btn position-relative pb-0">
                    @if (session()->has('logged'))
                        <i class="far fa-user fs-5 text-white" aria-hidden="true"> {{ $auth->name }}</i>
                    @else
                        <i class="far fa-user fs-5 text-white" aria-hidden="true"></i>
                    @endif
                </button>
            </a>
            <a class="nav-link" href="/cart">
                <button type="button" class="btn position-relative pb-0">
                    <i class="fas fa-shopping-bag fs-5 text-white" aria-hidden="true"></i> <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill"
                        style="background-color: black !important">{{ Cart::count() }}</span>
                </button>
            </a>


        </div>
    </div>
</nav>



@section('js')
    <script src="{{ asset('navs.js') }}"></script>
@endsection
