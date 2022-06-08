@extends('layouts.adminapp')

@section('scripts')
<script >

      document.addEventListener('DOMContentLoaded', function() {
        
       

        $('#btnAgregar').click(function(){
              $('#eventosModal').modal('toggle');
              var fecha = new Date();
    var anio = fecha.getFullYear();
    var dia = fecha.getDate();
    var _mes = fecha.getMonth();//viene con valores de 0 al 11
    _mes = _mes + 1;//ahora lo tienes de 1 al 12
    if (_mes < 10)//ahora le agregas un 0 para el formato date
    { var mes = "0" + _mes;}
    else
    { var mes = _mes.toString;}
    document.getElementById("txt_fecha_inicio").min = anio+'-'+mes+'-'+dia;
    document.getElementById("txt_fecha_inicio").value = anio+'-'+mes+'-'+dia; 
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
              <strong class="g-bg-gray-dark-v1 g-color-blue">sección</strong> Eventos</h2>
          </div>
        </div>
        <div class="text-center">
        <button id="btnAgregar" href="#" class="btn btn-md u-btn-outline-blue u-btn-hover-v2-3 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-15"> Agregar evento
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
            <div class="text-center">
        <a  href="{{url('inscritos.excel')}}" class="btn btn-md u-btn-outline-teal u-btn-hover-v2-3 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-15"> Descargar excel con inscritos
          <i class="fa fa-download g-ml-3"></i>
        </a>
      </div>
        <div class="container">
                <div class="shortcode-html">
                  <!-- Table Bordered -->
                  <div class="card g-brd-blue rounded-0 g-mb-30">
                    <h3 class="card-header g-bg-blue g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0">
                      <i class="fa fa-calendar g-mr-5"></i>
                      Eventos
                    </h3>

                    <div class="card-block table-responsive g-pa-15">
                      <table class="table table-bordered u-table--v1 mb-0">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th class="hidden-sm">Responsable</th>
                            <th>Mail contacto</th>
                            <th>Fecha de inicio</th>
                            <th>Acción</th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($eventos as $evento)
                          <tr>
                            <td>{{$evento->id_evento}}</td>
                            <td><img class="img-fluid" src="{{URL::to('assets/img/eventos')}}/{{$evento->imagen}}" style="height: 50px;" alt="Image description"></td>
                            <td>{{$evento->nombre}}</td>
                            <td>{{$evento->responsable}}</td>
                            <td>{{$evento->email_contacto}}</td>
                            <td>{{$evento->fecha_inicio->format('d-m-Y')}}</td>
                            <td>
                              <form action="{{url('/eventos/'.$evento->id_evento)}}" method="post" class="d-inline">
                                @csrf
                                {{method_field('DELETE')}}
                                <input onclick="return confirm('¿Deseas borrar el evento: {{ $evento->nombre }}?')" class="btn btn-outline-danger" type="submit" value="Borrar">
                                </input>
                              </form>

                                 <a href="{{url('/eventos/'.$evento->id_evento.'/edit')}}" class="btn btn-outline-warning" type="submit" >Editar
                                </a>
                               
                                <a class="btn btn-outline-success" href="{{url('/eventos/'.$evento->id_evento.'')}}">Vista usuario</a>
                                @if($evento->inscritos>0)         
                                  <button onclick="location.href='{{ url('eventos/ver_inscritos', [$evento->id_evento]) }}'" href="" type="button" class="btn btn-outline-success">Inscritos</button>  
                                @endif
                      
                            </td>
                          </tr>
        				@endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- End Table Bordered -->
                </div>
              </div>


<form method="post" action="{{ route('eventos.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
  <!-- Modal emprendedores -->
  <div class="modal fade" id="eventosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingreso de evento</h5>
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
    <input id="txtNombre" class="g-color-black form-control form-control-md rounded-0" type="text" name="txtNombre">
  </div>
  <!-- End Text Input -->


   <!-- Textarea -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup2_1">Descripción:</label>
    <textarea id="txtDescripcion" class="g-color-black form-control form-control-md g-resize-none rounded-0" rows="3" name="txtDescripcion"></textarea>
  </div>
  <!-- End Textarea -->

  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Responsable:</label>
    <input id="txtResponsable" class="g-color-black form-control form-control-md rounded-0" type="text" name="txtResponsable">
  </div>
  <!-- End Text Input -->
<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Correo de contacto:</label>
    <input id="txtCorreo" class="g-color-black form-control form-control-md rounded-0" type="text" name="txtCorreo">
  </div>
  <!-- End Text Input -->

<fieldset>
          ¿Es virtual?:  
            <label class="form-check-inline u-check g-pl-25 ml-0 g-mr-25">
              <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="es_virtual" type="radio" onclick="txtLugar.disabled = true;" value="si" checked="checked">
              <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
              </div>
              Si
            </label>
            <label class="form-check-inline u-check g-pl-25 ml-0 g-mr-25">
              <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="es_virtual" type="radio" onclick="txtLugar.disabled = false;" value="no">
              <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
              </div>
              No
            </label>
  <br>
  </fieldset>

<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Lugar:</label>
    <input id="txtLugar" disabled="true" class="g-color-black form-control form-control-md rounded-0" type="text" name="txtLugar">
  </div>
  <!-- End Text Input -->


<!-- Select Date Range -->
  <div class="form-group mb-0">
    <div class="row">
      <div class="col-xl-5 g-mb-40 g-mb-0--xl">
        <!-- Datepicker --> 
        <label class="g-mb-10" for="inputGroup1_1">Fecha de inicio:</label>
        <div class="input-group g-brd-primary--focus">

          <input id="txt_fecha_inicio" class="g-color-black form-control form-control-md u-datepicker-v1 rounded-0" type="date" placeholder="Fecha de inicio" min="2021-02-08"  data-range="true" data-to="datepickerTo" name="txt_fecha_inicio" value="2021-02-08">
        </div>
        <!-- End Datepicker -->
      </div>

      <div class="col-xl-5 g-mb-40 g-mb-0--xl">
        <!-- Datepicker -->          <label class="g-mb-10" for="inputGroup1_1">Fecha de término:</label>

        <div class="input-group g-brd-primary--focus">
          <input id="datepickerTo" class="g-color-black form-control form-control-md u-datepicker-v1 rounded-0" type="date" placeholder="Fecha de término" onclick="min=txt_fecha_inicio.value;" name="txt_fecha_termino">
         
        </div>
        <!-- End Datepicker -->
      </div>
    </div>
  </div>
  <!-- End Select Date Range -->

 <!-- Select Time Range -->
  <div class="form-group mb-0">
    <div class="row">
      <div class="col-xl-4 g-mb-40 g-mb-0--xl">
        <!-- Datepicker --><label class="g-mb-10" for="inputGroup1_1">Hora de inicio:</label>
        <div class="input-group g-brd-teal--focus" >
          <input class="g-color-black form-control rounded-0 form-control-md" type="time" id="hora_inicio-time-input" name="txt_hora_inicio">
        </div>
        <!-- End Datepicker -->
      </div>

      <div class="col-xl-4">
        <!-- Datepicker --><label class="g-mb-10" for="inputGroup1_1">Hora de término:</label>
        <div class="input-group g-brd-primary--focus">
          <input class="g-color-black form-control rounded-0 form-control-md" type="time" id="hora_termino" name="txt_hora_termino">
        </div>
        <!-- End Datepicker -->
      </div>
    </div>
  </div>
  <!-- End Select Date Range -->
<br>
  <fieldset>
          ¿Requiere inscripción?:  
            <label class="form-check-inline u-check g-pl-25 ml-0 g-mr-25">
              <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="tiene_inscripcion" type="radio" onclick="txtInscritos.disabled = false;txtCapacidad.disabled = false;" value="si" checked="checked">
              <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
              </div>
              Si
            </label>
            <label class="form-check-inline u-check g-pl-25 ml-0 g-mr-25">
              <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="tiene_inscripcion" type="radio" onclick="txtInscritos.disabled = true;txtCapacidad.disabled = true;" value="no">
              <div class="u-check-icon-radio-v4 g-absolute-centered--y g-left-0 g-width-18 g-height-18">
                <i class="g-absolute-centered d-block g-width-10 g-height-10 g-bg-primary--checked"></i>
              </div>
              No
            </label>
  <br>
  </fieldset>
  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Cupos reservados:</label>
    <input id="txtInscritos" class="g-color-black form-control form-control-md rounded-0" type="text" name="txtInscritos">
  </div>
  <!-- End Text Input -->
  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Capacidad máxima:</label>
    <input id="txtCapacidad" class="g-color-black form-control form-control-md rounded-0" type="text" name="txtCapacidad">
  </div>
  <!-- End Text Input -->

  <!-- Advanced File Input -->
  <div class="form-group mb-0">
    <label class="g-mb-10">Imagen: </label>
    <input class="js-file-attachment" type="file" name="txtImagen" id="txtImagen">
  </div>
  <!-- End Advanced File Input -->

           

              <!-- Input with Autocomplete -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="autocomplete1">Video:</label>
    <input id="txtVideo" class="g-color-black form-control form-control-md rounded-0" type="URL" placeholder="Ej: https://www.youtube.com/watch?v=PO-DmjDAqQo&t=7s" data-url="../../../assets/include/ajax/autocomplete-data-1.json" name="txtVideo">
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
{{ $eventos->links() }}
    </section>

@endsection
