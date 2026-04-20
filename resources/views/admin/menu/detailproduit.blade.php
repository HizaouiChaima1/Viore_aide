<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Details produit</title>
    <meta name="description" content="" />
   
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/logoo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
  

    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!-- Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!-- Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/app.js') }}" defer></script>
   
    <link rel="stylesheet" href="/assets/css/produit.css">

    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style> 
        .button-heading-container {
    display: flex;
    align-items: center; 
    justify-content: space-between; 
    margin-bottom: 20px;
}
.button-group {
    display: flex;
    gap: 10px;
}

.add-button {
    background-color: white;
    color: black;
    border-radius: 5px;
    cursor: pointer;
}

    </style>
    
</head>

<body  class=" bg-white">



@include('admin.sidebar')

     <!-- Layout container -->
 <div class="layout-page">
 @include('admin.nav')

 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                <h5 class="py-3 mb-2"><a href ="{{ route('produit.index') }}"  style="text-decoration: none; border-bottom: 1px solid black;" >  Retour</a></h5>
                     <div  class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>{{$produit->Nom}}</h4>
                        <div class="button-group">
                        @if (!$produit->deleted_at )
                        <form action ="{{ route('produit.statut', $produit->id)}}" method="POST" >
                          @csrf
                         @method('PUT')
                         <button type="submit" class="button-button">    produit {{ $produit->status }}
</button>
                          </form>                      
                        <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Modidier le produit</button>
                        @else  
                        <button type="button" id="restore-button" class="button-button"  data-bs-toggle="modal" data-bs-target="#restoreModal">Restaurer le produit</button>
                @endif </div>
                    </div>

                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                                <div class="mb-3"><label>Nom:</label><br>{{ $produit -> Nom}}</div><hr> 
                                <div class="mb-3"><label>Catégorie:</label> <br>{{ $produit ->categorie->Nom }} </div><hr> 
                                 <div class="mb-3"><label>SKU:</label>  <br> {{ $produit -> SKU}} </div><hr> 
                                 <div class="mb-3"><label>Barcode:</label><br> {{ $produit -> code_à_barre}}</div><hr> 
                                 <div class="mb-3"><label>Groupe d'impôt:</label><br>{{ $produit -> Groupe_impot}}  </div><hr> 
                                 <div class="mb-3"><label>Méthode de vente:</label><br>{{ $produit -> Méthode_vente}}  </div><hr> 
                                                         
                            </div>
                           <div class="col-md-6">
                           <div class="mb-3"><label>Temps de préparation (minute):</label><br> {{ $produit ->temp_preperation}}</div><hr>   
                                <div class="mb-3"><label>Pricing Method:</label><br> Fixed Price</div><hr> 
                                 <div class="mb-3"><label>Méthode de calcul des coûts:</label><br>  {{$produit->methode_calcul_cout}}</div><hr> 
                                 <div class="mb-3"><label>Prix:</label><br>{{ $produit -> Prix}}  </div><hr> 
                                 <div class="mb-3"><label>Calories:</label><br>{{ $produit -> calories}}</div><hr>
                                 <div class="mb-3"><label>description:</label><br>{{ $produit -> description}}</div><hr>
                            </div>
                         </div>
                    </div>
                  </div>

                     
</diV>







            
                       
                @if ($errors->any())
    <div class="alert alert-danger">
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

