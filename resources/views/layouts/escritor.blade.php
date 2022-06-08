<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fundacion Accede</title>


        <!-- Styles -->
        <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{URL::to('../assets/img')}}/accede_fundacion.png">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700,800">

    <!-- CSS Global Compulsory -->
    
 
     <link rel="stylesheet" href="{{URL::to('../assets')}}/vendor/bootstrap/bootstrap.min.css">


    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="../../assets/vendor/icon-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendor/icon-line-pro/style.css">
    <link rel="stylesheet" href="../../assets/vendor/icon-line/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../assets/vendor/icon-hs/style.css">
    <link rel="stylesheet" href="../../assets/vendor/hamburgers/hamburgers.min.css">
    <link rel="stylesheet" href="../../assets/vendor/animate.css">
    <link rel="stylesheet" href="../../assets/vendor/slick-carousel/slick/slick.css">
    <link  rel="stylesheet" href="../../../assets/vendor/jquery-ui/themes/base/jquery-ui.min.css">
    <!-- CSS Template -->
    <link rel="stylesheet" href="{{URL::to('../assets/css')}}/styles.op-charity.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="../../assets/css/custom.css">
        
 
    @yield('scripts')

</head>

  <!-- Header v1 -->
      <header id="js-header" class="u-header u-header--sticky-top u-header--change-appearance"
              data-header-fix-moment="100" >
        <div class=" u-header__section g-transition-0_3 g-py-15"
             data-header-fix-moment-exclude="dark-theme g-py-15"
             data-header-fix-moment-classes="dark-theme u-shadow-v27 g-bg-gray g-py-12">
          <nav class="navbar navbar-expand-lg navbar-light g-py-0"  style="background-color:#AAC1CF;margin-top: -15px;margin-bottom: -15px;height: 90px;">
            <div class="container g-pos-rel">
              <!-- Logo -->
              <a href="{{ route('welcome') }}" class="js-go-to navbar-brand u-header__logo"
                 data-type="static" >
                <img class="u-header__logo-img u-header__logo-img--main d-block g-width-140" src="{{URL::to('assets/img')}}/accede_fundacion.png" alt="Image Description"
                     data-header-fix-moment-exclude="d-block"
                     data-header-fix-moment-classes="d-none">

                <img class="u-header__logo-img u-header__logo-img--main d-none g-width-140" src="{{URL::to('assets/img')}}/accede_fundacion.png" alt="Image Description"
                     data-header-fix-moment-exclude="d-none"
                     data-header-fix-moment-classes="d-block">
              </a>
              <!-- End Logo --><div class="flex-center position-ref full-height">
            

            

              <!-- Navigation -->
              <div class="collapse navbar-collapse align-items-center flex-sm-row" id="navBar" data-mobile-scroll-hide="true">
                <ul id="js-scroll-nav" class="navbar-nav text-uppercase g-font-weight-700 g-font-size-12 g-pt-20 g-pt-7--lg ml-auto">
            <!--        <li class="nav-item g-mr-10--lg g-mb-7 g-mb-0--lg active">
                    <a href="{{ route('welcome') }}" class="nav-link p-0">Inicio <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item g-mx-10--lg g-mb-7 g-mb-0--lg">
                    <a href="{{ route('proyectos') }}" class="nav-link p-0">Proyectos</a>
                  </li>
                  <li class="nav-item g-mx-10--lg g-mb-7 g-mb-0--lg">
                    <a href="{{ route('eventos') }}" class="nav-link p-0">Eventos</a>
                  </li>
         -->      <li class="nav-item g-mx-10--lg g-mb-7 g-mb-0--lg">
                    <a href="{{ route('opiniones') }}" class="nav-link p-0">Opiniones</a>
                  </li>
  <!--                 <li class="nav-item g-mx-10--lg g-mb-7 g-mb-0--lg">
                    <a href="{{ route('voluntarios') }}" class="nav-link p-0">Voluntarios</a>
                  </li>
                  <li class="nav-item g-mx-10--lg g-mb-7 g-mb-0--lg">
                    <a href="{{ route('nosotros') }}" class="nav-link p-0">Nosotros</a>
                  </li>
                  <li class="nav-item g-mx-10--lg g-mb-7 g-mb-0--lg">
                    <a href="{{ route('usuarios') }}" class="nav-link p-0">Usuarios</a>
                  </li>
                 <li class="nav-item g-mx-10--lg g-mb-7 g-mb-0--lg">
                    <a href="{{ route('contacto') }}" class="nav-link p-0">Contáctanos</a>
                  </li>
        @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
