@extends('layouts.adminapp')

@section('scripts')
@endsection

@section('content')

      <!-- Section Content -->
      <section id="usuarios" class="g-bg-gray-light-v5 g-py-100">
       
         

<form method="post" action="{{url('/usuarios/'.$usuario->id)}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('PATCH')}}
  <!-- Modal emprendedores -->
  <div  id="usuariosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edición de usuario con ID: {{$usuario->id}}</h5>
        </div>
        <div class="modal-body"> 

<!-- Text Input -->
  <div class="form-group g-mb-20">
    <label class="g-mb-10" for="inputGroup1_1">Nombre:</label>
    
     @if($errors->has('name'))
        <input id="name" class="g-color-black form-control form-control-md rounded-0 is-invalid" type="text" value="{{$usuario->name}}" name="name" >
        <div class="invalid-feedback">
          {{$errors->first('name')}}
        </div>
    @else
      <input id="name" class="g-color-black form-control form-control-md rounded-0" type="text" value="{{$usuario->name}}" name="name" >
    @endif
  </div>
  <!-- End Text Input -->



 <!-- Text Input -->
  <div class="form-group g-mb-20">
    <label for="inputGroup1_1" class="g-mb-10">Correo</label>

                            
                                

                                @if($errors->has('email'))
        <input id="email" type="email" class="g-color-black form-control form-control-md rounded-0 is-invalid" name="email" value="{{$usuario->email}}" >
        <div class="invalid-feedback">
          {{$errors->first('email')}}
        </div>
    @else
      <input id="email" type="email" class="g-color-black form-control form-control-md rounded-0" name="email" value="{{$usuario->email}}" >
    @endif
                          
  </div>
  <!-- End Text Input -->

           

              <!-- Input with Autocomplete -->
  <div class="form-group g-mb-20">
    <label for="inputGroup1_1" class="g-mb-10">Contraseña</label>

                         
                                <input id="password" type="password" class="g-color-black form-control form-control-md rounded-0 " name="password">



  </div>
                            @if($usuario->role_id=='2')         
                                 
  <label class="g-mb-10" for="inputGroup1_1">Rol:</label>
  <div class="btn-group justified-content">
    <label class="u-check">
      <input id="normal" name="role_id" value="1" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroupBtn1_1" type="radio" >
      <span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">Usuario escritor</span>
    </label>

    <label class="u-check">
      <input id="admin" name="role_id" value="2" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroupBtn1_1" type="radio" checked="">
      <span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">Administrador</span>
    </label>
  </div>      
                            @else
                                   <label class="g-mb-10" for="inputGroup1_1">Rol:</label>
  <div class="btn-group justified-content">
    <label class="u-check">
      <input id="normal" name="role_id" value="1" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroupBtn1_1" type="radio" checked="">
      <span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">Usuario escritor</span>
    </label>

    <label class="u-check">
      <input id="admin" name="role_id" value="2" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroupBtn1_1" type="radio" >
      <span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">Administrador</span>
    </label>
  </div>          
                            @endif
  
   
         

        </div>
        <div class="modal-footer">
            
           <div class="form-group text-center">
            <input type="submit" name="editar_usuario" class="btn btn-success" value="Editar" />
           </div>
           
      </div>
    </div>
  </div>
</form>
      </section>
      <!-- End Section Content -->

@endsection
