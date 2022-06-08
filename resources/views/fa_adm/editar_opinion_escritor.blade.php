@extends('layouts.escritor')

@section('scripts')
@endsection

@section('content')

      <!-- Section Content -->
      <section id="opiniones" class="g-bg-gray-light-v5 g-py-100">
       
         

<form method="post" action="{{url('/opiniones/'.$opinion->id_opinion)}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH')}}
  <!-- Modal emprendedores -->
  <div  id="opinionesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edición de opinion con ID: {{$opinion->id_opinion}}</h5>
        </div>
        <div class="modal-body"> 

<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Nombre del autor:</label>
    <input id="autor" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$opinion->autor}}" name="autor" readonly>
  </div>
  <!-- End Text Input -->

<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Título:</label>
    <input id="titulo" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$opinion->titulo}}" name="titulo">
  </div>
  <!-- End Text Input -->

   <!-- Textarea -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup2_1">Contenido:</label>
    <textarea id="contenido" class="g-color-black form-control form-control-md g-resize-none rounded-0" rows="3"  name="contenido">{{$opinion->contenido}}</textarea>
  </div>
  <!-- End Textarea -->

    <!-- Textarea -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup2_1">Descripción:</label>
    <textarea id="descripcion" class="g-color-black form-control form-control-md g-resize-none rounded-0" rows="3"  name="descripcion">{{$opinion->descripcion}}</textarea>
  </div>
  <!-- End Textarea -->
  
    <!-- Advanced File Input -->
  <div class="form-group mb-0">
    <label class="g-mb-10">Imagen de portada guardada</label>
    <img class="img-thumbnail img-fluid" src="{{URL::to('assets/img/opiniones')}}/{{$opinion->portada}}" style="height: 80px;" alt="Image description">
    <br>
    <label class="g-mb-10">Nueva imagen de portada</label>
    <input class="js-file-attachment" type="file" name="portada" id="portada">
  </div>
  <!-- End Advanced File Input -->

  <!-- Advanced File Input -->
  <div class="form-group mb-0">
    <label class="g-mb-10">Imagen guardada</label>
    <img class="img-thumbnail img-fluid" src="{{URL::to('assets/img/opiniones')}}/{{$opinion->imagen}}" style="height: 80px;" alt="Image description">
    <br>
    <label class="g-mb-10">Nueva imagen</label>
    <input class="js-file-attachment" type="file" name="imagen" id="imagen">
  </div>
  <!-- End Advanced File Input -->

           

              <!-- Input with Autocomplete -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="autocomplete1">Video:</label>
    <input id="video" class="g-color-black form-control form-control-md rounded-0" type="URL" placeholder="Ej: https://www.youtube.com/watch?v=PO-DmjDAqQo&t=7s" data-url="../../../assets/include/ajax/autocomplete-data-1.json" value="https://www.youtube.com/watch?v={{$opinion->video}}" name="video">
    <small class="form-text text-muted g-font-size-default g-mt-10">
          <strong>Nota:</strong> Ingresar link completo de youtube.
        </small>
  </div>
  <!-- End Input with Autocomplete --> 
   
         

        </div>
        <div class="modal-footer">
            
           <div class="form-group text-center">
            <input type="submit" name="editar_opinion" class="btn btn-success" value="Editar" />
           </div>
           
      </div>
    </div>
  </div>
</form>
      </section>
      <!-- End Section Content -->

@endsection