-->
            <!-- Authentication Links -->
              @guest
                 
                      <a id="ingresar" class="nav-brand" style="margin-right:0px;color: #229fab;text-decoration: none;" href="{{ route('login') }}">{{ __('Ingresar a FAccede') }}</a>
                  
                  
              @else
                  <li class="nav-item dropdown nav-item g-mx-10--lg g-mb-7 g-mb-0--lg" >
                      <a id="navbarDropdown"  class="nav-link p-0 nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>
                      <a class="nav-item g-mx-10--lg g-mb-7 g-mb-0--lg dropdown-item"  href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Salir') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                     
                  </li>
              @endguest

                </ul>
                
              </div>
              <!-- End Navigation -->

              <!-- Responsive Toggle Button -->
              <button class="navbar-toggler btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-15 g-right-0" type="button"
                      aria-label="Toggle navigation"
                      aria-expanded="false"
                      aria-controls="navBar"
                      data-toggle="collapse"
                      data-target="#navBar">
                <span class="hamburger hamburger--slider">
                  <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                  </span>
                </span>
              </button>
              <!-- End Responsive Toggle Button -->
            </div>
          </nav>
        </div>
         
    
            
    
    
 
      </header>
      <!-- End Header v1 -->
<body>
    <div id="app">
        
        <main class="py-4">

            <section class="contenido wrapper">
              @yield('content')
            </section>
        </main>
    </div>
