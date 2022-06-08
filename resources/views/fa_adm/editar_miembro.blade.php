@extends('layouts.adminapp')

@section('scripts')

<script type="text/javascript">
  function validar() {
  // Obtener nombre de archivo
  let archivo = document.getElementById('archivo').value,
  // Obtener extensión del archivo
      extension = archivo.substring(archivo.lastIndexOf('.'),archivo.length);
  // Si la extensión obtenida no está incluida en la lista de valores
  // del atributo "accept", mostrar un error.
  if(document.getElementById('archivo').getAttribute('accept').split(',').indexOf(extension) < 0) {
    alert('Archivo inválido. No se permite la extensión ' + extension);
  }
  }
</script>
@endsection

@section('content')

      <!-- Section Content -->
      <section id="miembro" class="g-bg-gray-light-v5 g-py-100">
       
         

<form method="post" action="{{url('/nosotros/'.$miembro->rut_miembro)}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH')}}
  <!-- Modal emprendedores -->
  <div  id="miembroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edición de miembro con ID: {{$miembro->rut_miembro}}</h5>
        </div>
        <div class="modal-body"> 

<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Nombre:</label>
    
    @if($errors->has('nombre'))
        <input id="nombre" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$miembro->nombre}}" name="nombre">
        <div class="invalid-feedback">
          {{$errors->first('nombre')}}
        </div>
    @else
      <input id="nombre" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$miembro->nombre}}" name="nombre">
    @endif
  </div>
  <!-- End Text Input -->
 <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Apellido paterno:</label>
    
    @if($errors->has('apellido_paterno'))
        <input id="apellido_paterno" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$miembro->apellido_paterno}}" name="apellido_paterno">
        <div class="invalid-feedback">
          {{$errors->first('apellido_paterno')}}
        </div>
    @else
      <input id="apellido_paterno" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$miembro->apellido_paterno}}" name="apellido_paterno">
    @endif
  </div>
  <!-- End Text Input -->
   <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Apellido materno:</label>
    
    @if($errors->has('apellido_materno'))
        <input id="apellido_materno" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$miembro->apellido_materno}}" name="apellido_materno">
        <div class="invalid-feedback">
          {{$errors->first('apellido_materno')}}
        </div>
    @else
      <input id="apellido_materno" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$miembro->apellido_materno}}" name="apellido_materno">
    @endif
  </div>
  <!-- End Text Input -->
<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Teléfono:</label>
    
    @if($errors->has('telefono'))
        <input id="telefono" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$miembro->telefono}}" name="telefono">
        <div class="invalid-feedback">
          {{$errors->first('telefono')}}
        </div>
    @else
      <input id="telefono" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$miembro->telefono}}" name="telefono">
    @endif
  </div>
  <!-- End Text Input -->
  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Cargo:</label>
    <input id="cargo" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$miembro->cargo}}" name="cargo">
  </div>
  <!-- End Text Input -->
   <!-- Textarea -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup2_1">Descripción:</label>
    <textarea id="descripcion" class="g-color-black form-control form-control-md g-resize-none rounded-0" rows="3"  name="descripcion">{{$miembro->descripcion}}</textarea>
  </div>
  <!-- End Textarea -->
 
<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Correo de contacto:</label>
    
    @if($errors->has('correo'))
        <input id="correo" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$miembro->correo}}" name="correo">
        <div class="invalid-feedback">
          {{$errors->first('correo')}}
        </div>
    @else
      <input id="correo" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$miembro->correo}}" name="correo">
    @endif
  </div>
  <!-- End Text Input -->
  
  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Facebook:</label>
    <input id="facebook" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$miembro->facebook}}" name="facebook">
  </div>
  <!-- End Text Input -->
  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Twitter:</label>
    <input id="twitter" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$miembro->twitter}}" name="twitter">
  </div>
  <!-- End Text Input -->
 <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Linkedin:</label>
    <input id="linkedin" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$miembro->linkedin}}" name="linkedin">
  </div>
  <!-- End Text Input -->

  <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Instagram:</label>
    <input id="instagram" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$miembro->instagram}}" name="instagram">
  </div>
  <!-- End Text Input -->

  <!-- Advanced File Input -->
  <div class="form-group mb-0">
    <label class="g-mb-10">Foto guardada</label>
    <img class="img-thumbnail img-fluid" src="{{URL::to('assets/img/nosotros')}}/{{$miembro->foto}}" style="height: 80px;" alt="Image description">
    <br>
    <label class="g-mb-10">Nueva foto</label>
    
    @if($errors->has('foto'))
        <input class="js-file-attachment is-invalid" type="file" name="foto" id="foto">
        <div class="invalid-feedback">
          {{$errors->first('foto')}}
        </div>
    @else
      <input class="js-file-attachment" type="file" name="foto" id="foto">
    @endif
  </div>
  <!-- End Advanced File Input -->

           
         

        </div>
        <div class="modal-footer">
            
           <div class="form-group text-center">
            <input type="submit" name="editar_miembro" class="btn btn-success" value="Editar" />
           </div>
           
      </div>
    </div>
  </div>
</form>
      </section>
      <!-- End Section Content -->

@endsection
