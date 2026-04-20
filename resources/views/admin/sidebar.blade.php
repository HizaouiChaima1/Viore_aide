<!doctype html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/')}}"
  data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard Admin</title>

    <meta name="description" content="" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css')}}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
   
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js')}}"></script>
  </head>

  <body>
  <style>
.sidebar-menu {
  display: flex;
  flex-direction: column;
  align-items: center; /* Centrer horizontalement */
}

.menu-link {
  display: flex;
  align-items: center; /* Centrer verticalement */
  text-decoration: none; /* Supprimer le soulignement des liens */
  color: black; /* Couleur du texte */
}

.menu-logo {
  margin-right: 5px; /* Espacement entre l'icône et le texte */
}
.img {
    margin-top: 10% !important;
 
    /* Réglez cette valeur selon vos besoins */
}      
</style>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme sidebar-menu" >
          <a href="{{ route('menu.create')}} "> <img width="7%" height="7%"  fill="none" src="{{ asset('men.png')}}" class="img" style="margin-bottom: -20% !important;"></a>
           <img width="28%" height="15%" viewBox="0 0 32 22" fill="none" src="slims.png" class="img">
          <div class="app-brand demo">
            <a href="https://vioredigital.com/" class="app-brand-link">
              <span class="app-brand-logo demo">
              </span>
            </a>
           
          </div>

          <div class="menu-inner-shadow"></div>
         
          <ul class="menu-inner py-1">
           
           
            
            <!-- Apps & Pages -->
            <li class="menu-item  ">
  <a href="{{ route('dash')}}" class="menu-link">
    
    <!-- Ici, vous pouvez ajouter votre image -->
    <img src="{{ asset('assets/icons/dashboard.png')}}" alt="Votre Logo" class="menu-logo" style="width: 20px; height: 20px;">
    <!-- Fin de l'insertion du logo -->
    <div class="menu-item icon-label sidebar-item">Tableau de bord</div>
  </a>
</li>
<li  class="menu-item ">
<a href="{{ route('admin.index') }}" class="menu-link">
    
    <!-- Ici, vous pouvez ajouter votre image -->
    <img src="{{ asset('assets/icons/shop.png')}}" alt="Votre Logo" class="menu-logo" style="width: 20px; height: 20px;">
    <!-- Fin de l'insertion du logo -->
    <div class="menu-item  ">Commands</div>
  </a>
</li>
            <!-- e-commerce-app menu start -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <img src="{{ asset('assets/icons/rapport.png')}}" alt="Votre Logo" class="menu-logo" style="width: 20px; height: 20px;"> 
                <div >Rapports</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="app-ecommerce-dashboard.html" class="menu-link">
                    <div>Rapport des ventes</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="app-ecommerce-dashboard.html" class="menu-link">
                    <div>Rapports d'inventaire</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="app-ecommerce-dashboard.html" class="menu-link">
                    <div>Rapports d'activité</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <img src="{{ asset('assets/icons/menu.png')}}" alt="Votre Logo" class="menu-logo" style="width: 20px; height: 20px;"> 
                <div >Menu</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('catégorie.indexp')}}" class="menu-link">
                    <div>Catégories Principales</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('catégorie.index')}}" class="menu-link">
                    <div>Catégories</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/nouveauproduit" class="menu-link">
                    <div>Produit</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('combos.affich')}}" class="menu-link">
                    <div>Combinaisons</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('cartefidelite.affich')}}" class="menu-link">
                    <div>Cartes de fidélité</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('modif.affich')}}"  class="menu-link">
                    <div>Modificatrices</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('optionmodif.affich')}}" class="menu-link">
                    <div>option de modificateur</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <img src="{{ asset('assets/icons/in.png')}}" alt="Votre Logo" class="menu-logo" style="width: 20px; height: 20px;"> 
                <div >Inventaire</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('article.back')}}"  class="menu-link">
                    <div>Articles</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('fournisseur.affich')}}" class="menu-link">
                    <div>Fournisseuses</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('ordre.affich')}}" class="menu-link">
                    <div>Commandes d'achat</div>
                  </a>
                </li>
               
               
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <img src="{{ asset('assets/icons/settings.png')}}" alt="Votre Logo" class="menu-logo" style="width: 20px; height: 20px;"> 
                <div >Manage</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('employe.affich')}}" class="menu-link">
                    <div>Utilisateurs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('branche.affich')}}"  class="menu-link">
                    <div>Branche</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="{{route('reduction.affich')}}" class="menu-link">
                    <div>Réductions</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-lock"></i>
                <div data-i18n="Authentications">Authentications</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <div data-i18n="Comptes">Comptes</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{route('employe.affich')}}"class="menu-link" target="_blank">
                        <div >Ajouter un Compte</div>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>

           
            <!-- Misc -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text" data-i18n="Misc">Misc</span>
            </li>
            <li class="menu-item">
              <a href="https://vioredigital.com/" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li>
          
          </ul>
        </aside>
        <script src="{{ asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js')}}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/swiper/swiper.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js')}}"></script>
    <!-- Vendors JS -->
</body>
</html>