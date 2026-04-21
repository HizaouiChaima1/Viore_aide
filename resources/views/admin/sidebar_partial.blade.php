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
                    <div>Fournisseurs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('ordre.affich')}}" class="menu-link">
                    <div>Ordres d'achat</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <img src="{{ asset('assets/icons/user.png')}}" alt="Votre Logo" class="menu-logo" style="width: 20px; height: 20px;">
                <div >Utilisateurs</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('employe.index')}}" class="menu-link">
                    <div >Rôles</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('employe.affich')}}"class="menu-link" target="_blank">
                    <div >Ajouter un Compte</div>
                  </a>
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