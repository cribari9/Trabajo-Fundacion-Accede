@extends('layouts.adminapp')

@section('scripts')
@endsection

@section('content')

      <!-- Section Content -->
      <section id="fundacion" class="g-bg-gray-light-v5 g-py-100">
       
         

<form method="post" action="{{url('/welcome/'.$fundacion->id_fundacion)}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH')}}
  <!-- Modal emprendedores -->
  <div  id="fundacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edición de fundacion</h5>
        </div>
        <div class="modal-body"> 

<!-- Direccion Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Dirección:</label>
    @if($errors->has('direccion'))
        <input id="direccion" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$fundacion->direccion}}" name="direccion" required>
        <div class="invalid-feedback">
          {{$errors->first('direccion')}}
        </div>
    @else
      <input id="direccion" class="g-color-black form-control form-control-md rounded-0 " type="text" value="{{$fundacion->direccion}}" name="direccion">
    @endif
  </div>
  <!-- End Direccion Input -->

 <!-- Telefono 1 Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Teléfono 1:</label>

    @if($errors->has('telefono1'))
        <input id="telefono1" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$fundacion->telefono1}}" name="telefono1" required>
        <div class="invalid-feedback">
          {{$errors->first('telefono1')}}
        </div>
    @else
      <input id="telefono1" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$fundacion->telefono1}}" name="telefono1">
    @endif
  </div>
  <!-- End Telefono 1 Input -->

   <!-- Telefono 2 Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Teléfono 2:</label>
    
    @if($errors->has('telefono2'))
        <input id="telefono2" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$fundacion->telefono2}}" name="telefono2">
        <div class="invalid-feedback">
          {{$errors->first('telefono2')}}
       </div>
    @else
      <input id="telefono2" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$fundacion->telefono2}}" name="telefono2">
    @endif
  </div>
  <!-- End Telefono 2 Input -->

  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Facebook:</label>
    <input id="facebook" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$fundacion->facebook}}" name="facebook">
  </div>
  <!-- End Text Input -->
  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Twitter:</label>
    <input id="twitter" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$fundacion->twitter}}" name="twitter">
  </div>
  <!-- End Text Input -->

 <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Instagram:</label>
    <input id="instagram" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$fundacion->instagram}}" name="instagram">
  </div>
  <!-- End Text Input -->

   <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Youtube:</label>
    <input id="youtube" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$fundacion->youtube}}" name="youtube">
  </div>
  <!-- End Text Input -->

 <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Linkedin:</label>
    <input id="linkedin" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$fundacion->linkedin}}" name="linkedin">
  </div>
  <!-- End Text Input -->

  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Correo 1:</label>
    
    @if($errors->has('correo1'))
        <input id="correo1" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$fundacion->correo1}}" name="correo1" required>
        <div class="invalid-feedback">
          {{$errors->first('correo1')}}
        </div>
    @else
      <input id="correo1" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$fundacion->correo1}}" name="correo1">
    @endif
  </div>
  <!-- End Text Input -->

  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Correo 2:</label>
    <input id="correo2" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$fundacion->correo2}}" name="correo2">
  </div>
  <!-- End Text Input -->



<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Misión:</label>
    <input id="mision" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$fundacion->mision}}" name="mision">
  </div>
  <!-- End Text Input -->
  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Visión:</label>
    <input id="vision" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$fundacion->vision}}" name="vision">
  </div>
  <!-- End Text Input -->
    
  <!-- Advanced File Input -->
  <div class="form-group mb-0">
    <label class="g-mb-10">Imagen 1</label>
    <img class="img-thumbnail img-fluid" src="{{URL::to('assets/img/inicio')}}/{{$fundacion->imagen1}}" style="height: 80px;" alt="Image description">
    <br>
    <label class="g-mb-10">Nueva imagen 1</label>
    <input class="js-file-attachment" type="file" name="imagen1" id="imagen1">
  </div>
  <!-- End Advanced File Input -->

  <!-- Advanced File Input -->
  <div class="form-group mb-0">
    <label class="g-mb-10">Imagen 2</label>
    <img class="img-thumbnail img-fluid" src="{{URL::to('assets/img/inicio')}}/{{$fundacion->imagen2}}" style="height: 80px;" alt="Image description">
    <br>
    <label class="g-mb-10">Nueva imagen 2</label>
    <input class="js-file-attachment" type="file" name="imagen2" id="imagen2">
  </div>
  <!-- End Advanced File Input -->

  <!-- Advanced File Input -->
  <div class="form-group mb-0">
    <label class="g-mb-10">Imagen 3</label>
    <img class="img-thumbnail img-fluid" src="{{URL::to('assets/img/inicio')}}/{{$fundacion->imagen3}}" style="height: 80px;" alt="Image description">
    <br>
    <label class="g-mb-10">Nueva imagen 3</label>
    <input class="js-file-attachment" type="file" name="imagen3" id="imagen3">
  </div>
  <!-- End Advanced File Input -->

           
         

        </div>
        <div class="modal-footer">
            
           <div class="form-group text-center">
            <input type="submit" name="editar_fundacion" class="btn btn-success" value="Editar" />
           </div>
           
      </div>
    </div>
  </div>
</form>
      </section>
      <!-- End Section Content -->

@endsection
