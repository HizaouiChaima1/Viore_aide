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