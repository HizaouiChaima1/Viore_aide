<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interface Cuisiner</title>
  <style>
    body {
      font-family: 'Public Sans', Arial, sans-serif;
      background-color: #f5f5f5;
      color: #333;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 800px;
      margin: 40px auto;
      padding: 20px;
      background-color: #ffffff;
      border: 1px solid #e0e0e0;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      color: #4CAF50;
      margin-bottom: 30px;
    }
    .order {
      margin-bottom: 20px;
      border: 1px solid #e0e0e0;
      border-radius: 5px;
      padding: 15px;
      background-color: #fafafa;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }
    .order-details {
      margin-bottom: 10px;
    }
    .order-products {
      margin-bottom: 10px;
      list-style: none;
      padding: 0;
    }
    .order-products li {
      padding: 5px 0;
      border-bottom: 1px solid #e0e0e0;
    }
    .order-products li:last-child {
      border-bottom: none;
    }
    .status-traite {
      color: #4CAF50;
    }
    .status-non-traite {
      color: #f44336;
    }
    .day-button {
      background-color: #4CAF50;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      margin: 5px 0;
      cursor: pointer;
      font-size: 14px;
      transition: background-color 0.3s;
    }
    .day-button.non-traite {
      background-color: #f44336;
    }
    .day-button:hover {
      background-color: #45a049;
    }
    .day-button.non-traite:hover {
      background-color: #e53935;
    }
  </style>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('slims.png') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
  <!-- Template customizer & Theme config files -->
  <script src="{{ asset('assets/js/config.js') }}"></script>
</head>
<body>
  @include('admin.nav')

  <div class="container">
      <h2>Commandes de jour</h2>
  
      @if (is_array($commandes) || is_object($commandes))
          @foreach ($commandes as $index => $commande)
              <div class="order">
                  <div class="order-details">
                      <span class="{{ $commande->status == 'Traité' ? 'status-traite' : ($commande->status == 'Non Traité' ? 'status-non-traite' : '') }}"><b>
                      Commande n° {{ $index + 1 }}: {{ $commande->status }}</b></span>
                  </div>
                  <ul class="order-products">
                      @foreach ($commande->produits as $produitId => $quantite)
                          @php
                              $produit = App\Models\Produit::find($produitId);
                          @endphp
                          <li>{{ $produit->Nom }} : {{ $quantite }}</li>
                      @endforeach
                  </ul>
                  
                  <form method="POST" action="{{ route('update.order.status') }}">
                    @csrf
                    <input type="hidden" name="commande_id" value="{{ $commande->id }}">
                    <input type="hidden" name="status" value="Traité">
                    <button type="submit" class="day-button">Traité</button>
                  </form>
                  <form method="POST" action="{{ route('update.order.status') }}">
                    @csrf
                    <input type="hidden" name="commande_id" value="{{ $commande->id }}">
                    <input type="hidden" name="status" value="Non Traité">
                    <button type="submit" class="day-button non-traite">Non Traité</button>
                  </form>
              </div>
          @endforeach
      @else
          <p>No commandes available.</p>
      @endif
  </div>
  
  <!-- Chargement des bibliothèques jQuery et Bootstrap -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>