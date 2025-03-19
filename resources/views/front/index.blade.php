@extends('app')

@section('title')
    TODO CERCA - ACCEUIL
@endsection

@section('content')
    <!-- Button trigger modal -->

    <!-- Modal -->
    @if (session()->has('Registred'))
    @else
        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content rounded-0 border-0">
                    <div class="modal-header pt-3 pe-3 pb-0 border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-5 pt-0 mt-0">
                        <h4 class="modal-title" id="exampleModalLabel"><b>JOIN OUR <br> COMMUNITY</b></h4>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <p class="lh-lg mb-3">
                                    GET 25% OFF YOUR FIRST ORDER.
                                    RECEIVE EARLY ACCESS TO PRE-SALE.
                                    EXCLUSIVE SERVICES, SHOP FASTER
                                    CHECK YOUR ORDERS AND RETURNS
                                    SAVE YOUR FAVORITE ITEMS
                                </p>
                                <form method="POST" action="{{ route('subscribe') }}">
                                    @csrf
                                    <input type="email" name="mail" placeholder="Enter your email"
                                        class="@error('email') is-invalid @enderror ps-1 pb-2 form-control border-top-0 border-start-0 border-end-0 border-2 border-dark rounded-0"
                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <button type="submit"
                                        class="btn btn-dark w-100 pt-2 pb-2 mt-3 rounded-0">SUBSCRIBE</button>

                                </form>
                            </div>
                            <div class="col-md-6 text-center">
                                <img src="{{ asset('/pop.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    @endif

    @include('nav')

    {{-- carousel --}}

    <div id="carouselExampleControls" class="carousel slide p-4" data-bs-ride="carousel">


        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('1.WEBP') }}" class="d-block w-100" alt="...">

            </div>
            <div class="carousel-item">
                <img src="{{ asset('2.WEBP') }}" class="d-block w-100" alt="...">

            </div>
            <div class="carousel-item">
                <img src="{{ asset('3.png') }}" class="d-block w-100" alt="...">

            </div>





        </div>


        <button class="carousel-control-prev btn border-0" type="button" style="outline:none !important;"
            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next btn border-0" type="button"style="outline:none !important;"
            data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- carousel --}}

    {{-- Catégories --}}

    <div class="container p-3 bg-green" style="margin-bottom: 80px !important;">

        <div class="p-2  m-3 d-inline-block" style="border-bottom: 2px solid white; ">
            <h3 class="text-left text-white p-0 m-0">Nuestras Categorías</h3>
        </div>
        <div class="row justify-content-center">
            @foreach ($categories as $item)
                <div class="col-md-6 col-sm-6 col-xs-12 item people ">
                    <a class="namcat" style="display: block ; height: 100% !important; width: 100% !important;"
                        href="/category/{{ $item->name }}">
                        <div class="box" style="display: block ; height: 100% !important; width: 100% !important;">
                            <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid w-100 cb"
                                style="display: block ; height: 100% !important; width: 100% !important;">

                            <div class="centered p-2 rounded bg-light">
                                <h5 class="mt-2"> <b>Descubre nuestra {{ $item->name }}</b></h5>
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>





    <section id="new-product-launch-banner-block_c2d2f8094eb577fa2087083b6a5f4938" class="new-launch-banner-main pb-0">
        <div class="new-launch-background-img" style="width: 100% !important; height: 100% !important;">
            <video autoplay muted loop playsinline style="width: 100%; height: 100%;">
                <source src="{{ asset('0114.mp4') }}" type="video/mp4">
            </video>
            <div class="background-overlay-video-banner"></div>
            <div class="container" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <div class="row">
                    <div class="col-12 ">
                        <div class="inner-content-position">
                            <h2 class="text-center text-white fw-bold">Tenemos todos los artículos nuevos</h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- most wanted products --}}




    <div class="container p-3 my-3" style="height: 500px">
        <div class=" d-flex justify-content-center align-items-center" style="width: 100% !important;">
            <div class="p-2  m-3 d-inline-block" style="border-bottom: 2px solid #006d40 ;  ">


                <h3 class="text-center fw-bold p-0 m-0" style="color: #006d40 ;">Las más vendidas</h3>
            </div>

        </div>
        <swiper-container class="mySwiper" pagination="false" autoplay-delay="1000" autoplay-disable-on-interaction="false"
            slides-per-view="auto" centered-slides="true" space-between="30" loop="true">
            @foreach ($products as $item)
                <swiper-slide>

                    <a class="trendLink" style="display: block ; height: 100% !important; width: 100% !important;"
                        href="/product/{{ $item->id }}/{{ $item->name }}">
                        <div class="box" style="position: relative;height: 100% !important; width: 100% !important;">
                            <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid w-100 cb"
                                style="display: block ; height: 100% !important; width: 100% !important;">

                            <div class="centered rounded bg-green" style="position: absolute; top: 100%; width:100%;">
                                <h5 class="mt-2 text-center text-white"> <b>{{ $item->name }}</b>
                                </h5>
                            </div>

                        </div>
                    </a></swiper-slide>
            @endforeach

        </swiper-container>

    </div>

    <section style="color: #fff; background-color: #f8af73;" class="mb-4">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-xl-8 text-center">
                    <h3 class="fw-bold mb-4">Testimonios</h3>
                    <p class="mb-4 pb-2 mb-md-5 pb-md-0">
                        Aquí puedes ver algunas de las experiencias de nuestros clientes con nosotros.
                    </p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card bg-green">
                        <div class="card-body py-4 mt-2">

                            <h5 class="font-weight-bold">Fatima Anwal</h5>

                            <ul class="list-unstyled d-flex justify-content-center">
                                <li>
                                    <i class="fas fa-star fa-sm text-white"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-white"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-white"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-white"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star-half-alt fa-sm text-white"></i>
                                </li>
                            </ul>
                            <p class="mb-2">
                                <i class="fas fa-quote-left pe-2"></i>Productos de gran calidad a precios accesibles. Todo
                                llegó a tiempo y bien empaquetado. Esta tienda se ha convertido en mi favorita para comprar
                                online. ¡Gracias!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card bg-green">
                        <div class="card-body py-4 mt-2">

                            <h5 class="font-weight-bold">Laura Gonsales</h5>

                            <ul class="list-unstyled d-flex justify-content-center">
                                <li>
                                    <i class="fas fa-star fa-sm text-white"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-white"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-white"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-white"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-white"></i>
                                </li>
                            </ul>
                            <p class="mb-2">
                                <i class="fas fa-quote-left pe-2"></i>"El servicio al cliente es impecable. Me ayudaron con
                                todas mis dudas y el proceso de compra fue súper sencillo. Estoy encantado con mi pedido,
                                ¡totalmente recomendable!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-0">
                    <div class="card bg-green">
                        <div class="card-body py-4 mt-2">
                            <h5 class="font-weight-bold">Kaoutar Alami</h5>
                            <ul class="list-unstyled d-flex justify-content-center">
                                <li>
                                    <i class="fas fa-star fa-sm text-white"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-white"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-white"></i>
                                </li>
                                <li>
                                    <i class="fas fa-star fa-sm text-white"></i>
                                </li>
                                <li>
                                    <i class="far fa-star fa-sm text-white"></i>
                                </li>
                            </ul>
                            <p class="mb-2">
                                <i class="fas fa-quote-left pe-2"></i>Excelente experiencia de compra. Los productos
                                llegaron rápido y en perfectas condiciones. Además, la calidad es incluso mejor de lo que
                                esperaba. ¡Sin duda volveré a comprar!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- Catégories --}}
    @if (session()->has('cookied'))
    @else
        <div class="fixed-bottom container-fluid w-100 pt-4 pb-4 pe-3 ps-3 text-white" style="background-color: black">
            <p>
                TODO CERCA uses cookies to give you the best experience. Cookies allows you shop our collections and use any
                personalized features available on our
                website. click here to view our privacy and cookie policy to learn more about this.
            </p>
            <a href="{{ route('setCookie') }}"><button
                    class="btn btn-light rounded-0 pt-1 pb-1 pe-3 ps-3">ACCEPT</button></a>
        </div>
    @endif
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#exampleModal").modal('show');
        });
    </script>
@endsection
