@extends('layouts.app')

@section('scripts')
@endsection

@section('content')

    <section id="nosotros" class="g-py-100 g-pb-40">
	    
		    <div align="center" >
		    	<img src="images/portada_nosotros.png" alt="logo" style="width: 100%;margin-top: -55px;">
		  	</div>
		  	</br>
		 	<div class="container g-max-width-780 text-center g-mb-60">
		         <div class="text-center u-heading-v8-1 g-mb-35">
		         	<h2 class="h3 text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-26 mb-0">Nuestro 
		            	<strong class="g-bg-teal g-color-white">equipo</strong>
		            </h2>
		          </div>
		    </div>
		
		</br>
		
          <!-- Team Block -->
          <div class="row">
            @foreach( $miembros as $miembro)
            <div class="col-sm-4 g-mb-60">
    <!-- Figure -->
    <figure class="text-center">
      <!-- Figure Image -->
      <div class="d-block mx-auto rounded-circle g-max-width-200 g-bg-white g-pa-5 g-mb-15">
        <img class="rounded-circle g-max-width-190" src="{{URL::to('assets/img/nosotros')}}/{{$miembro->foto}}" alt="Image Description">
      </div>
      <!-- End Figure Image -->

      <!-- Figure Info -->
      <div class="g-mb-15">
        <h4 class="h4 g-color-black g-mb-5">{{$miembro->nombre}} {{$miembro->apellido_paterno}} {{$miembro->apellido_materno}}</h4>
        <em class="d-block g-font-style-normal g-font-size-11 text-uppercase g-color-primary">{{$miembro->cargo}}</em>
        <em class="d-block g-font-style-normal g-font-size-11 text-uppercase g-color-primary">{{$miembro->correo}}</em>
      </div>
      <p align="justify" style="margin: 20px;">{{$miembro->descripcion}}</p>
      <!-- End Info -->

      <!-- Figure Social Icons -->
      <ul class="text-center list-inline mb-0">
        <li class="list-inline-item g-mx-4">
          <a href="https://twitter.com/{{$miembro->twitter}}" target="_blank" class="u-icon-v3 u-icon-size--sm g-bg-gray-light-v5 g-color-gray-light-v2 g-bg-primary--hover g-color-white--hover rounded-circle">
            <i class="fa fa-twitter"></i>
          </a>
        </li>
        <li class="list-inline-item g-mx-4">
          <a href="https://www.facebook.com/{{$miembro->facebook}}" target="_blank" class="u-icon-v3 u-icon-size--sm g-bg-gray-light-v5 g-color-gray-light-v2 g-bg-primary--hover g-color-white--hover rounded-circle">
            <i class="fa fa-facebook"></i>
          </a>
        </li>
        <li class="list-inline-item g-mx-4">
          <a href="https://www.linkedin.com/{{$miembro->linkedin}}" target="_blank" class="u-icon-v3 u-icon-size--sm g-bg-gray-light-v5 g-color-gray-light-v2 g-bg-primary--hover g-color-white--hover rounded-circle">
            <i class="fa fa-linkedin"></i>
          </a>
        </li>
        <li class="list-inline-item g-mx-4">
          <a href="https://www.instagram.com/{{$miembro->instagram}}" target="_blank" class="u-icon-v3 u-icon-size--sm g-bg-gray-light-v5 g-color-gray-light-v2 g-bg-primary--hover g-color-white--hover rounded-circle">
            <i class="fa fa-instagram"></i>
          </a>
        </li>
   <!--     <li class="list-inline-item g-mx-4">
          <a href="mailto:{{$miembro->correo}}" class="u-icon-v3 u-icon-size--sm g-bg-gray-light-v5 g-color-gray-light-v2 g-bg-primary--hover g-color-white--hover rounded-circle">
            <i class="fa fa-envelope"></i>
          </a>
        </li>-->
      </ul>
      <!-- End Figure Social Icons -->
    </figure>
    <!-- End Figure -->
  </div>
  <!-- End Team Block -->
            @endforeach
            
          </div>

		
    </section>

   
  
  
   <div class="clearfix"></div>
 

@endsection
