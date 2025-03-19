<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/55307fcc40.js" crossorigin="anonymous"></script>
    <link href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css" media="all"
        rel="stylesheet" id="font-awesome-5-kit-css">
    <link href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css" media="all"
        rel="stylesheet" id="font-awesome-5-kit-css">
    <link href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all" rel="stylesheet"
        id="font-awesome-5-kit-css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easyzoom@2.5.3/css/easyzoom.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/easyzoom/2.5.2/easyzoom.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/easyzoom/2.5.2/easyzoom.min.js"></script>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('variables.css') }}">
    <link rel="stylesheet" href="{{ asset('stylecat.css') }}">
    <link rel="stylesheet" href="{{ asset('stylecart.css') }}">
    <link rel="stylesheet" href="{{ asset('navs.css') }}">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    @toastr_css
    @yield('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easyzoom@2.5.3/css/easyzoom.css">
    <script src="https://cdn.jsdelivr.net/npm/easyzoom@2.5.3/dist/easyzoom.js"></script>
    <title>
        @yield('title')
    </title>

    @livewireStyles
</head>

<body class="bg-nude">
    @include('leftNav')
    @yield('content')
    @yield('js')
    {{-- Footer --}}

    <footer class="footer d-block">
        <div class="container-fluid pb-2 pt-5 infos bg-green" id="infos">
            <div class="row mx-auto  content-justify-center">

                <div class="mb-5 pb-5 row justify-content-center col-12">
                    <div class="col-md-4">
                        <p style=" font-weight:lighter !important;">Newsletter</p>

                        <form>
                            <input class="form-control w-100 text-white " type="search" placeholder="Email"
                                aria-label="Search"
                                style="background: none !important; border-bottom: 2px solid white !important;">
                            <!-- <button class="btn btn-outline-light border border-1 rounded-0" type="submit" style="color: #eea012 !important"><i class="fas fa-paper-plane"></i></button> -->
                        </form>
                    </div>

                </div>
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('logowhite.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <ul style="list-style:none;">
                        <li>
                            <h3>NECESITAS AYUDA?</h3>
                        </li>
                        <li style="margin-top:10px;"><a href="#" style="  text-decoration:none;">Preguntas
                                frecuentes</a></li>
                        <li style="margin-top:10px;"><a href="#" style="  text-decoration:none;"> CONTÁCTENOS </a>
                        </li>
                        <li style="margin-top:10px;"><a href="#" style="  text-decoration:none;"> ATENCIÓN AL
                                CLIENTE
                            </a></li>
                        <li style="margin-top:10px;"><a href="#" style="  text-decoration:none;"> ENVÍO</a>
                        </li>
                        <li style="margin-top:10px;"><a href="#" style="  text-decoration:none;"> RETURNS &
                                EXCHANGE </a></li>

                    </ul>
                </div>
                <div class="col-md-4">
                    <ul style="list-style:none;">
                        <li>
                            <h3>LEGAL</h3>
                        </li>
                        <li style="margin-top:10px;"><a href="#" style="  text-decoration:none;"> TÉRMINOS Y
                                CONDICIONES DE USO </a></li>
                        <li style="margin-top:10px;"><a href="#" style="  text-decoration:none;"> TÉRMINOS Y
                                CONDICIONES DE VENTA </a></li>

                        <li style="margin-top:10px;"><a href="#" style="  text-decoration:none;">POLÍTICA DE
                                DEVOLUCIONES
                            </a></li>
                        <li style="margin-top:10px;"><a href="#" style="  text-decoration:none;">POLÍTICA DE
                                PRIVACIDAD
                            </a></li>

                    </ul>
                </div>


            </div>
        </div>




    </footer>
    {{-- Footer --}}

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

    <script>
        $("#query").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>
</body>
@jquery
@toastr_js
@toastr_render

</html>
