<!doctype html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data--path="{{asset('assets/') }}"
  data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Account settings</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('slims.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('assets/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assets/js/config.js') }}"></script>
  </head>

  <body>
    <style>
      .dev{
             margin-right: 150%;
              margin-left: 18%;           
  }
  .profil{
      width: 520% !important;
  }
      </style>
       @include('admin.sidebar')
            <!-- Content wrapper -->
            <div class="dev">
            <div class="content-wrapper">
              <!-- Content -->
              @include('admin.nav')
              <div class="profil">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-4">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"
                        ><i class="ti-xs ti ti-users me-1"></i>Compte</a>
                    </li>
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Détails du profile</h5>
                    <!-- Account -->
                    <form  method="post" action="{{ route('details.store',$employee->id) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                    <div class="card-body">
                      <h4>Ajoutez votre image</h4>
                        <div class="d-flex align-items-start align-items-sm-center gap-4">                                                         
                                    <input type="file" class="form-control input-field " id="photo" name="photo">
                            
                        </div>
                    </div>
                
                    <hr class="my-0" />
                    <div class="card-body">
                      
                        <div class="row">
                         
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Nom et Prénom:</label>
                            <input class="form-control" type="text" name="Nom" id="Nom" value="Doe" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail: </label>
                            <input
                              class="form-control"
                              type="text"
                              id="Email"
                              name="Email"
                              value="john.doe@example.com"
                              placeholder="john.doe@example.com" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Restaurant :</label>
                            <input
                              type="text"
                              class="form-control"
                              id="nomrestau"
                              name="nomrestau"
                              value="Pixinvent" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Numéro de téléphone :</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                id="numero_de_téléphone"
                                name="numero_de_téléphone"
                                class="form-control"
                                placeholder="202 555 0111" />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Addresse :</label>
                            <input type="text" class="form-control" id="customerAddress1" name="customerAddress1" placeholder="Address" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">Pays :</label>
                            <select id="pays" name="pays" class="select2 form-select">
                              <option value="">Select</option>
                              <option value="Australia">Australia</option>
                              <option value="Bangladesh">Bangladesh</option>
                              <option value="Belarus">Belarus</option>
                              <option value="Brazil">Brazil</option>
                              <option value="Canada">Canada</option>
                              <option value="China">China</option>
                              <option value="France">France</option>
                              <option value="Germany">Germany</option>
                              <option value="India">India</option>
                              <option value="Indonesia">Indonesia</option>
                              <option value="Indonesia">Tunisia</option>
                              <option value="Italy">Italy</option>
                              <option value="Japan">Japan</option>
                              <option value="Korea">Korea, Republic of</option>
                              <option value="Mexico">Mexico</option>
                              <option value="Philippines">Philippines</option>
                              <option value="Russia">Russian Federation</option>
                              <option value="South Africa">South Africa</option>
                              <option value="Thailand">Thailand</option>
                              <option value="Turkey">Turkey</option>
                              <option value="Ukraine">Ukraine</option>
                              <option value="United Arab Emirates">United Arab Emirates</option>
                              <option value="United Kingdom">United Kingdom</option>
                              <option value="United States">United States</option>
                            </select>
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Enregistrer les changements</button>
                          <button type="reset" class="btn btn-label-secondary">Cancel</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                  <div>
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ 
                  </div>
                  <div class="d-none d-lg-inline-block">

                    <a href="https://vioredigital.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
                      >Support</a
                    >
                  </div>
                </div>
              </div>
            </footer>
          </div>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
        
        

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </form>
    @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <!-- Main JS -->
   

    <!-- Page JS -->
    
  </body>
</html>
