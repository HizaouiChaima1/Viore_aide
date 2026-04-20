<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .category-button,
        .product-button {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin: 0.5rem;
            border: none;
            border-radius: 4px;
            background-color: #f8f9fa;
            color: #212529;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .category-button:hover,
        .product-button:hover {
            background-color: #e2e6ea;
            transform: scale(1.05);
        }
        .subcategory-square {
            width: 150px;
            height: 136px;
            background-color: #f8f9fa;
            padding: 10px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 2px solid #343a40;
            transition: background-color 0.3s, transform 0.3s;
        }
        .subcategory-square:hover {
            background-color: #e2e6ea;
            transform: scale(1.05);
        }
        .subcategory-square img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 5px;
        }
        #order-table {
            margin-top: 2%;
        }
        .total-row {
            font-weight: bold;
        }
        .formulaire {
           left: 0 !important;
        }
        .bg-red-700 {
            background-color: #AF2B1D !important;
        }
        .container {
            margin-bottom: 3%;
        }
        .navbar {
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
        }
    </style>
</head>

<body>
    @if (session('success'))
<div class="alert alert-success mt-3">
    {{ session('success') }}
</div>
@endif

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar p-3 border rounded shadow-sm bg-light">
                    <a href="/ordres" class="lien"> Annuler</a>
                    <h2 style="text-align: center;">Slims</h2>
                    <div class="formulaire">
                        <form action="{{ route('caisse.save') }}" method="post" onsubmit="return validateTotalPrice()">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="branch" class="form-label">Branche</label>
                                <select id="branch" name="branch" class="form-select">
                                    <option value="branch1">Branche 1</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="order-type" class="form-label">Type de commande</label>
                                <select id="type_commande" name="type_commande" class="form-select">
                                    <option value="À emporter">À emporter</option>
                                    <option value="Livraison">Livraison</option>
                                    <option value="Sur Place">Sur place</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="customer" class="form-label">Client</label>
                                <input type="text" id="client" name="client" placeholder="Nom du client" class="form-control" value="Nom">
                            </div>
                            <div class="form-group mb-3">
                                <label for="due-at" class="form-label">Date :</label>
                                <input type="datetime-local" id="heure_arrivee" name="heure_arrivee" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="receipt-notes" class="form-label">Notes de réception :</label>
                                <textarea id="notes_ticket" name="notes_ticket" placeholder="Entrez les notes de réception" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="kitchen-notes" class="form-label">Notes de cuisine :</label>
                                <textarea id="notes_cuisine" name="notes_cuisine" placeholder="Entrez les notes de cuisine" class="form-control"></textarea>
                            </div>
                          
                            <div class="table-responsive mb-3">
                                <table class="table table-bordered">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Article</th>
                                            <th>Quantité</th>
                                            <th>Prix</th>
                                        </tr>
                                    </thead>
                                    <tbody id="selected-products-body" class="bg-white">
                                        @php
                                            $totalPrice = 0;
                                        @endphp
                                        @if (session('cass'))
                                            @foreach(session('cass') as $productId => $cartItem)
                                                @php
                                                    $quantity = $cartItem['quantity'];
                                                    $productPrice = $cartItem['product']->Prix;
                                                    $totalPrice += $productPrice * $quantity;
                                                @endphp
                                                <tr>
                                                    <td >{{ $cartItem['product']->Nom }}</td>
                                                    <td class="quantity-value">{{ $quantity }}</td>
                                                    <td class="cart-item-price">{{ $productPrice }} TND</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr class="total-row">
                                            <td colspan="2">Total</td>
                                            <td class="total-price">{{ $totalPrice }} TND</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            @if (session('cass'))
                                @foreach(session('cass') as $productId => $cartItem)
                                    <input type="hidden" name="produits[{{ $productId }}]" value="{{ session('clicks')[$productId] ?? 0 }}">
                                @endforeach
                            @endif
                            <input type="hidden" name="total_price" id="total_price" value="{{ $totalPrice }}">
                            <button id="submit-orderButton" class="bg-red-700 text-white font-bold py-2 px-4 rounded w-100" type="submit">
                                Envoyer la commande
                            </button>
                            
                        </form>
                        @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="d-flex justify-content-center flex-wrap categorie">
                    @foreach ($produits as $produit)
                    <form action="{{ route('caisse.add') }}" method="post">
                        @csrf
                        <input type="hidden" name="productId" value="{{ $produit->id }}">
                        <button type="submit" class="subcategory-square category-button" data-prix="{{ $produit->Prix }}">
                            {{ $produit->Nom }}
                            <div>
                                <img src="{{ $produit->photo }}" width="100px" height="100px" class="img-fluid">
                            </div>
                        </button>
                    </form>
                    @endforeach
                </div>
                <div id="order-table" class="table-responsive mt-3">
                    <h2 style="text-align: center;color:#AF2B1D;">Commandes Traités</h2>
                    <table class="table table-striped table-bordered">
                        @if (is_array($cmds) || is_object($cmds))
                        @foreach ($cmds as $index => $commande)
                            <div id="order-table" class="table-responsive mt-3">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>command n° {{ $index + 1 }}</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody id="order-table-body">
                                        @php
                                            // Decode the JSON string to an associative array
                                            $produits = json_decode($commande->produits, true);
                                        @endphp
                                        @if (is_array($produits) || is_object($produits))
                                            @foreach ($produits as $produitId => $quantite)
                                                @php
                                                    $produit = App\Models\Produit::find($produitId);
                                                @endphp
                                                <tr>
                                                    <td>{{ $produit ? $produit->Nom : 'Product not found' }}</td>
                                                    <td>{{ $quantite }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="2">No products found for this commande.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    @else
                        <p>No commands available</p>
                    @endif 
        </div>
    </div>
    <!-- Inclusion de jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function addProductToTable(productName, quantity, price) {
            var newRow = '<tr><td>' + productName + '</td><td>' + quantity + '</td><td>' + price + ' TND</td></tr>';
            $('#selected-products-body').append(newRow);
        }

        function updateTotalPrice(newTotal) {
            $('#total-price').text(newTotal.toFixed(2) + ' TND');
        }

        $('#submit-orderButton').click(function() {
            var totalPrice = parseFloat($('#total-price').text().replace(' TND', ''));
            $('#total').val(totalPrice);
        });

        function updateCartSubtotal() {
            var totalPrice = 0;
            $('#selected-products-body tr').each(function() {
                var price = parseFloat($(this).find('.cart-item-price').text().trim().replace(' TND', ''));
                var quantity = parseInt($(this).find('.quantity-value').text().trim());
                totalPrice += price * quantity;
            });
            $('#total-price').text(totalPrice.toFixed(2) + ' TND');
        }

        function updateCartQuantity(productId, action) {
            var quantityElement = $('#quantity_' + productId);
            var currentQuantity = parseInt(quantityElement.text());
            var newQuantity;
            if (action === 'minus') {
                newQuantity = Math.max(currentQuantity - 1, 0);
            } else if (action === 'plus') {
                newQuantity = currentQuantity + 1;
            }
            quantityElement.text(newQuantity);

            var priceElement = $('#price_' + productId);
            var price = parseFloat(priceElement.text().replace(' TND', ''));
            var totalPriceElement = $('#total-price');
            var totalPrice = parseFloat(totalPriceElement.text().replace(' TND', ''));
            var priceDifference = (newQuantity - currentQuantity) * price;
            var newTotalPrice = totalPrice + priceDifference;

            totalPriceElement.text(Math.max(newTotalPrice, 0).toFixed(2) + ' TND');

            updateCartSubtotal();
        }

        $(document).ready(function() {
            updateCartSubtotal();
        });

        
    </script>
    <script>
        // Obtenez la date et l'heure actuelles
        var now = new Date();
    
        // Formattez la date et l'heure pour le champ datetime-local
        var year = now.getFullYear();
        var month = (now.getMonth() + 1).toString().padStart(2, '0');
        var day = now.getDate().toString().padStart(2, '0');
        var hours = now.getHours().toString().padStart(2, '0');
        var minutes = now.getMinutes().toString().padStart(2, '0');
        var datetime = ${year}-${month}-${day}T${hours}:${minutes};
    
        // Définissez la valeur dans le champ datetime-local
        document.getElementById("heure_arrivee").value = datetime;
    </script>
    
</body>
</html>