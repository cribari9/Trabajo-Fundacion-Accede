@extends('layouts.adminapp')

@section('scripts')

<script >

      document.addEventListener('DOMContentLoaded', function() {
        
       

        $('#btnAgregar').click(function(){
              $('#miembrosModal').modal('toggle');
        });
        


     });

    </script>
@endsection

@section('content')

 <!-- Section Content -->
      <section id="opiniones" class="g-bg-gray-light-v5 g-py-100">
 	<div class="container g-max-width-780 text-center g-mb-60">
          <div class="text-center u-heading-v8-1 g-mb-35">
            <h2 class="h3 text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-26 mb-0">Edición
              <strong class="g-bg-gray-dark-v1 g-color-aqua">sección</strong> Nosotros</h2>
          </div>

        </div>
        <div class="text-center">
        <button id="btnAgregar" href="#" class="btn btn-md u-btn-outline-aqua u-btn-hover-v2-3 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-15"> Agregar miembro
          <i class="fa fa-plus g-ml-3"></i>
        </button>
      </div>
      @if($errors->any())
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="alert alert-danger">
        El formulario tiene algún error, intente nuevamente.
      </div>
    </div>
  </div>
</div>
@endif
          <div class="container">
          <div class="shortcode-html">
                  <!-- Table Bordered -->
                  <div class="card g-brd-aqua rounded-0 g-mb-30">
                    <h3 class="card-header g-bg-aqua g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0">
                      <i class="fa fa-users g-mr-5"></i>
                      Miembros de la fundación
                    </h3>

                    <div class="card-block table-responsive g-pa-15">
                      <table class="table table-bordered u-table--v1 mb-0">
                        <thead>
                          <tr>
                            <th>Rut</th>
                            <th>Foto</th>
                            <th>Nombre completo</th>
                            <th class="hidden-sm">Cargo</th>
                            <th>Correo</th>
                            <th>Acción</th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($miembros as $miembro)
                          <tr>
                            <td>{{$miembro->rut_miembro}}</td>
                            <td><img class="img-fluid" src="{{URL::to('assets/img/nosotros')}}/{{$miembro->foto}}" style="height: 50px;" alt="Image description"></td>
                            <td>{{$miembro->nombre}} {{$miembro->apellido_paterno}} {{$miembro->apellido_materno}}</td>
                            <td>{{$miembro->cargo}}</td>
                            <td>{{$miembro->correo}}</td>
                            <td>
                              <form action="{{url('/nosotros/'.$miembro->rut_miembro)}}" method="post" class="d-inline">
                                @csrf
                                {{method_field('DELETE')}}
                                <input onclick="return confirm('¿Deseas borrar a: {{$miembro->nombre}} {{$miembro->apellido_paterno}} {{$miembro->apellido_materno}}?')" class="btn btn-outline-danger" type="submit" value="Borrar">
                                </input>
                              </form>
                               <a href="{{url('/nosotros/'.$miembro->rut_miembro.'/edit')}}" class="btn btn-outline-warning" type="submit" >Editar
                                </a>
                              <a href="{{url('/nosotros/'.$miembro->rut_miembro.'')}}" class="btn btn-outline-primary"  >Ver
                                </a>
                            </td>
                          </tr>
                @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- End Table Bordered -->
        </div>


<form method="post" action="{{ route('nosotros.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
  <!-- Modal emprendedores -->
  <div class="modal fade" id="miembrosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingreso de miembro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 
@if($errors->any())
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
@endif
<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Rut:</label>
    <input id="txtRut_Miembro" class="form-control form-control-md rounded-0" type="text" name="txtRut_Miembro">
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
    <label class="g-mb-10" for="inputGroup1_1">Cargo:</label>
    <input id="txtCargo" class="form-control form-control-md rounded-0" type="text" name="txtCargo">
  </div>
  <!-- End Text Input -->

    <!-- Advanced File Input -->
  <div class="form-group mb-0">
    <label class="g-mb-10">Imagen: </label>
    <input class="js-file-attachment" type="file" name="txtImagen" id="txtImagen">
  </div>
  <!-- End Advanced File Input -->

<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Correo:</label>
    <input id="txtCorreo" class="form-control form-control-md rounded-0" type="text" name="txtCorreo">
  </div>
  <!-- End Text Input -->

   <!-- Textarea -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup2_1">Descripción:</label>
    <textarea id="txtDescripcion" class="form-control form-control-md g-resize-none rounded-0" rows="3" name="txtDescripcion"></textarea>
  </div>
  <!-- End Textarea -->

<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Facebook:</label>
    <input id="txtFacebook" class="form-control form-control-md rounded-0" type="text" name="txtFacebook">
  </div>
  <!-- End Text Input -->  


<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Twitter:</label>
    <input id="txtTwitter" class="form-control form-control-md rounded-0" type="text" name="txtTwitter">
  </div>
  <!-- End Text Input -->
   <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Linkedin:</label>
    <input id="txtLinkedin" class="form-control form-control-md rounded-0" type="text" name="txtLinkedin">
  </div>
  <!-- End Text Input -->
  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Instagram:</label>
    <input id="txtInstagram" class="form-control form-control-md rounded-0" type="text" name="txtInstagram">
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
{{ $miembros->links() }}
      </section>
      <!-- End Section Content -->

@endsection
