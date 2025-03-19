@extends('app')

@section('title', 'Último paso..')


@section('style')


@endsection
@section('content')

    @include('nav')

    <div class="container mt-5 pt-4 " style="direction:ltr;">
        <form action="{{ route('confirm.checkout') }}" method="post">
            @csrf


            <div class="row">
                <div class="col-12 pt-5 ps-5 pe-5">
                    <h3>Información de envío</h3>
                    <p><i class="fas fa-phone"></i> {{ $address->phone }}</p>
                    <p><i class="fas fa-map"></i> {{ $address->address }}</p>
                    <p><i class="fas fa-envelope"></i> {{ $address->email }}</p>
                </div>

                <div class="col-12 pt-3 ps-5 pe-5">
                    <h3>Detalles del pedido</h3>
                    <table class="table table-bordered table-responsive">
                        <thead class="bg-green text-light ">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Creciente</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_details as $item)
                                <tr style="background: #ffcf81">
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $item->name }} <input type="hidden" name="products[{{ $loop->index }}][name]"
                                            value="{{ $item->name }} ">
                                    </td>
                                    <td>{{ $item->qty }} <input type="hidden" name="products[{{ $loop->index }}][qty]"
                                            value="{{ $item->qty }}">
                                    </td>
                                    <td>{{ $item->price }} <input type="hidden"
                                            name="products[{{ $loop->index }}][price]" value="{{ $item->price }} ">
                                    </td>
                                    <td>{{ $item->price * $item->qty }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <button type="submit" class="btn text-light bg-green pt-3 pb-3 mb-3"><b>Verificar</b></button>
                </div>

            </div>

        </form>
    </div>


@endsection
