@extends('app')

@section('title', 'Cart')
@section('style')
    <style>
        #cart-icon {


            right: 20px !important;


        }

        #eye-icon {

            right: 80px !important;


        }


        .swiper-slide {
            width: 100px !important;

        }
    </style>
@endsection
@section('content')

    @include('nav')


    @php
        use App\Product;
        $relatedProducts = Product::inRandomOrder()->limit(10)->get();
    @endphp

    <div class="container mb-4 mt-5 shadow rounded" style="direction:ltr; background:white;">
        <div class="row justify-content-center">
            @if (Cart::count() == 0)
                <div class="col-md-6 text-center">
                    <img class="img-fluid" width="100%" src="{{ asset('empty-cart.png') }}" alt="">
                    <h4>Tu bolsa está vacía</h4>
                    <a href="/">
                        <button class="btn btn-block btn-dark m-1">Seguir comprando</button>
                    </a>
                </div>
            @else
                <!-- @if (session()->has('add'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
                                                                                                                                                                                                                                                                                              <div>
                                                                                                                                                                                                                                                                                            product has been added </div>
                                                                                                                                                                                                                                                                                            </div>
    @endif -->
                <div class="alert bg-green text-light d-flex align-items-center" role="alert">
                    <div>
                        Siempre puedes comprar más ... <a href="/" class="text-light"><b>Continúa tus compras</b></a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-bordered" style="border-color:  #092924 !important;">
                            <thead class="bg-green text-light">
                                <tr>
                                    <th scope="col" style="width:50px;"> </th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
                                    <?php $prod = \App\Product::where('id', $item->id)->first(); ?>
                                    <tr>
                                        <td><img src="{{ asset('storage/' . $prod->image) }}" width="50px" /> </td>
                                        <td>{{ $prod->name }} </td>
                                        <td style=";" class="p-2">
                                            <form action="{{ route('cart.update') }}" method="post"
                                                class="row justify-content-center align-items-center">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->rowId }}">

                                                <div class="col-md-8 d-flex">
                                                    <input
                                                        style="background:none; border:none !important;  outline:none !important;"
                                                        class="form-control d-inline" name="qty" type="number"
                                                        value="{{ $item->qty }}" style="max-width:50px;" />

                                                    <button type="submit" class="btn d-inline" style="background:none; "><i
                                                            class="fas fa-check"></i></button>
                                                </div>
                                                <div class="col-md-4">

                                                </div>

                                            </form>
                                        </td>
                                        <td class="text-right">{{ $item->price * $item->qty }} $</td>
                                        <td class="text-right">
                                            <form action="{{ route('cart.remove') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->rowId }}">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fa fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col mb-2">

                    <div class="row">
                        <div class="col-sm-12 col-md-6 text-right" id="takid">

                            <div class="col-sm-12  col-md-6">
                                @if (session()->has('logged'))
                                    <a href="/address"
                                        class="btn btn-block m-1 bg-green text-light text-uppercase">Confirmar </a>
                                @else
                                    <a onclick="openlogNav()" href="#"
                                        class="btn btn-block m-1 btn-success text-uppercase">Confirmar </a> <small>Inicia
                                        sesión primero.</small>
                                @endif
                                <a href="/">
                                    <button class="btn btn-block btn-dark m-1">Seguir comprando</button>
                                </a>
                            </div>


                        </div>


                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="container mb-5">
        <hr>
    </div>
    <div class="container mt-4">
        <h3>Quizás quieras estos productos</h3>
        <swiper-container class="mySwiper" pagination="false" autoplay-delay="1000" autoplay-disable-on-interaction="false"
            slides-per-view="auto" centered-slides="true" space-between="30" loop="true">
            @foreach ($relatedProducts as $item)
                <swiper-slide style="height: 400px !important; ">

                    <div class="bg-light d-flex shadow  justify-content center align-items-center flex-column mx-1"
                        style="border-radius: 35px !important;">
                        <h5 class="card-title text-left p-2">{{ $item->name }}</h5>
                        <div class="mb-3 pe-2 ps-2" style="position: relative; height:100%;">
                            <form class="mt-2" action="{{ route('cart.addnow') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">

                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="price" value="{{ $item->selling_price }}">


                                <div id="cart-icon" role="button" onclick="this.closest('form').submit()">
                                    <i class="fas fa-plus font-green"></i>
                                </div>

                            </form>

                            <a href="/product/{{ $item->id }}/{{ $item->name }}">
                                <div id="eye-icon">


                                    <i class="fas fa-eye font-green"></i>

                                </div>
                            </a>
                            <div style="position:absolute; bottom:10px; left:20px; ">
                                <h5 class="text-light fw-bold">{{ $item->selling_price }} £</h5>
                            </div>
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img"
                                alt="{{ $item->name }}" style="border-radius: 35px">
                        </div>


                    </div>

                </swiper-slide>
            @endforeach

        </swiper-container>
    </div>
@endsection
