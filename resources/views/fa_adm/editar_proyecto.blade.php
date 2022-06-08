@extends('layouts.adminapp')

@section('scripts')


@endsection

@section('content')

      <!-- Section Content -->
      <section id="proyectos" class="g-bg-gray-light-v5 g-py-100">
       
         

<form method="post" action="{{url('/proyectos/'.$proyecto->id_proyecto)}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH')}}
  <!-- Modal emprendedores -->
  <div  id="proyectosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edición de proyecto con ID: {{$proyecto->id_proyecto}}</h5>
        </div>
        <div class="modal-body"> 

<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Nombre:</label>
    
    @if($errors->has('nombre'))
        <input id="nombre" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$proyecto->nombre}}" name="nombre">
        <div class="invalid-feedback">
          {{$errors->first('nombre')}}
        </div>
    @else
      <input id="nombre" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$proyecto->nombre}}" name="nombre">
    @endif
  </div>
  <!-- End Text Input -->


   <!-- Textarea -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup2_1">Descripción:</label>
    
    @if($errors->has('descripcion'))
        <textarea id="descripcion" class="g-color-black form-control form-control-md g-resize-none rounded-0 is-invalid" rows="3"  name="descripcion" >{{$proyecto->descripcion}}</textarea>
        <div class="invalid-feedback">
          {{$errors->first('descripcion')}}
        </div>
    @else
      <textarea id="descripcion" class="g-color-black form-control form-control-md g-resize-none rounded-0" rows="3"  name="descripcion">{{$proyecto->descripcion}}</textarea>
    @endif
  </div>
  <!-- End Textarea -->

 <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Lugar:</label>
    
    @if($errors->has('lugar'))
        <input id="lugar" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$proyecto->lugar}}" name="lugar">
        <div class="invalid-feedback" >
          {{$errors->first('lugar')}}
        </div>
    @else
      <input id="lugar" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$proyecto->lugar}}" name="lugar">
    @endif
  </div>
  <!-- End Text Input -->

<!-- Select Date Range -->
  <div class="form-group mb-0">
    <div class="row">
      <div class="col-xl-6 g-mb-40 g-mb-0--xl">
        <!-- Datepicker --> 
<label class="g-mb-10" for="inputGroup1_1">Fecha:</label>
        <div class="input-group g-brd-primary--focus">

          
        @if($errors->has('fecha'))
        <input id="datepickerFrom" class="g-color-black form-control form-control-md u-datepicker-v1 rounded-0 is-invalid" type="month" placeholder="Fecha" value="{{$datos_fecha}}" data-range="true" data-to="datepickerTo" name="fecha" >
        <div class="invalid-feedback" >
          {{$errors->first('fecha')}}
        </div>
    @else
      <input id="datepickerFrom" class="g-color-black form-control form-control-md u-datepicker-v1 rounded-0" type="month" placeholder="Fecha" value="{{$datos_fecha}}" data-range="true" data-to="datepickerTo" name="fecha">
    @endif

        </div>
        <!-- End Datepicker -->
      </div>
      </div>
      </div>
<br>
  <!-- Advanced File Input -->
  <div class="form-group mb-0">
    <label class="g-mb-10">Imagen guardada</label>
    <img class="img-thumbnail img-fluid" src="{{URL::to('assets/img/proyectos')}}/{{$proyecto->imagen}}" style="height: 80px;" alt="Image description">
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
    <input id="video" class="g-color-black form-control form-control-md rounded-0" type="URL" placeholder="Ej: https://www.youtube.com/watch?v=PO-DmjDAqQo&t=7s" data-url="../../../assets/include/ajax/autocomplete-data-1.json" value="https://www.youtube.com/watch?v={{$proyecto->video}}" name="video">
    <small class="form-text text-muted g-font-size-default g-mt-10">
          <strong>Nota:</strong> Ingresar link completo de youtube.
        </small>
  </div>
  <!-- End Input with Autocomplete --> 
   
         

        </div>
        <div class="modal-footer">
            
           <div class="form-group text-center">
            <input type="submit" name="editar_proyecto" class="btn btn-success" value="Editar" />
           </div>
           
      </div>
    </div>
  </div>
</form>
      </section>
      <!-- End Section Content -->

@endsection
