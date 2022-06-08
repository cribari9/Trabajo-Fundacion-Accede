@extends('layouts.app')

@section('content')
</br>
<hr>

     <!-- Login -->
    <section class="g-height-100vh d-flex align-items-center g-bg-size-cover g-bg-pos-top-center" style="background-image: url(../../assets/img/login/fondo_login.png);">
      <div class="container g-py-100 g-pos-rel g-z-index-1">
        <div class="row justify-content-center">
          <div class="col-sm-8 col-lg-5">
            <div class="g-bg-white rounded g-py-40 g-px-30">
              <header class="text-center mb-4">
                <h2 class="h2 g-color-black g-font-weight-600">Login</h2>
              </header>

              <!-- Form -->
              <form class="g-py-15" method="POST" action="{{ route('login') }}">
                 @csrf
                <div class="mb-4 form-group">
                  <input id="email" class="form-control @error('email') is-invalid @enderror g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" type="email" value="{{ old('email') }}" placeholder="Correo@email.com" required autocomplete="email" autofocus>
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror

                </div>
                



                <div class="form-group g-mb-35">
                  <input  id="password" class="form-control @error('password') is-invalid @enderror g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15 mb-3" name="password" type="password" placeholder="Contraseña" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           



                  <div class="row justify-content-between">
                    <div class="col align-self-center">
                      <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-12 g-pl-25 mb-0">
                        <input class="form-check-input g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                          <i class="fa" data-check-icon="&#xf00c"></i>
                        </div>
                        Recuerdame
                      </label>
                    </div>





                    <div class="form-group col align-self-center text-right">
                        
                    @if (Route::has('password.request'))
                      <a class="g-font-size-12" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="mb-4">
                  <button class="btn btn-md btn-block u-btn-primary rounded g-py-13" type="submit">Entrar</button>
                </div>
              </form>
              <!-- End Form -->

            
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Login -->
</div>
@endsection
