<!doctype html>
<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets') }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Partenariat</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('slims.png')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <!-- Vendor -->
    <link rel="stylesheet"
        href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
</head>

<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- Content -->
    <div class="container-xxl" style="left:41!important;">
        <div class="authentication-wrapper authentication-basic container-p-y" style="left:4!important;">
            <div class="authentication-inner py-4" >
                <!-- Register Card -->
               
                <div class="card-body" style="width: 120% !important;">
                    <!-- Logo -->
                    <div class="card">
                        <div class="card-body">
                            <div class="app-brand justify-content-center mb-4 mt-2">
                                <a href="https://vioredigital.com/" class="app-brand-link gap-2">
                                    <span class="app-brand-logo demo" style="width: 100px; height: 100px">
                                        <img src="{{ asset('slims.png')}}" width="75" height="65" alt="Your Logo">
                                    </span>
                                </a>
                            </div>
                            <!-- /Logo -->
                            <h3 class="mb-1 pt-2" style="text-align: center!important;">Bienvenue sur Slims Digital 🚀</h3>
                            <form id="formAuthentication" class="mb-3" action="{{ route('restaurant.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom et Prénom :</label>
                                    <input type="text" class="form-control" id="customerName" name="customerName"
                                        placeholder="Nom et Prénom" autofocus />
                                </div>
                                <div class="mb-3">
                                    <label for="nom_restaurant" class="form-label">Nom du Restaurant :</label>
                                    <input type="text" class="form-control" id="nomrestau" name="nomrestau"
                                        placeholder="Votre Nom restaurant" />
                                </div>
                                <div class="mb-3">
                                    <label for="telephone" class="form-label">Numéro de Téléphone :</label>
                                    <input type="tel" class="form-control" id="customerContact" name="customerContact"
                                        pattern="\s\d+" placeholder="Votre num telephone" />
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email :</label>
                                    <input type="text" class="form-control" id="customerEmail" name="customerEmail"
                                        placeholder="Votre Email" />
                                </div>
                                @if(session()->has('msg'))
                                <div class="alert alert-danger">
                                    {{ session('msg') }}
                                </div>
                            @endif
                                <div class="mb-3">
                                    <label for="adresse_restaurant" class="form-label">Adresse du Restaurant :</label>
                                    <input type="text" class="form-control" id="customerAddress1" name="customerAddress1"
                                        placeholder="Adresse de votre Restaurant" />
                                </div>
                                <div class="mb-3">
                                    <label for="telephone" class="form-label">Pays:</label>
                                    <select id="pays" name="pays" class="select2 form-select form-control">
                                        <option value="Australia">Australia</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Canada">Canada</option>
                                        <option value="China">China</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="France">France</option>
                                        <option value="Germany">Germany</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Israel">Israel</option>
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
                                <button class="btn btn-primary d-grid w-100">Envoyer</button>
                            </form>
                            <div class="divider my-4">
                                <div class="divider-text">or</div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="https://www.facebook.com/viore.digital?locale=fr_FR"
                                    class="btn btn-icon btn-label-facebook me-3">
                                    <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
                                </a>
                                <a href="https://vioredigital.com/"
                                    class="btn btn-icon btn-label-google-plus me-3">
                                    <i class="tf-icons fa-brands fa-google fs-5"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
 
    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
   

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/pages-auth.js') }}"></script>
</body>

</html>
