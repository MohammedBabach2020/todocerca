@extends('app')

@section('title')
    {{ $cat }}
@endsection

@section('content')
    @include('nav')




    <div class="container-fluid p-0 m-0" style="height: 600px; max-height:50vh !important;">
        <img src="{{ asset('storage/' . $image) }}" class="image-responsive" style="width:100%; height:100%;">

    </div>




    <div class="container-fluid p-5">
        <div class="row  g-3 mb-5">
            <div class="col-md-2">
                <h1 class="text-center  font-green p-2 d-inline" style="border-bottom: 2px solid ;">{{ $cat }}</h1>
            </div>

        </div>
        <div class="row g-3 justify-content-center">

            @foreach ($products as $item)
                <div class="col-md-2 p-2 bg-light d-flex shadow  justify-content center align-items-center flex-column mx-1"
                    style="border-radius: 35px">
                    <h5 class="card-title text-left p-2">{{ $item->name }}</h5>
                    <div class="mb-3" style="position: relative; height:100%;">
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
                        <div style="position:absolute; bottom:10px; left:10px; ">
                            <h5 class="text-light fw-bold">{{ $item->selling_price }} £</h5>
                        </div>
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img" alt="{{ $item->name }}"
                            style="border-radius: 35px">
                    </div>


                </div>
            @endforeach
        </div>
    </div>

    <div class="container mb-5 mt-5 pt-5 pb-5"></div>
@endsection
