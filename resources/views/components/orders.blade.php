<div id="orders" style="display: none;" class="p-2 ">
    <a href="javascript:void(0)" class="text-dark text-left closebtn " onclick="toggleOrders()">&times;</a>


    @foreach ($orders as $order)
        <div class="container  ">

            <div class="card mb-3 shadow">
                <p class="p-2"> Ref : #{{ strtoupper($order->ref) }} <br> <sub>{{ $order->created_at }} </sub></p>



                <div class="card-body">
                    <div
                        class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">

                        <div class="step completed">
                            <div class="step-icon-wrap">
                                <div class="step-icon"><i class="pe-7s-config"></i></div>
                            </div>
                            <p class="step-title">Orden de procesamiento</p>
                        </div>

                        <div class="step {{ $order->isDispatched == 1 ? 'completed' : '' }}">
                            <div class="step-icon-wrap  ">
                                <div class="step-icon"><i class="pe-7s-car"></i></div>
                            </div>
                            <p class="step-title">Producto enviado</p>
                        </div>
                        <div class="step {{ $order->isDispatched == 1 ? 'completed' : '' }}">
                            <div class="step-icon-wrap">
                                <div class="step-icon"><i class="pe-7s-home"></i></div>
                            </div>
                            <p class="step-title">Producto entregado </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container  ">

            <div class="card mb-3 shadow">
                <p class="p-2"> Ref : #{{ strtoupper($order->ref) }} <br> <sub>{{ $order->created_at }} </sub></p>



                <div class="card-body">
                    <div
                        class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">

                        <div class="step completed">
                            <div class="step-icon-wrap">
                                <div class="step-icon"><i class="pe-7s-config"></i></div>
                            </div>
                            <p class="step-title">Orden de procesamiento</p>
                        </div>

                        <div class="step {{ $order->isDispatched == 1 ? 'completed' : '' }}">
                            <div class="step-icon-wrap  ">
                                <div class="step-icon"><i class="pe-7s-car"></i></div>
                            </div>
                            <p class="step-title">Producto enviado</p>
                        </div>
                        <div class="step {{ $order->isDispatched == 1 ? 'completed' : '' }}">
                            <div class="step-icon-wrap">
                                <div class="step-icon"><i class="pe-7s-home"></i></div>
                            </div>
                            <p class="step-title">Producto entregado </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endforeach


</div>
