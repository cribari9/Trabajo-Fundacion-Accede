@extends('layouts.adminapp')

@section('scripts')

@endsection

@section('content')
 <!-- Section Content -->
      <section id="opiniones" class="g-bg-gray-light-v5 g-py-100">

      <div class="container">
        <article class="row">
          <!-- Article Content -->
          <div class="col-lg-6 g-mb-30">
            <header class="u-heading-v6-2 g-mb-20">
              <h3 class="u-heading-v6__title g-color-gray-dark-v2 g-brd-primary text-uppercase g-font-weight-600 g-mb-15">{{$miembro->nombre}} {{$miembro->apellido_paterno}} {{$miembro->apellido_materno}}</h3>
            </header>

            <div class="g-pl-90--sm">
              <p class="lead g-mb-40" ><strong class="g-font-weight-700er">Rut: </strong>{{$miembro->rut_miembro}}<br><strong class="g-font-weight-700er">Correo de contacto: </strong>{{$miembro->correo}}
              <br><strong class="g-font-weight-700er">Teléfono: </strong>{{$miembro->telefono}}
              <br><strong class="g-font-weight-700er">Cargo: </strong>{{$miembro->cargo}}
              <br><strong class="g-font-weight-700er">Descripción: </strong>{{$miembro->descripcion}}
              <br><strong class="g-font-weight-700er">Facebook: </strong>{{$miembro->facebook}}
              <br><strong class="g-font-weight-700er">Twitter: </strong>{{$miembro->twitter}}
              <br><strong class="g-font-weight-700er">Linkedin: </strong>{{$miembro->linkedin}}
              <br><strong class="g-font-weight-700er">Instagram: </strong>{{$miembro->instagram}}</p>
              
            </div>

          </div>
          <!-- End Article Content -->
          @if($miembro->foto!==NULL)  
          <!-- Article Image -->
          <div class="col-lg-6 align-self-center">
            <img class="img-fluid w-100 u-shadow-v21 rounded" src="{{URL::to('assets/img/nosotros')}}/{{$miembro->foto}}" alt="Iamge Description">
          </div>
          <!-- End Article Image -->
          @endif 
        </article>
        <br>
 
      </div>


<form method="post" action="{{ route('inscripcion.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
  <!-- Modal emprendedores -->
  <div class="modal fade" id="inscripcionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Te estás inscribiendo al miembro: {{$miembro->nombre}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 


<!-- Text Input -->
  <div class="form-group g-mb-20">
    <input hidden="true" id="txtId_miembro" class="form-control form-control-md rounded-0" type="text" value="{{$miembro->id_miembro}}" name="txtId_miembro">
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