</body>


        <!-- Footer -->
      <footer class="g-color-gray-dark-v5 g-bg-gray-dark-v1" style="height: 180px;">
        </br>
        <div class="g-pb-30">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-lg-3 g-mb-25 g-mb-0--lg">
                <p class="g-mb-20">
                  <img class="img-fluid g-width-170" style="max-width:90px;padding-top: -20px;margin-bottom: -30px;" src="{{URL::to('../assets/img')}}/accede_fundación_transparente_blanco2.png" alt="Image description">
                </p>
               
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3 order-md-3 g-mb-30">
                <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#">
                  <i class="align-middle mr-2 icon-real-estate-020 u-line-icon-pro"></i>
                  Valparaíso, Chile
                </a>
              </div>
              <div class=" g-mb-20">
                
                  <a class="col-sm-6 col-md-4 col-lg-3 order-md-3 g-mb-30">
                    <i class="align-middle icon-communication-033"></i>+569 93980258
                  </a>
               
              </div>
              <div class="g-mb-20">
                
                  <a class="col-sm-6 col-md-4 col-lg-3 order-md-3 g-mb-30">
                    <i class="align-middle icon-communication-005"></i>contacto@fundacionaccede.cl
                  </a>
               
              </div>

            </div>
          <div class="container">
            <div class="row">
              <div class="col-md-7" style="margin-top: -10px">
                <ul class="list-inline float-md-right mb-0">
                  <li class="list-inline-item g-mr-10">
                    <a class="u-icon-v3 u-icon-v4-rounded-50x g-width-35 g-height-35 g-font-size-16 g-color-white g-color-gray-dark-v2--hover g-bg-gray-dark-v2 g-bg-primary--hover g-transition-0_2 g-transition--ease-in" href="https://twitter.com/AccedeFundacion"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li class="list-inline-item g-mr-10">
                    <a class="u-icon-v3 u-icon-v4-rounded-50x g-width-35 g-height-35 g-font-size-16 g-color-white g-color-gray-dark-v2--hover g-bg-gray-dark-v2 g-bg-primary--hover g-transition-0_2 g-transition--ease-in" href="https://www.facebook.com/FundacionAccede.Chile"><i class="fa fa-facebook"></i></a>
                  </li>

                  <li class="list-inline-item g-mr-10">
                    <a class="u-icon-v3 u-icon-v4-rounded-50x g-width-35 g-height-35 g-font-size-16 g-color-white g-color-gray-dark-v2--hover g-bg-gray-dark-v2 g-bg-primary--hover g-transition-0_2 g-transition--ease-in" href="https://www.instagram.com/fundacion_accede/"><i class="fa fa-instagram"></i></a>
                  </li>
                  <li class="list-inline-item">
                    <a class="u-icon-v3 u-icon-v4-rounded-50x g-width-35 g-height-35 g-font-size-16 g-color-white g-color-gray-dark-v2--hover g-bg-gray-dark-v2 g-bg-primary--hover g-transition-0_2 g-transition--ease-in" href="#"><i class="fa fa-linkedin"></i></a>
                  </li>
              
                </ul>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-6 align-items-center g-mb-15 g-mb-0--md" style="margin-top: 10px;">
                <p class="w-100 mb-0">&copy; 2020 Todos los derechos reservados. Desarrollado por
                  <a class="g-font-weight-700 g-color-primary g-color-primary--hover" href="#">Fundación Accede</a></p>
              </div>

              
            </div>
          </div>
        </div>  
      </footer>
      <!-- End Footer -->


      <a class="js-go-to u-go-to-v1 g-color-gray-dark-v1" href="#"
         data-type="fixed"
         data-position='{
           "bottom": 15,
           "right": 15
         }'
         data-offset-top="400"
         data-compensation="#js-header"
         data-show-effect="zoomIn">
        <i class="hs-icon hs-icon-arrow-top"></i>
      </a>
  

    <!-- JS Global Compulsory -->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
    <script src="../../assets/vendor/popper.js/popper.min.js"></script>
    <script src="../../assets/vendor/bootstrap/bootstrap.min.js"></script>


    <!-- JS Implementing Plugins -->
    <script src="../../assets/vendor/appear.js"></script>
    <script src="../../assets/vendor/circles/circles.min.js"></script>
    <script src="../../assets/vendor/slick-carousel/slick/slick.js"></script>
    <script src="../../assets/vendor/jquery.easypin.custom/dist/jquery.easypin.js"></script>

    <!-- JS Unify -->
    <script src="../../assets/js/hs.core.js"></script>
    <script src="../../assets/js/components/hs.header.js"></script>
    <script src="../../assets/js/helpers/hs.hamburgers.js"></script>
    <script src="../../assets/js/components/hs.scroll-nav.js"></script>
    <script src="../../assets/js/components/hs.progress-bar.js"></script>
    <script src="../../assets/js/components/hs.chart-pie.js"></script>
    <script src="../../assets/js/components/hs.carousel.js"></script>
    <script src="../../assets/js/components/hs.map.pin.js"></script>
    <script src="../../assets/js/components/hs.go-to.js"></script>

    <!-- JS Customization -->
    <script src="../../assets/js/custom.js"></script>

 <!-- jQuery UI Helpers -->
              <script  src="../../../assets/vendor/jquery-ui/ui/widgets/menu.js"></script>
              <script  src="../../../assets/vendor/jquery-ui/ui/widgets/mouse.js"></script>

              <!-- jQuery UI Widgets -->
              <script  src="../../../assets/vendor/jquery-ui/ui/widgets/datepicker.js"></script>

              <!-- JS Unify -->
              <script  src="../../../assets/js/components/hs.datepicker.js"></script>



    <!-- JS Plugins Init. -->
    <script>
      $(document).on('ready', function () {
        // initialization of carousel
        $.HSCore.components.HSCarousel.init('.js-carousel');


        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of go to section
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of progressbar
        var horizontalProgressBars = $.HSCore.components.HSProgressBar.init('.js-hr-progress-bar', {
          direction: 'horizontal',
          indicatorSelector: '.js-hr-progress-bar-indicator'
        });

        // initialization of chart pie
        var items = $.HSCore.components.HSChartPie.init('.js-pie');

        // initialization of pin map
        var markers1 = {
          0: {
            "image_url": "assets/img-temp/800x450/img1.jpg",
            "date": "17:48, April 27, 2015",
            "location": "South Africa",
            "title": "Proin egestas purus eget1",
            "coords": {
              "lat": "149",
              "long": "168"
            }
          },
          1: {
            "image_url": "assets/img-temp/800x450/img2.jpg",
            "date": "17:48, April 27, 2015",
            "location": "South Africa",
            "title": "Proin egestas purus eget2",
            "coords": {
              "lat": "179",
              "long": "205"
            }
          },
          2: {
            "image_url": "assets/img-temp/800x450/img3.jpg",
            "date": "17:48, April 27, 2015",
            "location": "South Africa",
            "title": "Proin egestas purus eget3",
            "coords": {
              "lat": "241",
              "long": "373"
            }
          },
          3: {
            "image_url": "assets/img-temp/800x450/img4.jpg",
            "date": "17:48, April 27, 2015",
            "location": "South Africa",
            "title": "Proin egestas purus eget4",
            "coords": {
              "lat": "543",
              "long": "244"
            }
          },
          4: {
            "image_url": "assets/img-temp/800x450/img5.jpg",
            "date": "17:48, April 27, 2015",
            "location": "South Africa",
            "title": "Proin egestas purus eget5",
            "coords": {
              "lat": "601",
              "long": "268"
            }
          },
          5: {
            "image_url": "assets/img-temp/800x450/img6.jpg",
            "date": "17:48, April 27, 2015",
            "location": "South Africa",
            "title": "Proin egestas purus eget6",
            "coords": {
              "lat": "636",
              "long": "260"
            }
          },
          6: {
            "image_url": "assets/img-temp/800x450/img7.jpg",
            "date": "117:48, April 27, 2015",
            "location": "South Africa",
            "title": "Proin egestas purus eget7",
            "coords": {
              "lat": "614",
              "long": "118"
            }
          },
          7: {
            "image_url": "assets/img-temp/800x450/img1.jpg",
            "date": "17:48, April 27, 2015",
            "location": "South Africa",
            "title": "Proin egestas purus eget8",
            "coords": {
              "lat": "701",
              "long": "70.125"
            }
          },
          8: {
            "image_url": "assets/img-temp/800x450/img2.jpg",
            "date": "17:48, April 27, 2015",
            "location": "South Africa",
            "title": "Proin egestas purus eget9",
            "coords": {
              "lat": "950",
              "long": "177"
            }
          },
          9: {
            "image_url": "assets/img-temp/800x450/img3.jpg",
            "date": "17:48, April 27, 2015",
            "location": "South Africa",
            "title": "Proin egestas purus eget10",
            "coords": {
              "lat": "1079",
              "long": "463"
            }
          },
          10: {
            "image_url": "assets/img-temp/800x450/img4.jpg",
            "date": "17:48, April 27, 2015",
            "location": "South Africa",
            "title": "Proin egestas purus eget 11",
            "coords": {
              "lat": "717",
              "long": "455"
            }
          },
          11: {
            "image_url": "assets/img-temp/800x450/img5.jpg",
            "date": "17:48, April 27, 2015",
            "location": "South Africa",
            "title": "Proin egestas purus eget 12",
            "coords": {
              "lat": "625",
              "long": "510"
            }
          },
          canvas: {
            src: 'assets/img/maps/map.svg',
            width: 1170,
            height: 594
          }
        };

        $.HSCore.components.HSPinMap.init('.js-pin-map', {
          data: {
            "map-pin": markers1
          }
        });
      });

      $(window).on('load', function() {
        // initialization of HSScrollNav
        $.HSCore.components.HSScrollNav.init($('#js-scroll-nav'), {
          duration: 700
        });
      });
    </script>
    
    <script type="text/javascript">
      $(document).on('click', 'ul li', function(){
        $(this).addClass('active').siblings().removeClass('active')
      })

    </script>

</html>
