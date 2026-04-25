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
  <link rel="icon" type="image/x-icon" href="{{ asset('slims.png') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
  <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
  <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
  @include('admin.nav')

  <div class="container">
    <h2>Commandes de jour</h2>

    @if (is_array($commandes) || is_object($commandes))
    @foreach ($commandes as $index => $commande)
    <div class="order">

      {{-- Statut de la commande --}}
      <div class="order-details">
        <span class="{{ $commande->status == 'Traité' ? 'status-traite' : 'status-non-traite' }}">
          <b>Commande n° {{ $index + 1 }} : {{ $commande->status }}</b>
        </span>
      </div>

      {{-- Informations supplémentaires --}}
      @if ($commande->client)
      <p><strong>Client :</strong> {{ $commande->client }}</p>
      @endif
      @if ($commande->notes_cuisine)
      <p><strong>Notes cuisine :</strong> {{ $commande->notes_cuisine }}</p>
      @endif

      {{-- Chaque $produit est un tableau avec les clés : nom, quantite, prix_unitaire, total --}}
      <ul class="order-products">
        @if (!empty($commande->produits))
        @php
        $produitsList = is_array($commande->produits)
        ? $commande->produits
        : json_decode($commande->produits, true) ?? [];
        @endphp

        @foreach ($produitsList as $produit)
        <li>
          <strong>{{ $produit['nom'] }}</strong>
          — Qté : {{ $produit['quantite'] }}
        </li>
        @endforeach
        @else
        <li>Aucun produit dans cette commande.</li>
        @endif
      </ul>

      {{-- Boutons de statut --}}
      <form method="POST" action="{{ route('update.order.status') }}">
        @csrf
        <input type="hidden" name="commande_id" value="{{ $commande->id }}">
        <input type="hidden" name="status" value="Traité">
        <button type="submit" class="day-button">✔ Traité</button>
      </form>

      <form method="POST" action="{{ route('update.order.status') }}">
        @csrf
        <input type="hidden" name="commande_id" value="{{ $commande->id }}">
        <input type="hidden" name="status" value="Non Traité">
        <button type="submit" class="day-button non-traite">✘ Non Traité</button>
      </form>

    </div>
    @endforeach
    @else
    <p>Aucune commande disponible.</p>
    @endif
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>