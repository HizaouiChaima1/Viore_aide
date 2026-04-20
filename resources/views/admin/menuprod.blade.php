<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css')}}" />
    

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
</head>
<style>
    .subcategories {
        position: fixed;
        top: 0;
        left: 17%; /* Déplace le conteneur à partir du milieu */
        transform: translateX(-40%);
        transform: translateY(-2%); /* Centre le conteneur horizontalement */
        background-color: white; /* Fond blanc pour le cadre */
        padding: 10px; /* Espacement intérieur */
        border-radius: 3px; /* Bordure arrondie */      
        display: flex; /* Utilisation de flexbox */
        flex-wrap: wrap; /* Permettre le passage à la ligne automatique */
        justify-content: center; /* Centrer les éléments sur l'axe principal */
    }
    .subcategory-square {
            width: 150px; /* Largeur souhaitée */
            height: 150px; /* Hauteur souhaitée */
            background-color: rgb(255, 253, 253);
            padding: 10px;
            margin: 5px;
            display: flex;
            flex-direction: column; 
            align-items: center;
            justify-content: center;
            border: 2px solid black; /* Bordure noire de 2 pixels */
        }
    .subcategory-square a {
        color: black; /* Couleur du texte en noir */
        text-decoration: none;
        display: block;
    }
    .subcategory-square a:hover {
        background-color: rgb(253, 249, 249);
    }
    .subcategory-square img {
        max-width: 150%; /* Taille maximale de l'image */
        max-height: 150%;
    }
    #panier {
    position: fixed !important;
    bottom: 0;
    right: 0; 
    width: 20%;
    background-color: #f8f9fa;
    height: 100%;
    margin-bottom: 0; 
    overflow-x: auto;
}
#panier ul {
    list-style-type: none;
    justify-content: center  !important;
    padding: 0;
    margin:  auto; /* Centre le panier horizontalement */
    width: 80%; /* Ajoutez une largeur appropriée selon votre mise en page */
    max-width: 1000px; /* Limitez la largeur maximale du panier */
}
/* Style des éléments du panier */
.cart-item {
    background-color: #ffffff; /* Fond blanc */
    border-radius: 8px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); /* Ombre légère */
    margin-bottom: 10px;
    padding: 10px;
}
.cart-item-price {
    margin-top: 5px; /* Espacement entre le nom et le prix */
}

/* Boutons d'ajout/suppression de quantité */
.quantity-button {
    background-color: #f00;
    color: #fff;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    padding: 8px;
    margin: 0 5px;
    transition: background-color 0.3s ease;
    margin-left: auto;
}

.quantity-button:hover {
    background-color: #d00;
}

