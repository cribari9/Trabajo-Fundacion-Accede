@extends('layouts.app')

@section('scripts')
@endsection

@section('content')

      
      
      <!-- Section Content -->
      <section id="proyectos" class="g-py-100 g-pb-40">
        
        <div class="container g-max-width-780 text-center g-mb-60">
          <div class="text-center u-heading-v8-1 g-mb-35">
            <h2 class="h3 text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-26 mb-0">Nuestros
              <strong class="g-bg-teal g-color-white">proyectos</strong></h2>
          </div>

      
        </div>

<br>
        <div class="container">
        
          <div class="masonry-grid row">
            
              @foreach( $proyectos as $proyecto ) 
             <div class="masonry-grid-item col-md-6 col-lg-4 g-mb-30">
              
              <!-- Article -->
              <article class="border border-teal g-bg-white g-color-gray-light-v1" style="height: 520px;" >
                <!-- Article Image -->
                <img class="w-100" src="{{URL::to('assets/img/proyectos')}}/{{$proyecto->imagen}}" style="height: 250px;" alt="Image Description">
                <!-- End Article Image -->

                <!-- Article Content -->
                <div class="g-pa-20">
                  <h4 class="g-font-weight-700 g-font-size-10 g-color-primary g-mb-5">{{$proyecto->fecha->format('Y')}}</h4>
                  <h4 class="text-uppercase g-font-weight-700 h6 g-color-gray-dark-v1 g-mb-15">
                  <a class="u-link-v5 g-color-black g-color-primary--hover g-cursor-pointer" href="{{url('/proyectos/'.$proyecto->id_proyecto)}}">{{$proyecto->nombre}}</a></h4>
                  <p class="g-mb-25" align="justify">{{ \Illuminate\Support\Str::limit($proyecto->descripcion, 140, $end='...') }}</p>

                  <footer>
                    <div class="d-md-table">
                      

                      <div class="d-block d-md-table-cell text-right g-valign-middle" style="position: absolute;bottom: 30px;">
                        <a class="btn btn-block u-btn-primary text-uppercase g-font-weight-700 g-font-size-11 g-color-white g-brd-none rounded-0 g-py-12 g-py-23--md g-px-15 g-px-25--md" href="{{url('/proyectos/'.$proyecto->id_proyecto)}}">Más información</a>
                      </div>
                    </div>
                  </footer>
                </div>
                <!-- End Article Content -->
              </article>
              
              <!-- End Article -->
              <!--Salto de línea-->
              </br>
              
            </div>

            @endforeach


            


          </div>
          
        </div>
        {{ $proyectos->links() }}
      </section>
      <!-- End Section Content -->


@endsection
