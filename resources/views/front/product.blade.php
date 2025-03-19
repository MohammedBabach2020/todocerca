@extends('app')

@section('title')
    {{ $products->name }}
@endsection


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


@php
    use App\Product;
    $relatedProducts = Product::inRandomOrder()->limit(10)->get();
@endphp


@section('content')
    @include('nav')


    <div class="container-fluid p-5">


        <div class="row p-5 justify-content-center align-items-center ">

            <div class="col-md-4 ">
                <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails  d-flex justify-content-center align-items-center flex-column rounded "
                    style="height: 100% ; width:100%;">
                    <a class="large-image-link  rounded" href="{{ asset('larges/' . $products->image) }}"
                        style="position: relative !important; display:block !important ; height: 100% ; width:100%;">
                        <img class="main-image rounded" src="{{ asset('storage/' . $products->image) }}"
                            style="width: 100%; display:block; height:300px;" alt="...">
                    </a>

                </div>

                {{-- small products swipper slide --}}
                <div class="thumbnails d-flex justify-content-center align-items-center ">
                    <swiper-container class="mySwiper" space-between="5" slides-per-view="3">
                        @foreach ($images as $image)
                            <swiper-slide class="swiper-slide" style="height: 100px !important;" class="mb-2">
                                <div class="row justify-content-center align-items-center"
                                    style="height: 100% !important;width: 100% !important;">
                                    <div class="col-12 p-1">

                                        <a href="{{ asset('larges/' . $image->image) }}"
                                            data-standard="{{ asset('storage/' . $image->image) }}" style="width :100%; ">
                                            <img class="carousel-image" src="{{ asset('storage/' . $image->image) }}"
                                                class=" img-fluid mt-2" alt="..." style="width :100%;">
                                        </a>
                                    </div>
                                </div>
                            </swiper-slide>
                        @endforeach

                    </swiper-container>




                </div>
            </div>

            <div class="col-md-8 text-left  p-2 mt-5 pt-5 rounded">
                <div class="row">
                    <div class="col-md-11">
                        <div class="d-flex w-100" style="border-bottom:3px solid black;">
                            <div class="w-50">
                                <h3 style=" display:inline; color:black">{{ $products->name }}

                                </h3>
                            </div>


                        </div>
                    </div>



                </div>

                <div class="w-100 mt-4 mb-5">


                    <p class="mt-1">
                        {{ $products->description }}
                    </p>

                    <div class="row mt-4">
                        <div class="col-md-10">


                            <p class="mx-3 " style="font-size:13px; color:grey;"> <b class="text-dark" id="prix"></b>
                                Disfrute de envío y devolución gratuitos</p>
                        </div>
                        <div class="col-md-2">
                            @if ($products->stock > 0)
                                <p style="font-size:13px; color:grey;"><i class="fas fa-circle text-success"></i> Existente
                                </p>
                            @else
                                <p style="font-size:13px; color:grey;"><i class="fas fa-circle text-danger"></i> Liquidado
                                </p>
                            @endif

                        </div>
                        <div class="col-12 text-center mt-4">

                            @if ($products->stock > 0)
                                <form action="{{ route('cart.add') }}" method="post">
                                    @csrf
                                    <input id="goid" type="hidden" name="goid" value="{{ $products->id }}">
                                    <input id="price" type="hidden" name="price"
                                        value="{{ $products->buying_price }}">
                                    <button type="submit" class="btn text-light bg-green pt-4 pb-4"
                                        style="background: font-size:18pt; font-family:sans-serif !important;">
                                        Añadir a la bolsa
                                    </button>
                                </form>
                            @else
                                <h5 class="font-green text-start">Entimos comunicarte que nos estamos quedando sin stock de
                                    ese
                                    producto, lo conseguiremos
                                    lo antes posible <br> Pero podrás seguir disfrutando de nuestra tienda para más
                                    productos y
                                    ofertas.</h5>
                            @endif


                        </div>
                    </div>
                </div>

            </div>

        </div>

        <hr>

        <div class="container mt-4">
            <h3>Quizás quieras estos productos</h3>
            <swiper-container class="mySwiper" pagination="false" autoplay-delay="1000"
                autoplay-disable-on-interaction="false" slides-per-view="auto" centered-slides="true" space-between="30"
                loop="true">
                @foreach ($relatedProducts as $item)
                    <swiper-slide style="height: 400px !important;">

                        <div class="bg-light d-flex shadow  justify-content center align-items-center flex-column mx-1"
                            style="border-radius: 35px !important;">
                            <h5 class="card-title text-left p-2">{{ $item->name }}</h5>
                            <div class="mb-3 ps-2 pe-2" style="position: relative; height:100%; width:100% !important;">
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


    </div>

    <script>
        var $easyzoom = $('.easyzoom').easyZoom();
        var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');
        $('.thumbnails').on('click', 'a', function(e) {
            var $this = $(this);

            e.preventDefault();

            // Use EasyZoom's `swap` method
            api1.swap($this.data('standard'), $this.attr('href'));
        });
    </script>
@endsection


@section('js')
@endsection
