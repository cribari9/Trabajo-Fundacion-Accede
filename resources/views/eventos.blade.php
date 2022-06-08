@extends('layouts.app')

@section('scripts')
@endsection

@section('content')
<!-- Section Content -->
      <section id="eventos" class="g-py-100 g-pb-40">
 	<div class="container g-max-width-780 text-center g-mb-60">
          <div class="text-center u-heading-v8-1 g-mb-35">
            <h2 class="h3 text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-26 mb-0">Nuestros
              <strong class="g-bg-teal g-color-white">eventos</strong></h2>
          </div>

       
        </div>
    
              

              <!-- Section Content -->
 
   <br>
        <div class="container">

          <div class="masonry-grid row">
            @foreach( $eventos as $evento ) 
            <div class="masonry-grid-item col-md-6 col-lg-4 g-mb-30">
              <article class="border border-teal g-bg-white" style="height: 650px;">
                <img class="w-100" src="{{URL::to('assets/img/eventos')}}/{{$evento->imagen}}" style="height: 250px;" alt="Image description">

                <div class="u-shadow-v1 g-pa-30" >
                  <header class="g-mb-20">
                    <h4 class="g-font-weight-700 g-font-size-10 g-color-primary g-mb-5">{{$evento->fecha_inicio->format('d-m-Y')}} | Inicio:{{Str::limit($evento->hora_inicio, 5, '')}} | Final: {{Str::limit($evento->hora_termino, 5, '')}}</h4>
                    <h3 class="text-uppercase g-font-weight-700 g-font-size-14 mb-0">
                      <a class="g-theme-color-blue-dark-v2 g-color-primary--hover" href="{{url('/eventos/'.$evento->id_evento.'')}}">{{$evento->nombre}}</a>
                    </h3>
                  </header>

                  <p class="g-mb-30" align="justify">{{ \Illuminate\Support\Str::limit($evento->descripcion, 120, $end='...') }} 

            @if($evento->lugar!=='Virtual')
            <br><strong>Lugar:</strong> {{$evento->lugar}}<br>
            @else
              <br><strong>Evento virtual</strong><br>
            @endif

                  </p>
              
                </div>
              <div class="d-md-table">
                      

                      <div class="d-block d-md-table-cell text-right g-valign-middle" style="position: absolute;bottom: 10px;">
                        <a class="btn btn-block u-btn-primary text-uppercase g-font-weight-700 g-font-size-11 g-color-white g-brd-none rounded-0 g-py-12 g-py-23--md g-px-15 g-px-25--md" href="{{url('/eventos/'.$evento->id_evento.'')}}">Más información</a>
                      </div>
                    </div>
              </article>
            </div>
            @endforeach
          </div>
        </div>
 {{ $eventos->links() }}
</section>
@endsection

