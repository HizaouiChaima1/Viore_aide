
  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
          <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="ti ti-menu-2 ti-sm"></i>
          </a>
      </div>

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
          <div class="navbar-nav align-items-center">
              <div class="nav-item navbar-search-wrapper mb-0">
                  <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                      <i class="ti ti-search ti-md me-2"></i>
                      <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
                  </a>
              </div>
          </div>

          <ul class="navbar-nav flex-row align-items-center ms-auto">
              <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                      <i class="ti ti-md"><img src="{{ asset('assets/img/notifi.png') }}" width="20px" alt="Logo d'e-mail" /></i>
                      @php
                          $unreadCount = auth()->check() ? auth()->user()->unreadNotifications->count() : 0;
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
                          <div style="display: flex;" align-items="center">
                              <button id="mark-all-notifications-button" title="Mark all as read">
                                  <img src="{{ asset('assets/img/mail2.png') }}" width="20px" alt="Logo d'e-mail" style="float:right">
                              </button>
                          </div>
                      </li>
                      <li class="dropdown-notifications-list scrollable-container">
                          <ul class="list-group list-group-flush">
                              @if(auth()->check() && auth()->user()->unreadNotifications->count() > 0)
                                  @foreach(auth()->user()->unreadNotifications as $notification)
                                      <li class="list-group-item list-group-item-action dropdown-notifications-item" data-notification-id="{{ $notification->id }}">
                                          <a href="{{ route('restaurant.index') }}">
                                              <div class="d-flex">
                                                  <div class="flex-shrink-0 me-3"></div>
                                                  <div class="flex-grow-1" style="text-align: center;">
                                                      <h6 class="mb-1">🔔 Un nouveau restaurant a été ajouté 🔔</h6>
                                                      <small class="text-muted">{{ $notification->created_at }}</small>
                                                  </div>
                                                  <div class="flex-shrink-0 dropdown-notifications-actions">
                                                      <a href="javascript:void(0)" class="dropdown-notifications-read">
                                                          <span class="badge badge-dot"></span>
                                                      </a>
                                                      <a href="javascript:void(0)" class="dropdown-notifications-archive">
                                                          <span class="ti ti-x"></span>
                                                      </a>
                                                  </div>
                                              </div>
                                          </a>
                                      </li>
                                  @endforeach
                              @endif
                          </ul>
                      </li>
                      <li class="dropdown-menu-footer border-top">
                          <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                              View all notifications
                          </a>
                      </li>
                  </ul>
              </li>

              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                      <div class="avatar avatar-online">
                          <img src="{{ asset('slims.png') }}" alt class="h-auto rounded-circle" />
                      </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                          <a class="dropdown-item" href="pages-account-settings-account.html">
                              <div class="d-flex">
                                  <div class="flex-shrink-0 me-3">
                                      <div class="avatar avatar-online">
                                          <img src="{{ asset('slims.png') }}" alt class="h-auto rounded-circle" />
                                      </div>
                                  </div>
                                  <div class="flex-grow-1">
                                      <span class="fw-medium d-block">{{ Auth::user()->name }}</span>
                                      <small class="text-muted">Admin</small>
                                  </div>
                              </div>
                          </a>
                      </li>
                      <li>
                          <div class="dropdown-divider"></div>
                      </li>
                      <li>
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <button type="submit" class="dropdown-item">
                                  <i class="ti ti-logout me-2 ti-sm"></i>Log Out
                              </button>
                          </form>
                      </li>
                  </ul>
              </li>
          </ul>
      </div>

      <li>
          <div class="navbar-search-wrapper search-input-wrapper d-none">
              <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search..." />
              <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
          </div>
  </nav>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      const notifications = document.querySelectorAll('.dropdown-notifications-item');
      notifications.forEach(function(notification) {
          notification.addEventListener('click', function(event) {
              const notificationId = notification.getAttribute('data-notification-id');

              fetch("/marquer_notification_lue/${notificationId}", {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  },
              })
              .then(response => {
                  if (response.ok) {
                      const badge = document.querySelector('.badge-notifications');
                      if (badge) {
                          const unreadCount = parseInt(badge.textContent.trim());
                          badge.textContent = unreadCount > 0 ? unreadCount - 1 : 0;
                          if (unreadCount - 1 <= 0) {
                              badge.style.display = 'none';
                          }
                      }
                      notification.remove();
                  } else {
                      console.error('Erreur lors de la mise à jour de la notification');
                  }
              })
              .catch(error => {
                  console.error('Une erreur s\'est produite :', error);
              });
          });
      });
  });

 
</script>