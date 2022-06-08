@extends('layouts.app')

@section('content')

    <!-- Blog Single Item Banner -->
    <section class="g-bg-cover g-bg-size-cover g-bg-white-gradient-opacity-v1--after" data-bg-img-src="{{URL::to('assets/img/opiniones')}}/{{$opinion->portada}}" >
      <div class="container text-center g-pos-rel g-z-index-1 g-pb-50">
        <div class="row d-flex justify-content-center align-content-end flex-wrap g-min-height-500">
          <div class="col-lg-7 mt-auto">
            <div class="mb-5">
              <h1 class="g-color-white g-font-weight-600 g-mb-30">{{$opinion->titulo}}</h1>
            </div>
            <p align="center" class="g-color-white lead g-mb-40"><strong class="g-color-white g-font-weight-700er">Escrito por </strong>{{$opinion->autor}}<br>{{$opinion->fecha->format('d')}} de {{$nombreMes}} del {{$opinion->fecha->format('Y')}}<br>{{$hora}} horas</p>
    
          </div>
        </div>
      </div>
    </section>
    <!-- End Blog Single Item Banner -->

<!-- Blog Single Item Info -->
    <section class="g-py-100 g-pb-40">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <div class="g-mb-60">
            
            <p class="g-color-black" align="justify">{{$opinion->descripcion}}</p>
          
         
            
              <p class="g-color-black" align="justify" style="white-space: pre-line;">
                
                <img class="col-lg-6 img-fluid w-100 u-shadow-v21 rounded" src="{{URL::to('assets/img/opiniones')}}/{{$opinion->imagen}}" alt="Image Description" align="right"  HSPACE=”50” VSPACE=”50”>
      
              {{$opinion->contenido}}

              </p>              
          </div>
        <br>
        <div class="d-flex">
             

                 <!-- Blog Single Item Video -->
        @if($opinion->video!==NULL)
        @if ($opinion->video!=='0')        
    <section class="container-fluid">
       <div class="d-flex">  
                <!-- Youtube Example -->
                <div class="embed-responsive embed-responsive-16by9 g-mb-30">
                  <iframe width="100%" src="//www.youtube.com/embed/{{$opinion->video}}" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <!-- End Youtube Example -->  
              </div>

    </section>
    <!-- End Blog Single Item Video -->
        @endif 
        @endif 

           
           

          
          </div>
      <!-- Compartir en Facebook y Me Gusta -->
      <div>
      <iframe src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffundacionaccede.test%2Fopiniones%2F{{$opinion->id_opinion}}&width=450&layout=standard&action=like&size=large&share=true&height=35&appId" width="450" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
    </div>
    <!-- Compartir en Twitter -->
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-via="fundacionaccede" data-hashtags="fundacionaccedechile" data-lang="es" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <!-- Comentarios de facebook -->
<div class="fb-comments" data-href="http://fundacionaccede.test/opiniones/{{$opinion->id_opinion}}" data-width="100%" data-numposts="5"></div>

      </div>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v10.0" nonce="dlTnq0ky">
  
</script>

      </div>



    </section>
    <!-- End About Us -->

@endsection