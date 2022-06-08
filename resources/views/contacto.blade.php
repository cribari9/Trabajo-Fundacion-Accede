@extends('layouts.app')

@section('scripts')
@endsection

@section('content')
<!-- Promo Block -->
    <section class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall " data-options='{direction: "fromtop", animation_duration: 25, direction: "reverse"}'>
      <!-- Parallax Image -->
      <div class="divimage dzsparallaxer--target w-100 g-bg-cover g-bg-size-cover g-bg-pos-top-center g-bg-black-opacity-0_2--after" style="height: 140%; background-image: url(assets/img/inicio/portada_nosotros.jpeg);"></div>
      <!-- End Parallax Image -->

      <!-- Promo Block Content -->
      <div class="container g-color-white text-center g-pt-150 g-pb-200">
        <h3 class="h2 g-color-white g-font-weight-300 mb-0">Viniste al lugar correcto</h3>
        <h2 class="g-color-white g-font-weight-700 g-font-size-80 text-uppercase">Hablemos!</h2>
      </div>
      <!-- Promo Block Content -->
    </section>
    <!-- End Promo Block -->

    <!-- Contact Form -->
    <section class="container">
      <!-- Icon Blocks -->
      <div class="row no-gutters u-shadow-v21 g-mt-minus-100">
        <div class="col-sm-6 col-md-4 g-brd-right--md g-brd-gray-light-v4">
          <!-- Icon Blocks -->
          <div class="g-bg-white text-center g-py-100">
            <span class="u-icon-v1 u-icon-size--xl g-color-primary mb-3">
                <i class="fa fa-weixin"></i>
              </span>
            <h4 class="h5 g-font-weight-600 g-mb-5">Redes sociales</h4>
            <span class="d-block">Fundación Accede</span>
          </div>
          <!-- End Icon Blocks -->
        </div>

        <div class="col-sm-6 col-md-4 g-brd-right--md g-brd-gray-light-v4">
          <!-- Icon Blocks -->
          <div class="g-bg-white text-center g-py-100">
            <a href="https://api.whatsapp.com/send?phone=‎+56993980258&text=Hola! Me contacto desde su sitio web, necesito información sobre..." target="_blank">
            <span class="u-icon-v1 u-icon-size--xl g-color-primary mb-3">
                <i class="fa fa-whatsapp"></i>
              </span>
            <h4 class="h5 g-font-weight-600 g-mb-5">WhatsApp</h4>
            <span class="d-block">+56{{$fundacion->telefono1}}</span></a>
          </div>
          <!-- End Icon Blocks -->
        </div>

        <div class="col-sm-6 col-md-4 ">
          <!-- Icon Blocks -->
          <div class="g-bg-white text-center g-py-100">
            <span class="u-icon-v1 u-icon-size--xl g-color-primary mb-3">
                <i class="icon-communication-062 u-line-icon-pro"></i>
              </span>
            <h4 class="h5 g-font-weight-600 g-mb-5">Correo</h4>
            <span class="d-block">{{$fundacion->correo1}}</span>
          </div>
          <!-- End Icon Blocks -->
        </div>
      </div>
      <!-- End Icon Blocks -->

      <div class="g-py-100">
        <div class="row justify-content-center">
          <div class="col-lg-9">
            <h3 class="g-color-black g-font-weight-600 text-center mb-5">Envíanos un mensaje!</h3>
            <form>
              
              <div class="row">
                <div class="col-md-6 form-group g-mb-20">
                  <label class="g-color-gray-dark-v2 g-font-size-13">Nombre</label>
                  <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded-3 g-py-13 g-px-15" type="text" placeholder="Mario Doe">
                </div>

                <div class="col-md-6 form-group g-mb-20">
                  <label class="g-color-gray-dark-v2 g-font-size-13">Correo</label>
                  <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded-3 g-py-13 g-px-15" type="email" placeholder="mariodoe@gmail.com">
                </div>

                <div class="col-md-6 form-group g-mb-20">
                  <label class="g-color-gray-dark-v2 g-font-size-13">Asunto</label>
                  <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded-3 g-py-13 g-px-15" type="text" placeholder="Colaboración">
                </div>

                <div class="col-md-6 form-group g-mb-20">
                  <label class="g-color-gray-dark-v2 g-font-size-13">Teléfono</label>
                  <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded-3 g-py-13 g-px-15" type="tel" placeholder="9 9999 8888">
                </div>

                <div class="col-md-12 form-group g-mb-40">
                  <label class="g-color-gray-dark-v2 g-font-size-13">Mensaje</label>
                  <textarea class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover g-resize-none rounded-3 g-py-13 g-px-15" rows="7" placeholder="Hola! Me contacto con ustedes porque..."></textarea>
                </div>
              </div>

              <div class="text-center">
                <button class="btn u-btn-primary g-font-weight-600 g-font-size-13 text-uppercase g-rounded-25 g-py-15 g-px-30" type="submit" role="button">Enviar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Form -->
    
@endsection

