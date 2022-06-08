@extends('layouts.adminapp')

@section('scripts')

<script >

      document.addEventListener('DOMContentLoaded', function() {$.HSCore.components.HSDatepicker.init('#datepickerFrom,#datepickerTo');});

        
    </script>

@endsection

@section('content')

      <!-- Section Content -->
      <section id="evento" class="g-bg-gray-light-v5 g-py-100">
       
         
  

<form method="post" action="{{url('/eventos/'.$evento->id_evento)}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH')}}
  <!-- Modal emprendedores -->
  <div  id="eventoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edición de evento con ID: {{$evento->id_evento}}</h5>
        </div>
        <div class="modal-body"> 

<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Nombre:</label>
    
    @if($errors->has('nombre'))
        <input id="nombre" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$evento->nombre}}" name="nombre">
        <div class="invalid-feedback" >
          {{$errors->first('nombre')}}
        </div>
    @else
      <input id="nombre" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$evento->nombre}}" name="nombre">
    @endif
  </div>
  <!-- End Text Input -->


   <!-- Textarea -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup2_1">Descripción:</label>
    
    @if($errors->has('descripcion'))
        <textarea id="descripcion" class="g-color-black form-control form-control-md g-resize-none rounded-0 is-invalid" rows="3"  name="descripcion">{{$evento->descripcion}}</textarea>
        <div class="invalid-feedback">
          {{$errors->first('descripcion')}}
        </div>
    @else
      <textarea id="descripcion" class="g-color-black form-control form-control-md g-resize-none rounded-0" rows="3"  name="descripcion">{{$evento->descripcion}}</textarea>
    @endif
  </div>
  <!-- End Textarea -->
 <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Responsable:</label>
    
    @if($errors->has('responsable'))
        <input id="responsable" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$evento->responsable}}" name="responsable">
        <div class="invalid-feedback" >
          {{$errors->first('responsable')}}
        </div>
    @else
      <input id="responsable" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$evento->responsable}}" name="responsable">
    @endif
  </div>
  <!-- End Text Input -->
<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Correo de contacto:</label>
    
    @if($errors->has('email_contacto'))
        <input id="email_contacto" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$evento->email_contacto}}" name="email_contacto">
        <div class="invalid-feedback" >
          {{$errors->first('email_contacto')}}
        </div>
    @else
      <input id="email_contacto" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$evento->email_contacto}}" name="email_contacto">
    @endif
  </div>
  <!-- End Text Input -->


  <!-- Select Date Range -->
  <div class="form-group mb-0">
    <div class="row">
      <div class="col-xl-4 g-mb-40 g-mb-0--xl">
        <!-- Datepicker --> 
