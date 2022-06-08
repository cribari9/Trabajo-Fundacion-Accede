@extends('layouts.adminapp')

@section('scripts')

@endsection

@section('content')

      <!-- Section Content -->
      <section id="proyectos" class="g-bg-gray-light-v5 g-py-100">
        <div class="container g-max-width-780 text-center g-mb-60">
          <div class="text-center u-heading-v8-1 g-mb-35">
            <h2 class="h3 text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-26 mb-0">Inscritos
              <strong class="g-bg-gray-dark-v1 g-color-teal">del evento: </strong> {{$evento->nombre}}</h2>
          </div>
        </div>

        <div class="container">
          <div class="shortcode-html">
                  <!-- Table Bordered -->
                  <div class="card g-brd-teal rounded-0 g-mb-30">
                    <h3 class="card-header g-bg-teal g-brd-transparent g-color-white g-font-size-16 rounded-0 mb-0">
                      <i class="fa fa-tasks g-mr-5"></i>
                      Personas inscritas por formulario en el sitio web.
                    </h3>

                    <div class="card-block table-responsive g-pa-15">
                      <table class="table table-bordered u-table--v1 mb-0">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Acción</th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($inscritos as $inscrito)
                          <tr>
                            <td>{{$inscrito->nombre}}</td>
                            <td>{{$inscrito->apellido_paterno}} {{$inscrito->apellido_materno}}</td>
                            <td>{{$inscrito->telefono}}</td>
                            <td>{{$inscrito->correo}}</td>
                            <td>
                              <form action="{{url('/inscritos/'.$inscrito->id_inscrito)}}" method="post" class="d-inline">
                                @csrf
                                {{method_field('DELETE')}}
                                <input onclick="return confirm('¿Deseas borrar a: {{$inscrito->nombre}}?')" class="btn btn-outline-danger" type="submit" value="Borrar">
                                </input>
                              </form>
        
                            </td>
                          </tr>
                @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- End Table Bordered -->
        </div>

{{ $inscritos->links() }}
      </section>
      <!-- End Section Content -->

@endsection
