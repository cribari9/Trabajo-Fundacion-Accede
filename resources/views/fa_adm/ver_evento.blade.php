@extends('layouts.adminapp')

@section('scripts')
<script >

      document.addEventListener('DOMContentLoaded', function() {
        
       

        $('#btnInscripcion').click(function(){
              $('#inscripcionModal').modal('toggle');
        });
        


     });

    </script>
@endsection

@section('content')


      <!-- About Us -->
    <section class="g-py-100">
      @if(Session::has('success'))
    <div class="alert alert-success" role= "alert">
        <strong>Felicitaciones!:</strong>
            {!! session('success') !!}
    </div>
@endif
@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <strong>Ha ocurrido un error:</strong>
            <ul>
                @foreach($errors as $error)
                    <li>  {{ $error }} </li>
                @endforeach
            </ul>
    </div>
@endif
      <div class="container">
        <article class="row">
          <!-- Article Content -->
          <div class="col-lg-6 g-mb-30">
            <header class="u-heading-v6-2 g-mb-20">
              <h6 class="g-font-size-12 text-uppercase g-font-weight-600 g-pl-90">{{$evento->lugar}}</h6>
              <h3 class="u-heading-v6__title g-color-gray-dark-v2 g-brd-primary text-uppercase g-font-weight-600 g-mb-15">{{$evento->nombre}}</h3>
            </header>

            <div class="g-pl-90--sm">
              <p class="lead g-mb-40">{{$evento->descripcion}}</p>
              <p class="lead g-mb-40"><strong class="g-font-weight-700er">Responsable: </strong>{{$evento->responsable}}<br><strong class="g-font-weight-700er">Correo de contacto: </strong>{{$evento->email_contacto}}</p>
              <p class="lead g-mb-40"><strong class="g-font-weight-700er">Fecha de inicio: </strong>{{$evento->fecha_inicio->format('d-m-Y')}}<br><strong class="g-font-weight-700er">Fecha de término: </strong>{{$evento->fecha_termino->format('d-m-Y')}} <br><strong class="g-font-weight-700er">Horario: </strong>De {{$evento->hora_inicio}} a {{$evento->hora_termino}}</p>
              @if(($evento->capacidad-$evento->inscritos)>0)
              <p class="lead g-mb-40"><strong class="g-font-weight-700er">Cupos disponibles: </strong>{{$evento->capacidad-$evento->inscritos}} persona(s)</p>
              @endif

              @if($evento->capacidad==(NULL))
              <p class="lead g-mb-40"><strong class="g-font-weight-700er">NO SE REQUIERE INSCRIPCIÓN PREVIA</strong></p>
              @endif

              @if(($evento->inscritos)<($evento->capacidad)) 
              <button id="btnInscripcion" href="#" class="btn u-shadow-v21 g-bg-white g-color-primary g-color-black--hover  btn-outline-success g-bg-white-opacity-0_4--hover g-font-size-12 text-uppercase g-font-weight-600 g-rounded-50 g-py-12 g-px-20">
                     Inscribirse
              @else
                @if($evento->capacidad>0)
                <button id="sin_cupo" href="#" class="btn u-shadow-v21 g-bg-white g-color-red g-color-black--hover  btn-outline-success g-bg-white-opacity-0_4--hover g-font-size-12 text-uppercase g-font-weight-600 g-rounded-50 g-py-12 g-px-20" disabled="true">
                     NO HAY CUPOS DISPONIBLES
                @endif
              @endif        
            </div>

          </div>
          <!-- End Article Content -->
          @if($evento->imagen!==NULL)  
          <!-- Article Image -->
          <div class="col-lg-6 align-self-center">
            <img class="img-fluid w-100 u-shadow-v21 rounded" src="{{URL::to('assets/img/eventos')}}/{{$evento->imagen}}" alt="Iamge Description">
          </div>
          <!-- End Article Image -->
          @endif 
        </article>
        <br>
        <div class="d-flex">
            @if($evento->video!==NULL)       
                <!-- Youtube Example -->
                <div class="embed-responsive embed-responsive-16by9 g-mb-30">
                  <iframe width="100%" src="//www.youtube.com/embed/{{$evento->video}}" frameborder="0" allowfullscreen=""></iframe>
                </div>
                <!-- End Youtube Example -->  
            @endif  

          
              </div>
      </div>


<form method="post" action="{{ route('inscripcion.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
  <!-- Modal emprendedores -->
  <div class="modal fade" id="inscripcionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Te estás inscribiendo al evento: {{$evento->nombre}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 


<!-- Text Input -->
  <div class="form-group g-mb-20">
    <input hidden="true" id="txtId_evento" class="form-control form-control-md rounded-0" type="text" value="{{$evento->id_evento}}" name="txtId_evento">
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
    <!-- End About Us -->

@endsection