<label class="g-mb-10" for="inputGroup1_1">Fecha de inicio:</label>
        <div class="input-group g-brd-primary--focus">

          
          @if($errors->has('fecha_inicio'))
        <input id="datepickerFrom" class="g-color-black form-control form-control-md u-datepicker-v1 rounded-0 is-invalid" type="text" placeholder="Fecha de inicio" value="{{$datos_fecha_inicio}}" data-range="true" data-to="datepickerTo" name="fecha_inicio">
        <div class="invalid-feedback" >
          {{$errors->first('fecha_inicio')}}
        </div>
        @else
          <input id="datepickerFrom" class="g-color-black form-control form-control-md u-datepicker-v1 rounded-0" type="text" placeholder="Fecha de inicio" value="{{$datos_fecha_inicio}}" data-range="true" data-to="datepickerTo" name="fecha_inicio">
        @endif
        </div>
        <!-- End Datepicker -->
      </div>

      <div class="col-xl-4 g-mb-40 g-mb-0--xl">
        <!-- Datepicker -->          <label class="g-mb-10" for="inputGroup1_1">Fecha de término:</label>

        <div class="input-group g-brd-primary--focus">
          
         @if($errors->has('fecha_termino'))
        <input id="datepickerTo" class="g-color-black form-control form-control-md u-datepicker-v1 rounded-0 is-invalid" type="text" placeholder="Fecha de término" value="{{$datos_fecha_termino}}" name="fecha_termino">
        <div class="invalid-feedback" >
          {{$errors->first('fecha_termino')}}
        </div>
        @else
          <input id="datepickerTo" class="g-color-black form-control form-control-md u-datepicker-v1 rounded-0" type="text" placeholder="Fecha de término" value="{{$datos_fecha_termino}}" name="fecha_termino">
        @endif
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
          
          @if($errors->has('hora_inicio'))
        <input class="g-color-black form-control rounded-0 form-control-md is-invalid" type="time" value="{{$evento->hora_inicio}}" id="hora_inicio-time-input" name="hora_inicio">
        <div class="invalid-feedback" >
          {{$errors->first('hora_inicio')}}
        </div>
        @else
          <input class="g-color-black form-control rounded-0 form-control-md" type="time" value="{{$evento->hora_inicio}}" id="hora_inicio-time-input" name="hora_inicio">
        @endif
        </div>
        <!-- End Datepicker -->
      </div>

      <div class="col-xl-4">
        <!-- Datepicker --><label class="g-mb-10" for="inputGroup1_1">Hora de término:</label>
        <div class="input-group g-brd-primary--focus">
          
          @if($errors->has('hora_termino'))
        <input class="g-color-black form-control rounded-0 form-control-md is-invalid" type="time" value="{{$evento->hora_termino}}" id="hora_termino" name="hora_termino">
        <div class="invalid-feedback" >
          {{$errors->first('hora_termino')}}
        </div>
        @else
          <input class="g-color-black form-control rounded-0 form-control-md" type="time" value="{{$evento->hora_termino}}" id="hora_termino" name="hora_termino">
        @endif
        </div>
        <!-- End Datepicker -->
      </div>
    </div>
  </div>
  <!-- End Select Date Range -->



  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Inscritos:</label>
    
    @if($errors->has('inscritos'))
        <input id="inscritos" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$evento->inscritos}}" name="inscritos">
        <div class="invalid-feedback" >
          {{$errors->first('inscritos')}}
        </div>
        @else
          <input id="inscritos" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$evento->inscritos}}" name="inscritos">
        @endif
  </div>
  <!-- End Text Input -->
  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Capacidad:</label>
    
    @if($errors->has('capacidad'))
        <input id="capacidad" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$evento->capacidad}}" name="capacidad">
        <div class="invalid-feedback" >
          {{$errors->first('capacidad')}}
        </div>
        @else
          <input id="capacidad" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$evento->capacidad}}" name="capacidad">
        @endif
  </div>
  <!-- End Text Input -->
 <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Lugar:</label>
    <input id="lugar" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$evento->lugar}}" name="lugar">
  </div>
  <!-- End Text Input -->

  <!-- Advanced File Input -->
  <div class="form-group mb-0">
    <label class="g-mb-10">Imagen guardada</label>
    <img class="img-thumbnail img-fluid" src="{{URL::to('assets/img/eventos')}}/{{$evento->imagen}}" style="height: 80px;" alt="Image description">
    <br>
    <label class="g-mb-10">Nueva imagen</label>
    
    @if($errors->has('imagen'))
        <input class="js-file-attachment is-invalid" type="file" name="imagen" id="imagen">
        <div class="invalid-feedback" >
          {{$errors->first('imagen')}}
        </div>
        @else
          <input class="js-file-attachment" type="file" name="imagen" id="imagen">
        @endif
  </div>
  <!-- End Advanced File Input -->

           

              <!-- Input with Autocomplete -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="autocomplete1">Video:</label>
    
     @if($errors->has('video'))
        <input id="video" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="URL" placeholder="Ej: https://www.youtube.com/watch?v=PO-DmjDAqQo&t=7s" data-url="../../../assets/include/ajax/autocomplete-data-1.json" value="https://www.youtube.com/watch?v={{$evento->video}}" name="video">
        <div class="invalid-feedback" >
          {{$errors->first('video')}}
        </div>
        @else
          <input id="video" class="g-color-black form-control form-control-md rounded-0" type="URL" placeholder="Ej: https://www.youtube.com/watch?v=PO-DmjDAqQo&t=7s" data-url="../../../assets/include/ajax/autocomplete-data-1.json" value="https://www.youtube.com/watch?v={{$evento->video}}" name="video">
        @endif
    <small class="form-text text-muted g-font-size-default g-mt-10">
          <strong>Nota:</strong> Ingresar link completo de youtube.
        </small>
  </div>
  <!-- End Input with Autocomplete --> 
   
         

        </div>
        <div class="modal-footer">
            
           <div class="form-group text-center">
            <input type="submit" name="editar_evento" class="btn btn-success" value="Editar" />
           </div>
           
      </div>
    </div>
  </div>
</form>
      </section>
      <!-- End Section Content -->

@endsection