<!-- Modal -->
<div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="restoreModel">Confirmer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3"  action ="{{ route('produit.restaureproduit', $produit->id)}}" m method="POST" >
                 @csrf
                <div class="mb-3">
               <h4>Etes-vous sûr de vouloir restaurer ceci?</h4>
                 </div>
                 <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                  @method('PUT')
                  <button type="submit" class="btn btn-primary" id="deleteButton">Oui</button>
                 </div>
                  </form>
                </div>       
            </div>
        </div>
    </div>
    <!-- /Modal -->

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmer</h5>
                </div>
                <div class="modal-body">
                <form class="mb-3"  action ="{{ route('produit.sup', $produit->id) }}" method="POST"  enctype="multipart/form-data">
                 @csrf
                <div class="mb-3">
                   <h4>Etes-vous sûr de vouloir supprimer ceci?</h4>
                </div>
                 <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                  @method('DELETE')
                  <button type="submit" class="btn btn-primary" id="deleteButton">Oui</button>
                 </div>
                  </form>
                </div>       
            </div>
        </div>
    </div>
    <!-- /Modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier le produit</h5>
                </div>
                <div class="modal-body">
                <form class="mb-3"action="{{ route('produit.modif', $produit->id) }}" method="POST"  enctype="multipart/form-data">
                 @csrf
                 @method('PUT')
                 <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez un nom de produit">
                        <span>Nom</span>
                        <span style="color: red;">*</span>
                         <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="nom" name ="Nom"  value="{{$produit->Nom}}" >
                        </div>

                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez le photo de produit">
                        <span>Photo de produit</span>
                         <i class="fas fa-exclamation-circle"></i></label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for="nom" data-bs-toggle="tooltip" data-bs-placement="top" title="choisissez la catégorie de cette produit">
                        <span>Catégorie</span>
                        <span style="color: red;">*</span>
                        <i class="fas fa-exclamation-circle"></i></label>
                        <select class="form-control" id="Categorie" name="Categorie">
                          <option value="">Choisir...</option>
                           @foreach($categories as $categorie)
                           <option value="{{ $categorie->Nom }}" @if($produit->categorie->Nom == $categorie->Nom) selected @endif>{{ $categorie->Nom }}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Choisissez Oui si le produit doit être vendu.">
                        <span>Produit en stock</span> 
                        <i class="fas fa-exclamation-circle"></i></label>
                            <select id="pes" class="form-control" name ="Produit_en_stock" value="{{$produit->Produit_en_stock}}">
                            <option value="Oui" name ="oui">Oui</option>
                            <option value="Nom" name ="nom">Nom</option>
                            </select>
                        </div>
                        <div class="mb-2 row">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Choisissez Oui si le produit doit être vendu.">
                        <span>SKU</span> <i class="fas fa-exclamation-circle"></i></label>
                        <div class="col-sm-8">
                         <input type="text" class="form-control" id="sku" name ="SKU" value="{{$produit->SKU}}">
                        </div>
                         <div class="col-sm-2">
                        <button type="button" class="btn btn-secondary">Générer</button>
                        </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="">
                        <span>Stratégie de prix</span> <i class="fas fa-exclamation-circle"></i></label>
                            <select id="stp" class="form-control"  >
                            <option value="Méthode fixe" name ="Méthode fixe">Méthode fixe</option>
                            <option value="Prix libre" name="Prix libre">Prix libre</option>
                            </select>
                        </div>
                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Si le prix est fixe, saisissez-le ici.">
                        <span>Prix</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="prix" name ="Prix"  value ="{{$produit->Prix}}">
                        </div>
                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Choisir le groupe fiscal auquel appartient ce produit.">
                        <span>Groupe d'impot</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="gim" name ="Groupe_impot" value="{{$produit->Groupe_impot}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Le coût de ce produit devrait-il être basé sur le coût de ses ingrédients ou 
s’agit-il d’un coût fixe ?">
                        <span>Méthode de calcul des coûts</span> <i class="fas fa-exclamation-circle"></i></label>
                            <select id="dropdown" class="form-control"  name =">methode_calcul_cout">
                            <option value="Coûts fixes" name ="Coûts fixes">Coûts fixes</option>
                            <option value="A partir d'ingrédients"  name ="A partir d'ingrédients">A partir d'ingrédients</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Ce produit est-il vendu à l'unité ou au poids ?">
                        <span>Méthode de vente</span> <i class="fas fa-exclamation-circle"></i></label>
                            <select id="mdv" class="form-control" name ="Méthode_vente" value ="{{$produit->Méthode_vente}}">Ce produit est-il vendu à l'unité ou au poids ?
                            <option value="unité" name ="unité">unité</option>
                            <option value="poids" name ="poids">poids</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Si vous utilisez un lecteur de codes-barres, saisissez ici le code-barres de ce produit.">
                        <span>Code à barre</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="barcode" name ="code_à_barre" value=" {{ $produit -> code_à_barre}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Temps nécessaire à la préparation de ce produit en cuisine">
                        <span>Temps de préparation (minute)</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="temps" name ="temp_preperation" value="{{ $produit ->temp_preperation}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Les calories de ce produit.">
                        <span>Calories</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="calories" name ="calories" value ="{{ $produit -> calories}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Ajoutez une description à ce produit qui apparaîtra dans les applications
 du serveur ou du menu.">
                        <span>Description</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="description" name ="description"value=" {{ $produit -> description}}">
                        </div>
                        <div class="modal-footer">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="delete" style="margin-right: auto;">Supprimer le produit</a>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    
                    <button type="submit" class="btn btn-primary" id="saveButton">Sauvegarder</button>
                </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /Modal -->













 <!-- Bootstrap JS and jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
  $(document).ready(function() {
    $('.create-button').on('click', function() {
      $('#exampleModal').modal('show');
    });


  });
</script>



<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>

