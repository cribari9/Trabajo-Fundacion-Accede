@extends('layouts.adminapp')

@section('scripts')

<script >

      document.addEventListener('DOMContentLoaded', function() {
        
       

        $('#ver_imagen_1').click(function(){
              $('#modal_imagen_1').modal('toggle');
        });
        $('#ver_imagen_2').click(function(){
              $('#modal_imagen_2').modal('toggle');
        });
        $('#ver_imagen_3').click(function(){
              $('#modal_imagen_3').modal('toggle');
        });


     });

    </script>

@endsection

@section('content')

    
        
       <!-- Section Content -->
      <section id="fundacions" class="g-bg-gray-light-v5 g-py-100">
        <div class="container g-max-width-780 text-center g-mb-60">
          <div class="text-center u-heading-v8-1 g-mb-35">
            <h2 class="h3 text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-26 mb-0">Edición
              <strong class="g-bg-gray-dark-v1 g-color-yellow">sección</strong> Inicio</h2>
          </div>
          <a id="btnAgregar" href="{{url('/welcome/'.$fundacion->id_fundacion.'/edit')}}" class="btn btn-md u-btn-outline-yellow u-btn-hover-v2-3 g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10 g-mb-15" type="submit"> Editar fundacion
          <i class="fa fa-edit g-ml-3"></i>
        </a>
     
        </div>

        <div class="container">
          <div class="shortcode-html">
                  <!-- Table Bordered -->
                  <div class="card g-brd-yellow rounded-0 g-mb-30">
                    <h3 class="card-header g-bg-yellow g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0">
                      <i class="fa fa-tasks g-mr-5"></i>
                      Inicio
                    </h3>

                    <div class="card-block table-responsive g-pa-15">
                      <table class="table table-bordered u-table--v1 mb-0">
                        <thead>
                          <tr>
                            <th>Datos</th>
                            <th>Contenido</th>
                          </tr>
                        </thead>

                        <tbody>
                      
                          <tr>
                            <td>Dirección</td>
                            <td>{{$fundacion->direccion}}</td>
                          </tr>
                          <tr>
                            <td>Telefono 1</td>
                            <td>{{$fundacion->telefono1}}</td>
                          </tr>
                          <tr>
                            <td>Telefono 2</td>
                            <td>{{$fundacion->telefono2}}</td>
                          </tr>
                          <tr>
                            <td>Facebook</td>
                            <td>{{$fundacion->facebook}}</td>
                          </tr>
                          <tr>
                            <td>Twitter</td>
                            <td>{{$fundacion->twitter}}</td>
                          </tr>
                          <tr>
                            <td>Instagram</td>
                            <td>{{$fundacion->instagram}}</td>
                          </tr>
                          <tr>
                            <td>Youtube</td>
                            <td>{{$fundacion->youtube}}</td>
                          </tr>
                          <tr>
                            <td>Linkedin</td>
                            <td>{{$fundacion->linkedin}}</td>
                          </tr>
                          <tr>
                            <td>Correo 1</td>
                            <td>{{$fundacion->correo1}}</td>
                          </tr>
                          <tr>
                            <td>Correo 2</td>
                            <td>{{$fundacion->correo2}}</td>
                          </tr>
                          <tr>
                            <td>Misión</td>
                            <td>{{$fundacion->mision}}</td>
                          </tr>
                          <tr>
                            <td>Visión</td>
                            <td>{{$fundacion->vision}}</td>
                          </tr>
                          <tr>
                            <td>Imagen de portada 1 <button id="ver_imagen_1" href="#" value="Ver" class="btn btn-outline-success">
                               
                                  <i class="fa fa-eye"></i>
                                  Ver
                                
                               </button></td>
                            <td>{{$fundacion->imagen1}}</td>
                          </tr>
                          <tr>
                            <td>Imagen de portada 2 <button id="ver_imagen_2" href="#" value="Ver" class="btn btn-outline-success">
                               
                                  <i class="fa fa-eye"></i>
                                  Ver
                                
                               </button></td>
                            <td>{{$fundacion->imagen2}}</td>
                          </tr>
                          <tr>
                            <td>Imagen de haz tu aporte <button id="ver_imagen_3" href="#" value="Ver" class="btn btn-outline-success">
                               
                                  <i class="fa fa-eye"></i>
                                  Ver
                                
                               </button></td>
                            <td>{{$fundacion->imagen3}}</td>
                          </tr>
              
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- End Table Bordered -->
        </div>


      <div id="modal_imagen_1" class="modal fade " role="dialog">  
      <div class="modal-dialog">
          <div class="modal-content">      
              <div class="modal-header">               
                  <h4 class="modal-title">Imagen de portada 1</h4>      </div>      
              <div class="modal-body"><img src="{{URL::to('assets/img/inicio')}}/{{$fundacion->imagen1}}" class="img-rounded" alt="Cinque Terre" width="304" height="236" />   </div>      
              <div class="modal-footer">        
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>     
              </div>  
          </div>  
      </div>
      </div>
      <div id="modal_imagen_2" class="modal fade " role="dialog">  
      <div class="modal-dialog">
          <div class="modal-content">      
              <div class="modal-header">               
                  <h4 class="modal-title">Imagen de portada 2</h4>      </div>      
              <div class="modal-body"><img src="{{URL::to('assets/img/inicio')}}/{{$fundacion->imagen2}}" class="img-rounded" alt="Cinque Terre" width="304" height="236" />   </div>      
              <div class="modal-footer">        
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>     
              </div>  
          </div>  
      </div>
      </div>
      <div id="modal_imagen_3" class="modal fade " role="dialog">  
      <div class="modal-dialog">
          <div class="modal-content">      
              <div class="modal-header">               
                  <h4 class="modal-title">Imagen de "Haz tu aporte"</h4>      </div>      
              <div class="modal-body"><img src="{{URL::to('assets/img/inicio')}}/{{$fundacion->imagen3}}" class="img-rounded" alt="Cinque Terre" width="304" height="236" />   </div>      
              <div class="modal-footer">        
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>     
              </div>  
          </div>  
      </div>
      </div>

      </section>
      <!-- End Section Content -->

@endsection
