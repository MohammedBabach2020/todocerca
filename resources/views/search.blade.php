@php

    use App\Product;
    $relatedProducts = Product::inRandomOrder()->limit(10)->get();
@endphp


<div class="modal fade" id="searchmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header pt-0 pb-0">
                <div class="col-1 text-center">
                    <i class="fas fa-search fs-3" aria-hidden="true"></i>
                </div>
                <div class="w-75">
                    <input placeholder="BUSCA ALGO QUE TE ENCANTE..."
                        class="w-100 pt-4 pb-4 border-0 rounded-0 fs-6 fw-bold" type="text" name=""
                        id="">
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>



            <div class="modal-body p-4" style="background-color: white;">
                <!-- Search 1 -->

                <div class="row g-3 justify-content-center">
                    <div class="col-md-12 d-flex   justify-content center align-items-center p-2">
                        <h6><b>Suggestions</b></h6>
                    </div>
                    @foreach ($relatedProducts as $item)
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
                                <img src="{{ asset('storage/' . $item->image) }}" class="card-img"
                                    alt="{{ $item->name }}" style="border-radius: 35px">
                            </div>


                        </div>
                    @endforeach
                </div>
                <!-- Search 1 -->


            </div>





        </div>
    </div>
</div>