/* Bouton de paiement */
.checkout {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    padding: 10px 20px;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

.checkout:hover {
    background-color: #45a049;
}

/* Ajustement pour que les images s'affichent comme des carrés */
.cart-item-image {
    display: flex; /* Utiliser flexbox */
    justify-content: center; /* Centrer horizontalement */
    align-items: center;
    width: 30%;
    border-radius: 15px; /* Coins arrondis */
    overflow: hidden; /* Masque les parties supplémentaires de l'image */
}

.cart-item-image img {
    width: 100%; /* Pour s'assurer que l'image remplit entièrement le conteneur */
    height: auto; /* Pour maintenir le rapport hauteur/largeur de l'image */
    object-fit: cover; /* Redimensionne l'image pour remplir le conteneur tout en conservant son rapport d'aspect */

}
</style>
<style>
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
<body>
    <!-- Contenu HTML -->
    <section>
        <!-- Vous incluez un fichier admin.menu, je suppose que c'est un menu administrateur. Assurez-vous que le chemin d'accès est correct -->
        @include('admin.menu')
        <div class="subcategories">
            <!-- Boucle à travers les produits -->
            @foreach ($prod as $product)
            <!-- Div pour chaque sous-catégorie -->
            <div data-nom="{{ $product->Nom }}" data-id="{{ $product->id }}" data-prix="{{ $product->Prix }}">
                <!-- Formulaire pour ajouter au panier -->
                <form action="{{ route('cart.add') }}" method="POST" style="display: none;">
                    @csrf
                    <input type="hidden" name="productId" value="{{ $product->id }}">
                    <input type="hidden" name="productName" value="{{ $product->Nom }}">
                    <input type="hidden" name="productPrice" value="{{ $product->Prix }}">
                    <input type="hidden" name="productImage" value="{{ $product->photo }}">
                </form>
                <!-- Bouton pour ajouter au panier -->
                <button type="button" class=" add-to-cart subcategory-square">
                    <!-- Image du produit -->
                    <div>
                        <img src="{{ $product->photo }}" width="50px" class="img img-responsive">
                    </div>
                    <!-- Nom et prix du produit -->
                    <div>
                        <div>{{ $product->Nom }}</div>
                        <div>{{ $product->Prix }} €</div>
                    </div>
                </button>
            </div>
        @endforeach
        </div>
        <!-- Affichage du panier si des éléments sont ajoutés -->
        @if(session('cart'))
            <div id="panier" style="text-align: center !important;">
                <h3>Panier</h3>
                <ul>
                    @php
                        $totalPrice = 0;
                    @endphp
                    <!-- Boucle à travers les éléments du panier -->
                    @foreach(session('cart') as $productId => $cartItem)
                        <li class="cart-item">
                            <!-- Conteneur pour l'image, le nom et le prix -->
                            <div class="cart-item-content">
                                <!-- Image du produit -->
                                <div class="cart-item-image" style="justify-content: centre !important;">
                                    <img src="{{ $cartItem['product']->photo }}" alt="menu" class="img-fluid">
                                </div>
                                <!-- Informations sur le produit -->
                                <div class="cart-item-info" style=" flex-grow: 1;">
                                    <!-- Nom du produit -->
                                    <h3 class="cart-item-title">{{ $cartItem['product']->Nom }}</h3>
                                    <!-- Prix du produit -->
                                    <p class="cart-item-price">{{ $cartItem['product']->Prix }} €</p>
                                </div>
                            </div>
                            <!-- Boutons pour augmenter et diminuer la quantité -->
                            <div class="cart-item-quantity">
                                <button class="quantity-button" onclick="updateCartQuantity('{{ $productId }}', 'minus')">-</button>
                                <span id="quantity_{{ $productId }}" class="quantity-value">{{ session('clicks')[$productId] ?? 0 }}</span>
                                <button class="quantity-button" onclick="updateCartQuantity('{{ $productId }}', 'plus')">+</button>
                            </div>
                            <!-- Bouton pour supprimer le produit du panier -->
                           
                        </li>
                        <!-- Calcul du prix total du panier -->
                        @php
                            $totalPrice += $cartItem['product']->Prix * (session('clicks')[$productId] ?? 0);
                        @endphp
                    @endforeach
                </ul>
                <!-- Affichage du sous-total du panier -->
                <p class="subtotal">Sous-total <span>{{ $totalPrice }} €</span></p>
                <!-- Lien pour voir le panier -->
                <button type="button" class="checkout" data-bs-toggle="modal" data-bs-target="#exampleModal">Passer la commande</button>
            </div>
        @endif
    </section>

    <!-- Modèle de commande -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <form id="command-form" action="{{ route('save.command') }}" method="POST">
                        @csrf
                        <label for="nom">Nom du client:</label>
                        <input type="text" id="client" name="client">
                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date">
                        <!-- Champ caché pour le total et la liste des produits -->
                        @if (session('cart'))
                        @foreach(session('cart') as $productId => $cartItem)
                            <input type="hidden" name="produits[{{ $productId }}]" value="{{ session('clicks')[$productId] ?? 0 }}"> <!-- Utilisez [] pour créer un tableau de valeurs -->
                            @endforeach 
                        @endif

                        <!-- Afficher les produits sélectionnés avec leur quantité -->
                        <ul>
                            @if (session('cart'))
                    <ul>
                        @foreach(session('cart') as $productId => $cartItem)
                            <li>
                                {{ $cartItem['product']->Nom }} - Quantité: {{ session('clicks')[$productId] ?? 0 }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Votre panier est vide.</p>
                @endif
                        </ul>
                        <input type="hidden" id="total" name="total">
                     <!-- Modifiez votre formulaire pour inclure uniquement les produits sélectionnés -->
                     <div class="modal-footer">
                     <button type="rest" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" id="commandModal">Payer</button>
                     </div>
                    </form>
        </div>
    </div>
</div>
</div>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
$(document).ready(function() {
    // Fonction pour ajouter un produit au panier
    $('.add-to-cart').click(function() {
        // Trouver le formulaire correspondant et le soumettre
        $(this).prev('form').submit();
    });
});

function updateCartSubtotal() {
        var totalPrice = 0;
        // Parcourir tous les éléments du panier
        $('.cart-item').each(function() {
            var price = parseFloat($(this).find('.cart-item-price').text().trim().replace('€', ''));
            var quantity = parseInt($(this).find('.quantity-value').text().trim());
            totalPrice += price * quantity;
        });
        // Mettre à jour le sous-total
        $('.subtotal span').text(totalPrice.toFixed(2) + ' €');
    }
// Fonction pour augmenter ou diminuer la quantité d'un produit dans le panier
function updateCartQuantity(productId, action) {
    // Récupérer l'élément span qui affiche la quantité du produit
    var quantityElement = document.querySelector('#quantity_' + productId);

    // Récupérer la valeur actuelle de la quantité
    var currentQuantity = parseInt(quantityElement.textContent);

    // Déterminer l'action à effectuer
    var newQuantity;
    if (action === 'minus') {
        newQuantity = Math.max(currentQuantity - 1, 0); // Assurer que la quantité ne devienne pas négative
    } else if (action === 'plus') {
        newQuantity = currentQuantity + 1;
    }

    // Mettre à jour la quantité affichée
    quantityElement.textContent = newQuantity;

    // Mettre à jour le prix total du panier
    var productPrice = parseFloat(document.querySelector('.cart-item-price').textContent.replace(' €', ''));
    var totalPriceElement = document.querySelector('.subtotal span');
    var totalPrice = parseFloat(totalPriceElement.textContent.replace(' €', ''));

    // Calculer la différence de prix
    var priceDifference = (newQuantity - currentQuantity) * productPrice;

    // Mettre à jour le sous-total
    var newTotalPrice = totalPrice + priceDifference;
    totalPriceElement.textContent = Math.max(newTotalPrice, 0).toFixed(2) + ' €';

    // Mettre à jour la session côté client
    var sessionData = JSON.parse(localStorage.getItem('cartSession')) || {};
    sessionData['clicks'] = sessionData['clicks'] || {};
    sessionData['clicks'][productId] = newQuantity;
    localStorage.setItem('cartSession', JSON.stringify(sessionData));

    // Envoyer la nouvelle quantité au serveur via une requête AJAX (à implémenter)
    // Exemple de requête AJAX à envoyer au serveur pour mettre à jour la quantité du produit :
    // updateCartQuantityOnServer(productId, newQuantity);
    updateCartSubtotal();
}

// Mettre à jour le sous-total lors du chargement initial de la page
$(document).ready(function() {
    updateSubtotal();
});

// Mettre à jour le sous-total lors de chaque changement de quantité
$('.quantity-button').click(function() {
    updateSubtotal();
});

    // Envoyer la nouvelle quantité au serveur via une requête AJAX (à implémenter)
    // Exemple de requête AJAX à envoyer au serveur pour mettre à jour la quantité du produit :
    // updateCartQuantityOnServer(productId, newQuantity);

// Mettre à jour le total et les noms des produits avant de soumettre le formulaire
$('.checkout').click(function() {
    // Récupérer le total et les noms des produits depuis le panier
    var totalPrice = parseFloat($('.subtotal span').text().replace(' €', ''));
    var productNames = $('.cart-item-title').map(function() {
        return $(this).text();
    }).get().join(', ');

    // Mettre à jour les champs cachés du formulaire
    $('#total_price').val(totalPrice);
    $('#product_names').val(productNames);
});
</script>
<script>
    $(document).ready(function() {
        // Fonction pour ouvrir la modal de commande
        $('.checkout').click(function() {
            $('#commandModal').modal('show'); // Utilisez le bon ID pour la modale
        });

        // Lorsque le formulaire de la modale est soumis, collectez les informations et soumettez le formulaire principal
        $('#command-form').submit(function(event) {
            // Empêche le comportement par défaut du formulaire (rechargement de la page)
            event.preventDefault();

            // Collectez les valeurs des champs d'entrée
            var clientName = $('#nom').val();
            var commandDate = $('#date').val();
            var branch = $('#branche').val();

            // Collectez le total à partir du panier
            var totalPrice = calculateTotalPrice();
            
            // Collectez la liste des produits sélectionnés
            var selectedProducts = getSelectedProducts();

            // Mettez à jour les valeurs dans le formulaire principal
            $('#clientName').val(clientName);
            $('#commandDate').val(commandDate);
            $('#branch').val(branch);
            $('#total').val(totalPrice);
            $('#produits').val(selectedProducts);

            // Soumettez le formulaire principal
            $(this).off('submit').submit();
        });

        // Fonction pour calculer le total à partir du panier
      // Fonction pour calculer le total à partir du panier
// Fonction pour calculer le total à partir du panier
function calculateTotalPrice() {
    var totalPrice = 0;
    $('.cart-item').each(function() {
        var price = parseFloat($(this).find('.cart-item-price').text().trim().replace('€', ''));
        var quantity = parseInt($(this).find('.quantity-value').text().trim());
        console.log("Prix du produit :", price);
        console.log("Quantité du produit :", quantity);
        totalPrice += price * quantity;
    });
    // Remplacer toute valeur négative par 0
    return totalPrice >= 0 ? totalPrice : 0;
}     // Fonction pour obtenir la liste des produits sélectionnés
        function getSelectedProducts() {
            var selectedProducts = [];
            $('.cart-item').each(function() {
                var productName = $(this).find('.cart-item-title').text().trim();
                var quantity = parseInt($(this).find('.quantity-value').text().trim());
                selectedProducts.push({ name: productName, quantity: quantity });
            });
            return JSON.stringify(selectedProducts);
        }
    });
</script>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>