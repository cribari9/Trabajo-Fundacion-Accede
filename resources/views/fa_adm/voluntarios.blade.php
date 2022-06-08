@extends('layouts.adminapp')

@section('scripts')

    <script >

      document.addEventListener('DOMContentLoaded', function() {
        
       

        $('#btnAgregar').click(function(){
              $('#voluntariosModal').modal('toggle');

        });

    
         $('#btnAgregar_voluntario').click(function(){
            ObjVoluntario=recolectarDatosVoluntario("POST");
            console.log(ObjVoluntario);
            EnviarInformacion('',ObjVoluntario);
        });


        function recolectarDatosvoluntario(method){
          nuevoVoluntario={
            rut_voluntario:$('#txtRut_Voluntario').val(),
            nombre:$('#txtNombre').val(),
            apellido_paterno:$('#txtApellido_Paterno').val(),
            apellido_materno:$('#txtApellido_Materno').val(),  
            telefono:$('#txtTelefono').val(),  
            correo:$('#txtCorreo').val(),  
            edad:$('#txtEdad').val(),
            region:$('#txtRegion').val(),
            ocupacion:$('#txtOcupacion').val(),
     //       tiene_resol_sanitaria: $('input:radio[name=tiene_resol_sanitaria]:checked').val(),
   //         tiene_inicio_actividades: $('input:radio[name=tiene_inicio_actividades]:checked').val(),
         //   forma_venta_emprendimiento: $('#forma_venta_emprendimiento').get(),
         //   categoria_emprendimiento: $('#categoria_emprendimiento').get(),
          // logo: $('logo') 
                '_token':$("meta[name='csrf-token']").attr("content"),
                '_method':method
            }
            if(nombre == '')
            {
              $("#lbnombre").html("<span style='color:red;'> Complete el campo nombre </span>")
              $("#txtNombre").focus();
              return false;
            }
            return(nuevoVoluntario);
        }


         function EnviarInformacion(accion,objVoluntario){
          $.ajax(
            {
              type:"POST",
              url:"{{ url('fa_adm/voluntarios')}}"+accion,
              data:objVoluntario,

              success:function(msg){ console.log(msg);},
              error:function(){alert("Hay un error en el ingreso");}
            }


          );
        }
        

      });

    </script>

@endsection

@section('content')

 <!-- Section Content -->
      <section id="opiniones" class="g-bg-gray-light-v5 g-py-100">
 	<div class="container g-max-width-780 text-center g-mb-60">
          <div class="text-center u-heading-v8-1 g-mb-35">
            <h2 class="h3 text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-26 mb-0">Control
              <strong class="g-bg-gray-dark-v1 g-color-orange">de</strong> Voluntarios</h2>
          </div>

        </div>
        <div class="text-center">
        <button id="btnAgregar" href="#" class="btn btn-md u-btn-outline-orange u-btn-hover-v2-3 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-15"> Agregar voluntario
          <i class="fa fa-plus g-ml-3"></i>
        </button>
      </div>
      
      @if($errors->any())
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-2">
      <div class="alert alert-danger">
        No se ha agregado el voluntario porque algunos datos no se han ingresado correctamente. Intente de nuevo con el botón "Agregar voluntario" para más información.
      </div>
    </div>
  </div>
</div>
@endif
          <div class="container">
          <div class="shortcode-html">
                  <!-- Table Bordered -->
                  <div class="card g-brd-orange rounded-0 g-mb-30">
                    <h3 class="card-header g-bg-orange g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0">
                      <i class="fa fa-users g-mr-5"></i>
                      Voluntarios
                    </h3>

                    <div class="card-block table-responsive g-pa-15">
                      <table class="table table-bordered u-table--v1 mb-0">
                        <thead>
                          <tr>
                            <th>Rut</th>
                            <th>Nombre completo</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Edad</th>
                            <th>Región</th>
                            <th>Ocupación</th>
                            <th>Acción</th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($voluntarios as $voluntario)
                          <tr>
                            <td>{{$voluntario->rut_voluntario}}</td>
                            <td>{{$voluntario->nombre}} {{$voluntario->apellido_paterno}} {{$voluntario->apellido_materno}}</td>
                            <td>{{$voluntario->telefono}}</td>
                            <td>{{$voluntario->correo}}</td>
                            <td>{{$voluntario->edad}}</td>
                            <td>{{$voluntario->region}}</td>
                            <td>{{$voluntario->ocupacion}}</td>
                            <td>
                              <form action="{{url('/voluntarios/'.$voluntario->rut_voluntario)}}" method="post" class="d-inline">
                                @csrf
                                {{method_field('DELETE')}}
                                <input onclick="return confirm('¿Deseas borrar al voluntario: {{ $voluntario->nombre }} {{ $voluntario->apellido_paterno }} {{ $voluntario->apellido_materno }}?')" class="btn btn-outline-danger" type="submit" value="Borrar">
                                </input>
                              </form>
                               <a href="{{url('/voluntarios/'.$voluntario->rut_voluntario.'/edit')}}" class="btn btn-outline-warning" type="submit" >Editar
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


<form method="post" action="{{ route('voluntarios.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
  <!-- Modal emprendedores -->
  <div class="modal fade" id="voluntariosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingreso de voluntario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 
@if($errors->any())
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-2">
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
    <input id="txtRut_Voluntario" class="form-control form-control-md rounded-0" type="text" name="txtRut_Voluntario">
  </div>
  <!-- End Text Input -->
<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Nombre:</label>
    <input id="txtNombre" class="form-control form-control-md rounded-0" type="text" name="txtNombre" value="{{ old('txtNombre') }}">
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
            <input type="submit" name="btnAgregar_voluntario" id="btnAgregar_voluntario" class="btn btn-success" value="Agregar" />
           </div>
            <button type="button" id="btnCancelar_proyecto" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
           </div>
      </div>
    </div>
  </div>
</form>
{{ $voluntarios->links() }}
      </section>
      <!-- End Section Content -->

@endsection
