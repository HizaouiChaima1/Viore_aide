<style>
  .notification-read {
    color: black;
    background-color: #f8f9fa; /* Optional: to make it visually distinct */
}
  </style>
<nav
class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
id="layout-navbar">
<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
  <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
    <i class="ti ti-menu-2 ti-sm"></i>
  </a>
</div>

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
  <!-- Search -->
  <div class="navbar-nav align-items-center">
    <div class="nav-item navbar-search-wrapper mb-0">
      <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
        <i class="ti ti-search ti-md me-2"></i>
        <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
      </a>
    </div>
  </div>
  <!-- /Search -->

  <ul class="navbar-nav flex-row align-items-center ms-auto">
    <!-- Quick links -->

    <!-- Notification -->
    <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
          <i class="ti ti-bell ti-md"></i>
          @php
              $unreadCount = Auth::guard('employee')->check() ? Auth::guard('employee')->user()->unreadNotifications->count() : 0;
          @endphp
          @if($unreadCount > 0)
              <span class="badge bg-danger rounded-pill badge-notifications">{{ $unreadCount }}</span>
          @endif
      </a>
      <ul class="dropdown-menu dropdown-menu-end py-0">
          <li class="dropdown-menu-header border-bottom" style="text-align: right;">
              <form id="mark-all-notifications-form" action="{{ route('notifications.markAllAsRead') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              <div style="display: flex; align-items: center;">
                  <button id="mark-all-notifications-button" title="Mark all as read">
                      <img src="assets/img/mail2.png" width="20px" alt="Logo d'e-mail" style="float:right">
                      @if($unreadCount > 0)
                          <span class="badge bg-danger rounded-pill badge-notifications">{{ $unreadCount }}</span>
                      @endif
                  </button>
              </div>
          </li>
          <li class="dropdown-notifications-list scrollable-container">
              <a href="{{ route('restaurant.index') }}">
                  <ul class="list-group list-group-flush">
                      @if (Auth::guard('employee')->check())
                          @forelse (Auth::guard('employee')->user()->notifications as $notification)
                              <form method="POST" action="{{ route('notifications.markAsRead', $notification->id) }}" style="display:inline;">
                                  @csrf
                                  <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                      <li class="list-group-item {{ $notification->read_at ? 'notification-read' : '' }}" data-notification-id="{{ $notification->id }}">
                                          <a href="{{ url('/orders/'.$notification->data['order_id']) }}">
                                              Une nouvelle commande a été créée :<br> 
                                              (Total : {{ $notification->data['total_price'] }})<br>
                                              @if (isset($notification->data['created_at']))
                                                  {{ $notification->data['created_at'] }}
                                              @else
                                                  {{ $notification->created_at->format('H:i:s Y-m-d') }}
                                              @endif
                                          </a>
                                      </li>
                                  </button>
                              </form>
                          @empty
                              <li class="list-group-item">Aucune notification disponible.</li>
                          @endforelse
                      @else
                          <li class="list-group-item">Utilisateur non authentifié.</li>
                      @endif
                  </ul>
              </a>
          </li>
          <li class="dropdown-menu-footer border-top">
              <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                  View all notifications
              </a>
          </li>
      </ul>
    </li>    
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    const markAllButton = document.getElementById('mark-all-notifications-button');
    markAllButton.addEventListener('click', function() {
        document.getElementById('mark-all-notifications-form').submit();
    });

    const notifications = document.querySelectorAll('.dropdown-notifications-item');
    notifications.forEach(function(notification) {
        notification.addEventListener('click', function(event) {
            const notificationId = notification.getAttribute('data-notification-id');

            fetch(`/notifications/markAsRead/${notificationId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (response.ok) {
                    const badge = document.querySelector('.badge-notifications');
                    if (badge) {
                        let unreadCount = parseInt(badge.textContent.trim());
                        unreadCount = Math.max(0, unreadCount - 1);
                        badge.textContent = unreadCount > 0 ? unreadCount : '';
                    }
                    notification.classList.add('notification-read');
                }
            })
            .catch(error => console.error('Une erreur s\'est produite :', error));
        });
    });
});

    </script>
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <ul class="dropdown-menu dropdown-menu-end">
        <li>
          <div class="d-flex">
    <a href="{{ route('menu.create')}} "> <img width="10%" height="8%"  fill="none" src="{{ asset('men.png')}}" class="img" style="margin-bottom: -20% !important;"></a>
          </div>
        </li>
      </ul>
    </li>
    <!-- User -->
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
          <img src="slims.png" alt class="h-auto rounded-circle" />
        </div>
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li>
          <a class="dropdown-item" href="/details">
            <div class="d-flex">
              <div class="flex-shrink-0 me-3">
                <div class="avatar avatar-online">
                  <img src="slims.png" alt class="h-auto rounded-circle" />
                </div>
              </div>
              <div class="flex-grow-1">
               
                <span class="fw-medium d-block">{{ session('Nom') }}</span>
                <small class="text-muted">Votre retaurant: {{ session('nomrestau') }}</small><br>
                <small class="text-muted"> {{ session('Rôle') }}</small>
              </div>
            </div>
          </a>
        </li>
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('details.index')}}">
            <i class="ti ti-user-check me-2 ti-sm"></i>
            <span class="align-middle">Mon Profile</span>
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="/edit">
            <i class="ti ti-settings me-2 ti-sm"></i>
            <span class="align-middle">Paramètres</span>
          </a>
        </li>
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
        <form  method ="POST" action= "{{route('logout1')}}"> 
                @csrf
                <button type ="submit" class="dropdown-item">
                  <i class="ti ti-logout me-2 ti-sm"></i>Déconnecter</button>
            </form>
        </li>
      </ul>
    </li>
    <!--/ User -->
  </ul>
</div>
<li>
<!-- Search Small Screens -->
<div class="navbar-search-wrapper search-input-wrapper d-none">
  <input
    type="text"
    class="form-control search-input container-xxl border-0"
    placeholder="Search..."
    aria-label="Search..." />
  <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
</div>
</nav>

<script>
  $(document).ready(function() {
        $('.search-input').on('keyup', function() {
            var inputVal = $(this).val();
            switch (inputVal) {
              case 'catégorie principale':
                window.location = "{{ route('catégorie.indexp')}}"
                break;
              case 'catégorie':
                window.location = "{{ route('catégorie.index')}}"
                break;
                case 'produits':
                window.location = "{{ route('produit.index')}}"
                break;
                case 'Combinaisons':
                window.location = "{{route('combos.affich')}}"
                break;
                case 'cartes de fidélité':
                window.location = "{{route('cartefidelite.affich')}}"
                break;
                case 'Modificatrices':
                window.location ="{{route('modif.affich')}}"  
                break;
                case 'option de modificateur':
                window.location ="{{route('optionmodif.affich')}}" 
                break;
                case 'article':
                window.location ="{{route('article.back')}}" 
                break;
                case 'fournisseuses':
                window.location ="{{route('fournisseur.affich')}}"
                break;
                case 'commandes dachat':
                window.location ="{{route('ordre.affich')}}"
                break;
                case 'réduction':
                window.location ="{{route('reduction.affich')}}"
                break;  
                case 'employe':
                window.location ="{{route('employe.affich')}}"
                break;
                case 'branche':
                window.location ="{{route('branche.affich')}}" 
                break;
                
                




            
              default:
                break;
            }
            // Perform any additional actions here
        });
    });
  </script>