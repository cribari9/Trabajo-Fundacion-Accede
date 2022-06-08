@extends('layouts.adminapp')

@section('scripts')
@endsection

@section('content')

      <!-- Section Content -->
      <section id="voluntario" class="g-bg-gray-light-v5 g-py-100">
       
         

<form method="post" action="{{url('/voluntarios/'.$voluntario->rut_voluntario)}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH')}}
            
  <!-- Modal emprendedores -->
  <div  id="voluntarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edición de voluntario con ID: {{$voluntario->rut_voluntario}}</h5>
        </div>
        <div class="modal-body"> 


<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Nombre:</label>
    
    @if($errors->has('nombre'))
        <input id="nombre" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$voluntario->nombre}}" name="nombre">
        <div class="invalid-feedback">
          {{$errors->first('nombre')}}
        </div>
    @else
      <input id="nombre" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$voluntario->nombre}}" name="nombre">
    @endif
  </div>
  <!-- End Text Input -->

 <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Apellido paterno:</label>
    
    @if($errors->has('apellido_paterno'))
        <input id="apellido_paterno" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$voluntario->apellido_paterno}}" name="apellido_paterno">
        <div class="invalid-feedback">
          {{$errors->first('apellido_paterno')}}
        </div>
    @else
      <input id="apellido_paterno" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$voluntario->apellido_paterno}}" name="apellido_paterno">
    @endif
  </div>
  <!-- End Text Input -->
    <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Apellido materno:</label>
    
    @if($errors->has('apellido_materno'))
        <input id="apellido_materno" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$voluntario->apellido_materno}}" name="apellido_materno">
        <div class="invalid-feedback">
          {{$errors->first('apellido_materno')}}
        </div>
    @else
      <input id="apellido_materno" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$voluntario->apellido_materno}}" name="apellido_materno">
    @endif
  </div>
  <!-- End Text Input -->
   <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Teléfono:</label>
    
    @if($errors->has('telefono'))
        <input id="telefono" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$voluntario->telefono}}" name="telefono">
        <div class="invalid-feedback">
          {{$errors->first('telefono')}}
        </div>
    @else
      <input id="telefono" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$voluntario->telefono}}" name="telefono">
    @endif
  </div>
  <!-- End Text Input -->
<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Correo:</label>
    
    @if($errors->has('correo'))
        <input id="correo" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$voluntario->correo}}" name="correo">
        <div class="invalid-feedback">
          {{$errors->first('correo')}}
        </div>
    @else
      <input id="correo" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$voluntario->correo}}" name="correo">
    @endif
  </div>
  <!-- End Text Input -->
 
 <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Edad:</label>
    
    @if($errors->has('edad'))
        <input id="edad" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$voluntario->edad}}" name="edad">
        <div class="invalid-feedback">
          {{$errors->first('edad')}}
        </div>
    @else
      <input id="edad" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$voluntario->edad}}" name="edad">
    @endif
  </div>
  <!-- End Text Input -->
   <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Región:</label>
    <input id="region" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$voluntario->region}}" name="region">
  </div>
  <!-- End Text Input -->
  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Ocupación:</label>
    <input id="ocupacion" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$voluntario->ocupacion}}" name="ocupacion">
  </div>
  <!-- End Text Input -->
           

   
         

        </div>
        <div class="modal-footer">
            
           <div class="form-group text-center">
            <input type="submit" name="editar_voluntario" class="btn btn-success" value="Editar" />
           </div>
           
      </div>
    </div>
  </div>
</form>
      </section>
      <!-- End Section Content -->

@endsection
