@extends('layouts.escritor')

@section('scripts')
<script >

      document.addEventListener('DOMContentLoaded', function() {
        
       

        $('#btnAgregar').click(function(){
              $('#opinionesModal').modal('toggle');
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
              <strong class="g-bg-gray-dark-v1 g-color-brown">sección</strong> Opiniones</h2>
          </div>

        </div>
        <div class="text-center">
        <button id="btnAgregar" href="#" class="btn btn-md u-btn-outline-teal u-btn-hover-v2-3 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-15"> Agregar opinión
          <i class="fa fa-plus g-ml-3"></i>
        </a>
      </div>
          <div class="container">
          <div class="shortcode-html">
                  <!-- Table Bordered -->
                  <div class="card g-brd-brown rounded-0 g-mb-30">
                    <h3 class="card-header g-bg-brown g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0">
                      <i class="fa fa-users g-mr-5"></i>
                      Opiniones publicadas
                    </h3>

                    <div class="card-block table-responsive g-pa-15">
                      <table class="table table-bordered u-table--v1 mb-0">
                        <thead>
                          <tr>
                            <td>ID</td>
                            <th>Imagen</th>
                            <th>Autor</th>       
                            <th>Título</th>
                            <th style="width: 500px;
  overflow: auto;">Descripción</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Acción</th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($opiniones_escritor as $opinion)
                          <tr>
                            <td>{{$opinion->id_opinion}}</td>
                            <td><img class=" img-fluid" src="{{URL::to('assets/img/opiniones')}}/{{$opinion->imagen}}" style="height: 50px;" alt="Image description"></td>
                            <td>{{$opinion->autor}}</td>
                            <td>{{$opinion->titulo}}</td>
                            <td>{{\Illuminate\Support\Str::limit($opinion->descripcion, 200, $end='...')}}</td>
                            <td>{{$opinion->fecha->format('d-m-Y')}}</td>
                            <td>{{$opinion->hora}}</td>
                            <td>
                              <form action="{{url('/opiniones/'.$opinion->id_opinion)}}" method="post" class="d-inline">
                                @csrf
                                {{method_field('DELETE')}}
                                <input onclick="return confirm('¿Deseas borrar el artículo de opinión: {{ $opinion->titulo }}?')" class="btn btn-outline-danger" type="submit" value="Borrar">
                                </input>
                              </form>

                                <a href="{{url('/opiniones/'.$opinion->id_opinion.'/edit')}}" class="btn btn-outline-warning" type="submit" >Editar
                                </a>
                                 <a href="{{url('/opiniones/'.$opinion->id_opinion.'')}}" class="btn btn-outline-primary"  >Ver
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

<form method="post" action="{{ route('opiniones.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
  <!-- Modal emprendedores -->
  <div class="modal fade" id="opinionesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingreso de artículo de opinión</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 



 <div class="form-group g-mb-20">
    <input hidden="true" id="txtIdAutor" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{auth()->user()->id}}" name="txtIdAutor">
  </div>


<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Nombre del autor:</label>
    <input readonly="true"id="txtAutor" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{auth()->user()->name}}" name="txtAutor">
  </div>
  <!-- End Text Input -->

<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Título:</label>
    <input id="txtTitulo" class="g-color-black form-control form-control-md rounded-0" type="text" name="txtTitulo">
  </div>
  <!-- End Text Input -->

 <!-- Textarea -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup2_1">Descripción:</label>
    <textarea id="txtDescripcion" class="g-color-black form-control form-control-md g-resize-none rounded-0" rows="3"  name="txtDescripcion"></textarea>
  </div>
  <!-- End Textarea -->

   <!-- Textarea -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup2_1">Contenido:</label>
    <textarea id="txtContenido" class="g-color-black form-control form-control-md g-resize-none rounded-0" rows="3"  name="txtContenido"></textarea>
  </div>
  <!-- End Textarea -->

   <br>

  <!-- Advanced File Input -->
  <div class="form-group mb-0">
    <label class="g-mb-10">Imagen de Portada: </label>
    <input class="js-file-attachment" type="file" name="txtPortada" id="txtPortada">
  </div>
  <!-- End Advanced File Input -->
  <br>

  <!-- Advanced File Input -->
  <div class="form-group mb-0">
    <label class="g-mb-10">Imagen: </label><br>
    <input class="js-file-attachment" type="file" name="txtImagen" id="txtImagen">
  </div>
  <!-- End Advanced File Input -->

           
<br>
           

              <!-- Input with Autocomplete -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="autocomplete1">Video:</label>
    <input id="txtVideo" class="form-control form-control-md rounded-0" type="text" placeholder="Ej: https://www.youtube.com/watch?v=PO-DmjDAqQo&t=7s" data-url="../../../assets/include/ajax/autocomplete-data-1.json" name="txtVideo">
    <small class="form-text text-muted g-font-size-default g-mt-10">
          <strong>Nota:</strong> Ingresar link completo de youtube.
        </small>
  </div>
  <!-- End Input with Autocomplete --> 
   
         

        </div>
        <div class="modal-footer">
            
           <div class="form-group text-center">
            <input type="submit" name="agregar_opinion" class="btn btn-success" value="Agregar" />
           </div>
            <button type="button" id="btnCancelar_opinion" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
           </div>
      </div>
    </div>
  </div>
</form>
{{ $opiniones_escritor->links() }}

</section>
      <!-- End Section Content -->
   


@endsection
