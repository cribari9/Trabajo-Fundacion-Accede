@extends('layouts.adminapp')

@section('scripts')
<script >

      document.addEventListener('DOMContentLoaded', function() {
        
       

        $('#btnAgregar').click(function(){
              $('#imgproyectosModal').modal('toggle');
        });
        


     });

    </script>
@endsection

@section('content')

      <!-- Section Content -->
      <section id="proyectos" class="g-bg-gray-light-v5 g-py-100">
        <div class="container g-max-width-780 text-center g-mb-60">
          <div class="text-center u-heading-v8-1 g-mb-35">
            <h2 class="h3 text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-26 mb-0">Galería
              <strong class="g-bg-gray-dark-v1 g-color-teal">del proyecto: </strong> {{$proyecto->nombre}}</h2>
          </div>
        </div>
        @if(sizeof($imagenes)>9)         
            <div class="text-center">
                <button id="btnAgregar" href="#" class="btn btn-md u-btn-outline-red u-btn-hover-v2-3 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-15" disabled="true" onclick="return alert('Si desea agregar nueva imagen, debe eliminar alguna registrada.')"> Superó el máximo de 10 imágenes por proyecto
                  <i class="fa fa-close g-ml-3"></i>
                </button>
              </div> 
              <!-- Danger Alert -->
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <strong>Ha superado el máximo de 10 imágenes en la galería del proyecto! </strong> Si desea agregar una imagen debe borrar alguna registrada.
    </div>
    <!-- End Danger Alert -->
            @else
              <div class="text-center">
                <button id="btnAgregar" href="#" class="btn btn-md u-btn-outline-teal u-btn-hover-v2-3 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-15"> Agregar imagen
                  <i class="fa fa-plus g-ml-3"></i>
                </button>
              </div>  
        @endif
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
                  <div class="card g-brd-teal rounded-0 g-mb-30">
                    <h3 class="card-header g-bg-teal g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0">
                      <i class="fa fa-tasks g-mr-5"></i>
                      Imágenes
                    </h3>

                    <div class="card-block table-responsive g-pa-15">
                      <table class="table table-bordered u-table--v1 mb-0">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Formato</th>
                            <th>ID_proyecto</th>
                            <th>Acción</th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($imagenes as $imagen)
                          <tr>
                            <td>{{$imagen->id}}</td>
                            <td><img class="img-thumbnail img-fluid" src="{{URL::to('images/galeria_proyectos')}}/{{$imagen->nombre}}" style="height: 80px;" alt="Image description"></td>
                            <td>{{$imagen->nombre}}</td>
                            <td>{{$imagen->formato}}</td>
                            <td>{{$imagen->id_proyecto}}</td>
                            <td>
                              <form action="{{url('/imgproyectos/'.$imagen->id)}}" method="post" class="d-inline">
                                @csrf
                                {{method_field('DELETE')}}
                                <input onclick="return confirm('¿Deseas borrar el proyecto: {{$imagen->nombre}}?')" class="btn btn-outline-danger" type="submit" value="Borrar">
                                </input>
                              </form>
        
                            </td>
                          </tr>
                @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- End Table Bordered -->
        </div>

<form method="post" action="{{ route('imgproyectos.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
  <!-- Modal emprendedores -->
  <div class="modal fade" id="imgproyectosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingreso de imagen a la galería de: {{$proyecto->nombre}}</h5>
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

  <!-- Advanced File Input -->
  <div class="form-group mb-0">
    <label class="g-mb-10">Imagen: </label>
    <input class="js-file-attachment" required autocomplete="txtImagen" type="file" name="txtImagen" id="txtImagen">
  </div>
  <!-- End Advanced File Input -->
<!-- Text Input -->
  <div class="form-group g-mb-20">
    <input hidden="true" id="txtID_proyecto" class="form-control form-control-md rounded-0" type="text" value="{{$proyecto->id_proyecto}}" name="txtID_proyecto">
  </div>
  <!-- End Text Input -->

        </div>
        <div class="modal-footer">
            
           <div class="form-group text-center">
            <input type="submit" name="agregar_imgproyecto" class="btn btn-success" value="Agregar" />
           </div>
            <button type="button" id="btnCancelar_imgproyecto" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
           </div>
      </div>
    </div>
  </div>
</form>
{{ $imagenes->links() }}
      </section>
      <!-- End Section Content -->

@endsection
