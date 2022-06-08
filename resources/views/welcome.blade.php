@extends('layouts.app')

@section('scripts')
<script >

      document.addEventListener('DOMContentLoaded', function() {
        
       

        $('#btnAgregar_Voluntario').click(function(){
              $('#voluntariosModal').modal('toggle');
        });
        


     });

    </script>
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v9.0" nonce="9tiqtNyq"></script>
@endsection

@section('content')

    
        
        <section id="home"  >
        <div class="js-carousel"
             data-infinite="true"
             data-fade="true"
             data-speed="5000"
             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-30"style="margin-top: -25px;">
          <div class="js-slide u-bg-overlay g-color-white g-bg-black-opacity-0_5--after g-bg-img-hero" style="background-image: url(assets/img/inicio/{{$fundacion->imagen1}});">
            <div class="u-bg-overlay__inner g-flex-centered g-height-100vh g-min-height-600 g-py-40">
              <div class="container">
                <h2 class="h2 text-uppercase g-line-height-1_2 g-letter-spacing-1 g-font-size-40 g-font-size-65--md g-color-white g-mb-40">Por el libre
                  <br> <strong class="g-font-weight-700er">acceso a la información</strong></h2>

          
                <p class="g-max-width-800 g-color-white-opacity-0_7 g-mb-45">Buscamos fomentar el libre acceso a las plataformas del conocimiento y contribuir a la reducción de las brechas de acceso a la información.</p>

              </div>
            </div>
          </div>

          <div class="js-slide u-bg-overlay g-color-white g-bg-black-opacity-0_5--after g-bg-img-hero" style="background-image: url(assets/img/inicio/{{$fundacion->imagen2}});">
            <div class="u-bg-overlay__inner g-flex-centered g-height-100vh g-min-height-600 g-py-40">
              <div class="container">
                <h2 class="h2 text-uppercase g-line-height-1_2 g-letter-spacing-1 g-font-size-40 g-font-size-65--md g-color-white g-mb-40">Somos
                  <br><strong class="g-font-weight-700er">Fundación Accede!</strong></h2>

             

                <p class="g-max-width-800 g-color-white-opacity-0_7 g-mb-45">Después de meses de trabajo, logramos dar un paso firme para poder alcanzar nuestras metas, ya constituidos y legalmente representados como Fundación Accede.</p>

                
              </div>
            </div>
          </div>
        </div>
       
  
       <hr>
        <div class="container g-max-width-780 text-center g-mb-60">
          <div class="text-center u-heading-v8-1 g-mb-35">
            <h2 class="h3 text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-26 mb-0">Trabaja
              <strong class="g-bg-teal g-color-white">con</strong> nosotros</h2>
          </div>
          <button id="btnAgregar_Voluntario" href="#" class="btn u-shadow-v21 g-bg-white g-color-primary g-color-black--hover  btn-outline-success g-bg-white-opacity-0_4--hover g-font-size-12 text-uppercase g-font-weight-600 g-rounded-50 g-py-12 g-px-20">
                    <i class="fa fa-heart"></i> Hazte voluntario
        </div>
        <hr>
         <!-- Icon Blocks -->
    
      
        <!-- Icon Blocks --><div>
          <div align="center"  class="col-sm col-md col-lg-5 " style="float: left;">
      <div  class="fb-page" data-href="https://www.facebook.com/FundacionAccede.Chile" data-tabs="timeline" data-width="" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/FundacionAccede.Chile" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/FundacionAccede.Chile">Fundación Accede</a></blockquote></div>
</div>
    <!--    <div align="center" class="col-lg-5 u-bg-overlay g-bg-img-hero g-bg-teal-opacity-0_9--after g-color-white text-center g-pa-60" style="background-image: url(assets/img/inicio/{{$fundacion->imagen3}});float: left;">
          <div class="u-bg-overlay__inner">
            <span class="u-icon-v2 u-icon-size--lg u-shadow-v24 rounded-circle g-mb-25">
                <i class="icon-finance-147 u-line-icon-pro"></i>
              </span>
            <h3 class="h5 text-uppercase g-font-weight-600 g-mb-15">Aporte voluntario</h3>
            <p class="g-font-size-16 g-mb-20">Somos una fundación sin fines de lucro y tu aporte es valioso para seguir avanzando por un libre acceso a la información.</p>
            <a class="btn u-shadow-v21 g-bg-white g-color-teal g-color-white--hover g-bg-white-opacity-0_4--hover g-font-size-12 text-uppercase g-font-weight-600 g-rounded-50 g-py-12 g-px-20" href="#">Aportar</a>
          </div>
        </div>-->
        <!-- End Icon Blocks -->
        </div>
 <div class="clearfix"></div>

<br>

<form method="post" action="{{ route('voluntarios.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
  <!-- Modal emprendedores -->
  <div class="modal fade" id="voluntariosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hazte voluntario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 

<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Rut:</label>
    <input id="txtRut_Voluntario" class="form-control form-control-md rounded-0" type="text" name="txtRut_Voluntario">
  </div>
  <!-- End Text Input -->
<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Nombre:</label>
    <input id="txtNombre" class="form-control form-control-md rounded-0" type="text" name="txtNombre">
  </div>
  <!-- End Text Input -->
<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Apellido paterno:</label>
    <input id="txtApellido_Paterno" class="form-control form-control-md rounded-0" type="text" name="txtApellido_Paterno">
  </div>
  <!-- End Text Input -->
  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Apellido materno:</label>
    <input id="txtApellido_Materno" class="form-control form-control-md rounded-0" type="text" name="txtApellido_Materno">
  </div>
  <!-- End Text Input -->
<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Teléfono:</label>
    <input id="txtTelefono" class="form-control form-control-md rounded-0" type="text" name="txtTelefono">
  </div>
  <!-- End Text Input -->



<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Correo:</label>
    <input id="txtCorreo" class="form-control form-control-md rounded-0" type="text" name="txtCorreo">
  </div>
  <!-- End Text Input -->

  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Edad:</label>
    <input id="txtEdad" class="form-control form-control-md rounded-0" type="text" name="txtEdad">
  </div>
  <!-- End Text Input -->

    <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Región:</label>
    <input id="txtRegion" class="form-control form-control-md rounded-0" type="text" name="txtRegion">
  </div>
  <!-- End Text Input -->

<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Ocupación:</label>
    <input id="txtOcupacion" class="form-control form-control-md rounded-0" type="text" name="txtOcupacion">
  </div>
  <!-- End Text Input -->  



        </div>
        <div class="modal-footer">
            
           <div class="form-group text-center">
            <input type="submit" name="agregar_proyecto" class="btn btn-success" value="Agregar" />
           </div>
            <button type="button" id="btnCancelar_proyecto" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
           </div>
      </div>
    </div>
  </div>
</form>
      </section>
@endsection
