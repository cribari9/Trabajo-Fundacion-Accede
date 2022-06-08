@extends('layouts.app')

@section('scripts')
@endsection

@section('content')

 <!-- Section Content -->
      <section id="opiniones" class="g-py-100 g-pb-40">
 
          <div class="text-center u-heading-v8-1 g-mb-35">
            <h2 class="h3 text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-26 mb-0"> 
              <strong class="g-bg-teal g-color-white">Opiniones</strong>
          </div>
      
    

<!-- Blog Classic Blocks -->
    <div class="container g-py-20">
      <div class="masonry-grid row g-mb-70">
        @foreach( $opiniones as $opinion) 
        <div class="masonry-grid-item col-sm-6 col-lg-4 g-mb-30">
          <!-- Blog Classic Blocks -->
          <article class="u-shadow-v11" >
            @if(($opinion->video!==null) and ($opinion->video!=='0'))
            <div class="embed-responsive embed-responsive-16by9">
              <iframe width="100%" src="//www.youtube.com/embed/{{$opinion->video}}" frameborder="0" allowfullscreen></iframe>
            </div>
            @else
              <img class="img-fluid w-100" src="{{URL::to('assets/img/opiniones')}}/{{$opinion->imagen}}" alt="Image Description" style="height: 250px;">
            @endif
              <div class="g-bg-white g-pa-30" >
                <h2 class="h5 g-color-black g-font-weight-600 mb-3">
                    <a class="u-link-v5 g-color-black g-color-primary--hover g-cursor-pointer" href="{{url('/opiniones/'.$opinion->id_opinion.'')}}">{{$opinion->titulo}}</a>
                  </h2>
                <p class="g-color-gray-dark-v4 g-line-height-1_8" align="justify" style="height: 130px;">{{\Illuminate\Support\Str::limit($opinion->descripcion, 150, $end='...')}}</p>
                <a class="g-font-size-13" href="{{url('/opiniones/'.$opinion->id_opinion.'')}}">Leer más</a>
                <hr class="g-my-20">
                <span class="d-block g-color-gray-dark-v4 g-font-weight-600 g-font-size-12 text-uppercase mb-2">por {{$opinion->autor}}<br>
                {{$opinion->fecha->format('d-m-Y')}} 
                </span>

            </div>
          </article>
          <!-- End Blog Classic Blocks -->
        </div>
        @endforeach
          </div>
        </div>
{{ $opiniones->links() }}
</section>
@endsection
