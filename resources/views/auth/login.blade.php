
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!doctype html>
<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ ('assets')}}"
  data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/ecommerce.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/tabler-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/form-validation.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}" />
    <style>
      /* Styles pour le champ de saisie de texte */
      /* Styles pour le champ de saisie de texte */
      input {      
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        padding: 0.5rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        width: 100%; /* Définit la largeur à 100% */
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    
    input:focus {
        border-color: #AF2B1D;
        outline: 0;
        box-shadow: 0 0 0 0.1rem rgba(0, 123, 255, 0.25);
    }

    label {
        display: block;
      
    }
  </style>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Login -->
          <div class="card">
            <div class="card-body">
              <div class="app-brand justify-content-center mb-4 mt-2">
                <a href="https://vioredigital.com/" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo" style="width: 95px; height: 85px">
                        <img src="slims.png" width="75" height="65" alt="Your Logo">
                    </span>
                </a>
            </div>
              <h3 class="mb-1 pt-2" style="text-align: center !important;">Bienvenue👋</h3>
             

              <form  class="mb-3"  method="POST" action="{{ route('login') }}">
                @csrf
               <div class="mb-3">
            <x-input-label for="email" :value="__('Email :')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="email" />
           
           </div>
           <div class="mb-3 form-password-toggle">
    <x-input-label for="password" :value="__('Mot de passe :')" />
    <div class="input-group"> <!-- Conteneur pour l'icône et le champ de mot de passe -->
        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
    </div>
    <span class="ml-2">
        <a href="{{ route('password.request') }}">
            <small>Mot de passe ?</small>
        </a>
    </span>

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                      <label class="form-check-label" for="remember">
                       {{ __('Remember Me') }}
                     </label>
                  </div>
                </div>
                <div class="mb-3">
                  <x-primary-button class="ml-3 btn btn-primary d-grid w-100">
                {{ __('Log in') }}
            </x-primary-button>
                </div>
              </form>

              <p class="text-center">
                <a href="{{ route('register') }}">
                  <span>Creater un compte</span>
                </a>
              </p>

              <div class="divider my-4">
                <div class="divider-text">or</div>
              </div>

              <div class="d-flex justify-content-center">
                <a href="https://www.facebook.com/viore.digital?locale=fr_FR" class="btn btn-icon btn-label-facebook me-3">
                  <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
                </a>

                <a href="https://vioredigital.com/" class="btn btn-icon btn-label-google-plus me-3">
                  <i class="tf-icons fa-brands fa-google fs-5"></i>
                </a>
                </a>
              </div>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->

    <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/node-waves/node-waves.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{asset('assets/vendor/js/menu.js')}}"></script>
  
    

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('assets/vendor/libs/@form-validation/popular.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/bootstrap5.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/auto-focus.js')}}"></script>



    <!-- Page JS -->
    <script src="{{asset('assets/js/pages-auth.js')}}"></script>
  </body>
</html>

