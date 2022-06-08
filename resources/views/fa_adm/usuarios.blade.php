@extends('layouts.adminapp')

@section('scripts')
<script >

      document.addEventListener('DOMContentLoaded', function() {
        
       

        $('#btnAgregar_Usuario').click(function(){
              $('#usuariosModal').modal('toggle');
        });
        


     });

    </script>
@endsection

@section('content')

 <!-- Section Content -->
      <section id="opiniones" class="g-bg-gray-light-v5 g-py-100">
 	<div class="container g-max-width-780 text-center g-mb-60">
          <div class="text-center u-heading-v8-1 g-mb-35">
            <h2 class="h3 text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-26 mb-0">Control
              <strong class="g-bg-gray-dark-v1 g-color-purple">de</strong> Usuarios</h2>
          </div>

        </div>
        <div class="text-center">
        <button id="btnAgregar_Usuario" href="#" class="btn btn-md u-btn-outline-purple u-btn-hover-v2-3 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-15"> Agregar usuario
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
          <div class="container">
          <div class="shortcode-html">
                  <!-- Table Bordered -->
                  <div class="card g-brd-purple rounded-0 g-mb-30">
                    <h3 class="card-header g-bg-purple g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0">
                      <i class="fa fa-users g-mr-5"></i>
                      Usuarios
                    </h3>

                    <div class="card-block table-responsive g-pa-15">
                      <table class="table table-bordered u-table--v1 mb-0">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th>Acción</th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($usuarios as $usuario)
                          <tr>
                            <td>{{$usuario->id}}</td>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->email}}</td>
                            @if($usuario->role_id=='2')         
                                  <td>Administrador</td>        
                            @else
                                   <td>Usuario escritor</td>      
                            @endif
                           
                            <td>
                              <form action="{{url('/usuarios/'.$usuario->id)}}" method="post" class="d-inline">
                                @csrf
                                {{method_field('DELETE')}}
                                <input onclick="return confirm('¿Deseas borrar a: {{$usuario->name}} con correo {{$usuario->email}}?')" class="btn btn-outline-danger" type="submit" value="Borrar">
                                </input>
                              </form>
                               <a href="{{url('/usuarios/'.$usuario->id.'/edit')}}" class="btn btn-outline-warning" type="submit" >Editar
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


<form method="post" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
  <!-- Modal emprendedores -->
  <div class="modal fade" id="usuariosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingreso de Usuario</h5>
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

  <!-- End Text Input -->
<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



  <label class="g-mb-10" for="inputGroup1_1">Rol:</label>
  <div class="btn-group justified-content">
    <label class="u-check">
      <input id="escritor" name="rol" value="1" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroupBtn1_1" type="radio" checked="">
      <span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">Usuario escritor</span>
    </label>

    <label class="u-check">
      <input id="admin" name="rol" value="2" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroupBtn1_1" type="radio">
      <span class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">Administrador</span>
    </label>
  </div>



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
{{ $usuarios->links() }}
      </section>
      <!-- End Section Content -->

@endsection
