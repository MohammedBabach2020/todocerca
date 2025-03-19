@php
    $categories = \App\Category::all();

@endphp

<div id="mySidenav" class="sidenav">

    <ul class="p-3" style="direction :ltr;">

        <div id="main">

            <li><a href="javascript:void(0)" class="closebtn pb-4" onclick="closeNav()">&times;</a></li>

            <li class="item"> <a href="#">Ofertas <i class="fas fa-chevron-right"></i></a>
            </li>

            <li class="item" onclick="opensub()"> <a href="#">Comercio <i class="fas fa-chevron-right"></i></a>
            </li>


            <li class="item"> <a href="#">Sobre nosotros <i class="fas fa-chevron-right"> </i></a>
            </li>

            <li class="item" onclick="toggleContact()"> <a href="javascript:void(0)">Contacta con TODO CERCA<i
                        class="fas fa-chevron-right"></i></a></li>
        </div>

        <div id="mainsub" style="display: none">
            <li><a href="javascript:void(0)" class="closebtn pb-4" onclick="closesub()">&times;</a></li>

            @foreach ($categories as $item)
                <li class="item"> <a class="d-inline" href="/shop/{{ $item->name }}">{{ $item->name }}</a><i
                        class="fas fa-chevron-right"></i></li>
            @endforeach
        </div>
        @include('components.contact')
    </ul>




</div>
