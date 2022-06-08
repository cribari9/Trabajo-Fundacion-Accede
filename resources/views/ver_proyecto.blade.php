@extends('layouts.app')

@section('scripts')
@endsection

@section('content')

      <!-- Section Content -->
      <section id="proyectos" class="g-bg-gray-light-v5 g-py-100">
        <!-- Our Environment -->
    
      <div class="container">
        <div class="row">
          <!-- Carousel -->
          <div class="col-lg-6 g-mb-50 g-mb-0--lg">
            <div id="carouselCus1" class="js-carousel text-center g-mb-20" data-infinite="true" data-lazy-load="progressive" data-arrows-classes="u-arrow-v1 g-absolute-centered--y g-width-50 g-height-50 g-font-size-20 g-bg-white g-color-gray-dark-v5 g-color-primary--hover g-mt-minus-10"
            data-arrow-left-classes="fa fa-angle-left g-left-0 rounded-right" data-arrow-right-classes="fa fa-angle-right g-right-0 rounded-left" data-nav-for="#carouselCus2">
            @if($proyecto->imagen!==NULL)  
              <div class="js-slide">
                <a class="js-fancybox d-block g-pos-rel" data-rel="lightbox-gallery--08-1"  title="Lightbox Gallery" data-open-effect="bounceInDown" data-close-effect="bounceOutDown" data-open-speed="1000" data-close-speed="1000"
                data-blur-bg="true">
                  <img class="img-fluid w-100 rounded" data-lazy="{{URL::to('assets/img/proyectos')}}/{{$proyecto->imagen}}" alt="Image description">
                </a>
              </div>
              @endif

              @foreach($imagenes as $imagen)
              <div class="js-slide">
                <a class="js-fancybox d-block g-pos-rel" data-rel="lightbox-gallery--08-1" href="../../assets/img-temp/600x450/img3.jpg" title="Lightbox Gallery" data-open-effect="bounceInDown" data-close-effect="bounceOutDown" data-open-speed="1000" data-close-speed="1000"
                data-blur-bg="true">
                  <img class="img-fluid w-100 rounded" data-lazy="{{URL::to('images/galeria_proyectos')}}/{{$imagen->nombre}}" alt="Image description">
                </a>
              </div>
              @endforeach
              
            </div>
           
            <div id="carouselCus2" class="js-carousel text-center u-carousel-v3 g-mx-minus-10" data-infinite="true" data-center-mode="true" data-lazy-load="progressive" data-slides-show="4" data-is-thumbs="true" data-nav-for="#carouselCus1">
              @if($proyecto->imagen!==NULL) 
              <div class="js-slide g-px-10">
                <img class="img-fluid g-cursor-pointer rounded" data-lazy="{{URL::to('assets/img/proyectos')}}/{{$proyecto->imagen}}" alt="Image description">
              </div>
            @endif
            @foreach($imagenes as $imagen)
              <div class="js-slide g-px-10">
                <img class="img-fluid g-cursor-pointer rounded" data-lazy="{{URL::to('images/galeria_proyectos')}}/{{$imagen->nombre}}" alt="Image description">
              </div>
            @endforeach
             
            </div>
            <br>

            @if(($proyecto->video!==null) and ($proyecto->video!=='0'))       
                <!-- Youtube Example -->
                <div class="embed-responsive embed-responsive-16by9 g-mb-30">
                  <iframe width="100%" src="//www.youtube.com/embed/{{$proyecto->video}}" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <!-- End Youtube Example -->  
            @endif  

            
          </div>
          <!-- End Carousel -->

          <!-- Section Content -->
          <div class="col-lg-6 g-mb-50 g-mb-0--lg">
            <header class="g-mb-30">
              <div class="u-heading-v2-3--bottom g-brd-primary g-mb-30">
                <h2 class="h4 u-heading-v2__title g-color-gray-dark-v2 g-font-weight-600 text-uppercase">{{$proyecto->nombre}}</h2>
              </div>
              <p class="g-font-size-16">
                <strong>Lugar: </strong> {{$proyecto->lugar}}</p>
                <p class="g-font-size-16">
                <strong>Fecha: </strong>{{$nombreMes}} de {{$proyecto->fecha->format('Y')}}</p>
            </header>

            <div class="g-mb-30">
              <p style="white-space: pre-line;"><strong>Descripción: </strong>{{$proyecto->descripcion}}</p>
            </div>
          </div>
          <!-- End Section Content -->
        </div>
        
      </div>
    
    

      </section>
      <!-- End Section Content -->

@endsection
