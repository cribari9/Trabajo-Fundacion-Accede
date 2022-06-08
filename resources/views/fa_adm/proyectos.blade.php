@extends('layouts.adminapp')

@section('scripts')
<script >

      document.addEventListener('DOMContentLoaded', function() {
        
       

        $('#btnAgregar').click(function(){
              $('#proyectosModal').modal('toggle');
        });
        


     });

    </script>
@endsection

@section('content')

      <!-- Section Content -->
      <section id="proyectos" class="g-bg-gray-light-v5 g-py-100">
        <div class="container g-max-width-780 text-center g-mb-60">
          <div class="text-center u-heading-v8-1 g-mb-35">
            <h2 class="h3 text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-26 mb-0">Edición
              <strong class="g-bg-gray-dark-v1 g-color-teal">sección</strong> Proyectos</h2>
          </div>
        </div>
      <div class="text-center">
        <button id="btnAgregar" href="#" class="btn btn-md u-btn-outline-teal u-btn-hover-v2-3 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-15"> Agregar proyecto
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
                  <div class="card g-brd-teal rounded-0 g-mb-30">
                    <h3 class="card-header g-bg-teal g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0">
                      <i class="fa fa-tasks g-mr-5"></i>
                      Proyectos
                    </h3>

                    <div class="card-block table-responsive g-pa-15">
                      <table class="table table-bordered u-table--v1 mb-0">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th style="width: 450px;
  overflow: auto;">Descripción</th>
                            <th>Lugar</th>
                            <th style="width: 95px;
  overflow: auto;">Fecha</th>
                            <th>Acción</th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($proyectos as $proyecto)
                          <tr>
                            <td>{{$proyecto->id_proyecto}}</td>
                            <td><img class="img-thumbnail img-fluid" src="{{URL::to('assets/img/proyectos')}}/{{$proyecto->imagen}}" style="height: 50px;" alt="Image description"></td>
                            <td>{{$proyecto->nombre}}</td>
                            <td>{{ \Illuminate\Support\Str::limit($proyecto->descripcion, 200, $end='...') }}</td>
                            <td>{{$proyecto->lugar}}</td>
                            <td>{{$proyecto->fecha->format('d-m-Y')}}</td>
                            <td>
                              <form action="{{url('/proyectos/'.$proyecto->id_proyecto)}}" method="post" class="d-inline">
                                @csrf
                                {{method_field('DELETE')}}
                                <input onclick="return confirm('¿Deseas borrar el proyecto: {{ $proyecto->nombre }}?')" class="btn btn-outline-danger" type="submit" value="Borrar">
                                </input>
                              </form>

                                <a href="{{url('/proyectos/'.$proyecto->id_proyecto.'/edit')}}" class="btn btn-outline-warning" type="submit" >Editar
                                </a>
                                <a class="btn btn-outline-success" href="{{url('/proyectos/'.$proyecto->id_proyecto)}}">Vista usuario</a>
                                <button onclick="location.href='{{ url('proyectos/ver_galeria', [$proyecto->id_proyecto]) }}'" href="" type="button" class="btn btn-outline-success">Galería de imágenes</button>

        

                            </td>
                          </tr>
                @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- End Table Bordered -->
        </div>

<form method="post" action="{{ route('proyectos.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
  <!-- Modal proyectos -->
  <div class="modal fade" id="proyectosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingreso de proyecto</h5>
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
    <label class="g-mb-10" for="inputGroup1_1">Nombre:</label>
    <input id="txtNombre" class="form-control form-control-md rounded-0" type="text" name="txtNombre">
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
    <label class="g-mb-10" for="inputGroup1_1">Lugar:</label>
    <input id="txtLugar" class="form-control form-control-md rounded-0" type="text" name="txtLugar">
  </div>
  <!-- End Text Input -->

  <!-- Select Date Range -->
  <div class="form-group mb-0">
    <div class="row">
      <div class="col-xl-5 g-mb-40 g-mb-0--xl">
        <!-- Datepicker --> 
        <label class="g-mb-10" for="inputGroup1_1">Fecha:</label>
        <div class="input-group g-brd-primary--focus">

          <input id="datepickerFrom" class=" form-control form-control-md u-datepicker-v1 rounded-0" type="month" placeholder="Fecha"  data-range="true" data-to="datepickerTo" name="txtFecha">
        </div>
        <!-- End Datepicker -->
      </div>
      </div>
      </div>
<br>
  <!-- Advanced File Input -->
  <div class="form-group mb-0">
    <label class="g-mb-10">Imagen principal: </label>
    <input class="js-file-attachment" type="file" name="txtImagen" id="txtImagen">
  </div>
  <!-- End Advanced File Input -->

           

              <!-- Input with Autocomplete -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="autocomplete1">Video:</label>
    <input id="txtVideo" class="form-control form-control-md rounded-0" type="URL" placeholder="Ej: https://www.youtube.com/watch?v=PO-DmjDAqQo&t=7s" data-url="../../../assets/include/ajax/autocomplete-data-1.json" name="txtVideo">
    <small class="form-text text-muted g-font-size-default g-mt-10">
          <strong>Nota:</strong> Ingresar link completo de youtube.
        </small>
  </div>
  <!-- End Input with Autocomplete --> 
   
         

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
{{ $proyectos->links() }}
      </section>
      <!-- End Section Content -->

@endsection
