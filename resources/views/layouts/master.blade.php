<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link href="{{ url('assetsLanding/img/h_logo.ico') }}" rel="icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" type="image/png" href="{{ url('assetsLanding/img/hub_minilogo.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ url('assetsLanding/img/hub_minilogo.png') }}" sizes="16x16">
    <link href="{{ asset('cssLanding/app.css') }}" rel="stylesheet">
    <link href="{{ asset('cssLanding/app.css') }}?v=1.1" rel="stylesheet">

    {{-- <link href="{{ asset('cssLanding/app.css') }}?v={{env('ASSET_VERSION', '1.1')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">

    <!-- Scripts -->
    <script type="text/javascript" src="jsLanding/JQuery3.3.1.js"></script>
    <link rel="stylesheet" href="cssLanding/style.css?v=1.3" />
    <link rel="stylesheet" type="text/css" href="cssLanding/lightslider.css" />

    <!--Jquery-->
    <script type="text/javascript" src="jsLanding/lightslider.js"></script>
    <!-- Hotjar Tracking Code for https://hub.inagata.com -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 2802302,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>
</head>

<body>
    <main>
        <!--navbar dropdown-->
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><img src="{{ url('assetsLanding/img/logohub.png') }}"
                        style="margin-left:35px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="font-size: 16px" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <b>About Us</b>
                            </a>
                            <div class="dropdown-menu dropdown-large" style="border: none; border-radius: 10px;">
                                <div class="row g-5">
                                    <div class="col-lg-6 col-md-6">
                                        {{-- <h6 class="title">Title first</h6> --}}
                                        <ul class="list-unstyled">
                                            <li><a class="dropdown-item" href="overview"><img
                                                        src="{{ url('assetsLanding/img/overview.png') }}" alt=""
                                                        class="navbar-item1"><b>Overview</b></a><span>
                                                    <p class="navbar-p"> Sekilas Inagata Hub</p>
                                                </span></li>
                                            {{-- <li><a class="dropdown-item" href="galery"><span><img
                                                            src="{{ url('assetsLanding/img/ic_galery.png') }}"
                                                            alt="" class="navbar-item2"></span><b
                                                        style="margin-left: 10px;">Activities & Galery</b></a><span>
                                                    <p class="navbar-p"> Rekam Kegiatan Di Inagata Hub</p>
                                                </span></li> --}}
                                        </ul>
                                    </div><!-- end col-3 -->
                                    {{-- <div class="col-lg-6 col-md-6">
                                        <h6 class="title">Title second</h6>
                                        <ul class="list-unstyled">
                                            <li><a class="dropdown-item" href="#HUBMember"><span><img
                                                            src="{{ url('assetsLanding/img/mentor.png') }}"
                                                            alt="" class="navbar-item2"></span><b
                                                        style="margin-left: 10px;">HUB Member</b></a><span>
                                                    <p class="navbar-p"> Member Hub Dari Masa kemasa</p>
                                                </span></li>
                                        </ul>
                                    </div> --}}
                                    <!-- end col-3 -->
                                </div><!-- end row -->
                            </div> <!-- dropdown-large.// -->
                        </li>
                    </ul>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="/register-pendaftar" class="btn btn-danger button-d"><b>Daftar</b></a>
                            <a href="{{ route('login') }}" class="btn btn-danger button-d"><b>Login</b></a>
                        </div>
                    </div>
                </div> <!-- navbar-collapse.// -->
            </div> <!-- container-fluid.// -->
        </nav>

        @yield('content')
        <!-- Footer -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-md-12 col-sm-12" style="background-color: #32393A;">
                </div>
                <div class="col-lg-2 pt-3 col-md-6 col-sm-8 item_footer" style="background-color: #32393A;">
                    <a style="color: #e5e5e5;">
                        <a style="color: #e5e5e5;" class="item_footer" href="#"> SITE MAP</a>
                        <br>
                        <a class="item_footer" href="#">About</a>
                        <br>
                        <a class="item_footer" href="overview">Overview</a>
                        <br>
                        <a class="item_footer" href="galery">Galery & Activities</a>
                        <br>
                        <a class="item_footer" href="#">Mentor</a>
                    </a>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-8 pt-3 item_footer" style="background-color: #32393A;">
                    <br>
                    <a class="item_footer" href="#"> Features</a>
                    <br>
                    <a class="item_footer" href="handbook"> Career Handbook</a>
                    <br>
                    <a class="item_footer" href="showcase"> Showcase</a>
                    <br>
                    <a class="item_footer" href="#"> Class Learning</a>
                    <br>
                    <a class="item_footer" href="#"> Maicon</a>
                    <br>
                    <a class="item_footer" href="#"> Mavectory</a>
                    <br>
                </div>
                <div class="col-lg-1" style="background-color: #32393A;">
                </div>
                <div class="col-lg-2 col-md-6 col-sm-8 pt-3" style="background-color: #32393A;">
                    <a style="color: #e5e5e5;" href="#"> ECOSYSTEM</a>
                    <br>
                    <p style="color: #e5e5e5; font-weight: bold;font-size: 16px" href="#"> PT Cipta Media
                        Edutama</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8 pt-3" style="background-color: #32393A;">
                    <p style="color: #e5e5e5;"> CONTACT</p>
                    <p class="contact"> PT Ina Gata Persada</p>
                    <p class="contact"> Jl. Papa Biru 3 No.5b, Tulusrejo, Kec. Lowokwaru, Kota Malang, Jawa Timur</p>
                    <p class="contact"> Indonesia | Postal Code - 65141</p>
                    <p class="contact"> Get Direction Here</p>
                    <p class="contact"> +62819 1300 6938</p>
                    <p class="contact"> hub@inagata.com</p>
                    <br>
                </div>
                <div class="col-lg-1 col-md-12 col-sm-12 pt-3" style="background-color: #32393A;">
                </div>
            </div>
            <div class="row" style="background-color: #32393A; height: 150px">
                <hr style="border: 1px solid #121212; width: 1500px;opacity: 0.5;">
                <div class="col-lg-6">
                    <p class="copy">2021 Inagatahub. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6">
                    <p style="color: #e5e5e5; font-weight: bold; word-spacing: 90px; font-size: 16px; opacity: 0.7;">
                        <a style="color: #e5e5e5;" href="https://instagram.com/hubacademy_inagata" target="_blank"
                            rel="nofollow">INSTAGRAM</a>
                        <a style="color: #e5e5e5;" href="#">DRIBBLE</a>
                        <a style="color: #e5e5e5;" href="#">BEHANCE</a>
                    </p>
                </div>
            </div>
        </div>
    </main>

    <script>
        //carousel
        jQuery(document).ready(function($) {
            $('#autoWidth').lightSlider({
                autoWidth: true,
                // loop:true,
                // onSliderLoad: function() {
                // 	$('#autoWidth').removeClass('cS-hidden');
                // }
                auto: true,
                loop: true,
                pauseOnHover: true,
                onBeforeSlide: function(el) {
                    $('#current').text(el.getCurrentSlideCount());
                }
            });
        });

        //panah-qna
        var acc_header = document.getElementsByClassName("accordion-header");
        var i;

        for (i = 0; i < acc_header.length; i++) {
            acc_header[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                //  if (panel.style.maxHeight) {
                //    panel.style.maxHeight = null;
                //  } else {
                //    panel.style.maxHeight = panel.scrollHeight + "px";
                //  }
            });
        }

        //panah-kuota
        var acc_hk = document.getElementsByClassName("accordion-header-kuota");
        var i;

        for (i = 0; i < acc_hk.length; i++) {
            acc_hk[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                //  if (panel.style.maxHeight) {
                //    panel.style.maxHeight = null;
                //  } else {
                //    panel.style.maxHeight = panel.scrollHeight + "px";
                //  }
            });
        }

        //mega-menu
        document.addEventListener("DOMContentLoaded", function() {
            /////// Prevent closing from click inside dropdown
            document.querySelectorAll('.dropdown-menu').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            })
        });

        // handbook-icon
        var handbook_js = document.querySelector('.handbook-content');
        if (handbook_js) {
            document.querySelector('.' + handbook_js.dataset.handbook).classList.add('active')
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>
