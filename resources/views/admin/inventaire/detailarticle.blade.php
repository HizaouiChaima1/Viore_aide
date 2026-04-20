<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Details article</title>
    <meta name="description" content="" />
    <link rel="stylesheet" href="{{asset('assets/css/produit.css')}}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/logoo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/vendor/js/template-customizer.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
       
        .button-heading-container {
    display: flex;
    align-items: center; /* Align items vertically in the center */
    justify-content: space-between; /* Add space between the heading and the button */
    margin-bottom: 20px; /* Adjust margin as needed */
}

.add-button {
    background-color: white;
    color: black;
    border-radius: 5px;
    cursor: pointer;
}

    </style>
    
</head>

<body class="bg-white">



@include ('admin.sidebar')

     <!-- Layout container -->
 <div class="layout-page">
  @include ('admin.nav')

 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                     <h5 class="py-3 mb-2"><a href ="{{ route('article.back') }}">Retour</a></h5>
                     <div  class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>{{ $article->Nom }}</h4>

                        @if (!$article->deleted_at )                 
                        <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Modidier l'article</button>
                         @else  
                         <button type="button" id="restore-button" class="button-button"  data-bs-toggle="modal" data-bs-target="#restoreModal">Restaurer l'article</button>
                        @endif     
                        </div>
                        <div class="card">
                    <div class="card-body">
                       <div class="row">
                       <!-- Left half -->
                         <div class="col-md-6">
                                <div class="mb-3"><label>Nom:</label><br>   {{ $article->Nom }}</div><hr> 
                                <div class="mb-3"><label>Catégorie:</label><br>  {{ $article->Catégorie }}</div><hr>
                                 <div class="mb-3"><label>SKU:</label><br> {{ $article->SkU}} </div><hr>
                                 <div class="mb-3"><label>Prix:</label><br>{{ $article->prix}}</div><hr>

                                 </div>
            <!-- Right half -->
            <div class="col-md-6">
                           
                                
                                 <div class="mb-3"><label>Espace de stockage</label><br>  {{ $article->espacestockage}}</div><hr>
                                 <div class="mb-3"><label>unité d'ingrédient:</label><br> {{ $article->uniteingrediant}}</div><hr>
                                 <div class="mb-3"><label>Methode de calcul de cout:</label><br> {{ $article->methodedecalcul}}</div><hr>
                            
</div> 
                         </div>
                         </div>
</div>







            
                       
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
            <form class="mb-3"  action ="{{ route('article.restaurearticle', ['id' => $article->id])}}"  method="POST" >
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

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="mb-3"  action ="{{ route('article.sup', $article->id) }}" method="POST"  enctype="multipart/form-data">
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
                    <h5 class="modal-title" id="exampleModalLabel">Créer un  produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3" action="{{ route('article.modif', $article->id) }}" method="POST">
                 @csrf
                 @method('PUT')
                 <div class="mb-3">
                  <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez un nom de l'article">
                  <span>Nom</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                      <input type="text" class="form-control" id="Nommm" name ="Nom"   value ="{{$article->Nom}}">
                      <div class="invalid-feedback">Le nom est obligatoire.</div>
                  </div>
                  <div class="mb-3">
                  <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Unité de gestion des stocks, un code unique pour votre article.">
                  <span>SKU</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                   <input type="text" class="form-control" id="skuu" name ="SKU" value ="{{$article->SkU}}">
                   <div class="invalid-feedback">Le sku est obligatoire.</div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Vous pouvez ajouter un élément à une catégorie, comme des légumes.">
                        <span>Catégorie</span><i class="fas fa-exclamation-circle"></i></label>
                    <select class="form-control" id="categorie" name="Catégorie">
                        <option value="">Choisir...</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->Nom }}" @if($categorie->Nom == $article->Catégorie) selected @endif>{{ $categorie->Nom }}</option>
                        @endforeach
                    </select>
                </div>
                  <div class="mb-3">
                      <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Comment cet article est stocké, exemple : Boîte ou KG.">
                  <span>Espace de stockage</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                      <input type="text" class="form-control" id="espacestockagee" name ="espacestockage" value ="{{ $article->espacestockage}}">
                      <div class="invalid-feedback">l'espace de stockage est obligatoire.</div>
                  </div>
                  

                  <div class="mb-3">
                      <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Comment cet article est utilisé dans les ingrédients de vos produits, exemple : GRAM ou ML.">
                  <span>unité d'ingrédient</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                      <input type="text" class="form-control" id="uniteingrediant" name ="uniteingrediant" value ="{{ $article->uniteingrediant}}">
                  </div>
                  
                 
                  <div class="mb-3">
                      <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Si vous n'avez pas de coût fixe pour cet article, il sera calculé à partir des transactions d'achat.">
                  <span>Méthode de calcul des coûts</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                      <select id="mccc" class="form-control" name= "methodedecalcul">
                      <option value="">Choisir...</option>
                      <option value="Coûts fixes">Coûts fixes</option>
                      <option value="de la transaction">de la transaction</option>
                      </select>
                  </div>

                  <div class="mb-3" id="prixContainer" style="display: none;">
                  <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez un prix de l'article">
                  <span>Coûts</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                    <input type="number" class="form-control" id="prix" name ="prix" value ="{{ $article->prix}}" >
                    <div class="invalid-feedback">Le coûts est obligatoire.</div>
                  </div>
           
                        <div class="modal-footer">                                                    
                 <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="delete" >Supprimer la fournisseur</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" id="saveButton">Sauvegarder</button>
                </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /Modal -->



 









    <script>
      document.addEventListener('DOMContentLoaded', function() {
          const selectElement = document.getElementById('mccc');
          const prixContainer = document.getElementById('prixContainer');
  
          selectElement.addEventListener('change', function() {
              if (this.value === 'Coûts fixes') {
                  prixContainer.style.display = 'block';
              } else {
                  prixContainer.style.display = 'none';
              }
          });
  
          // To handle the initial load state
          if (selectElement.value === 'Coûts fixes') {
              prixContainer.style.display = 'block';
          } else {
              prixContainer.style.display = 'none';
          }
      });
  </script>



 <!-- Bootstrap JS and jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
  $(document).ready(function() {
    $('.create-button').on('click', function() {
      $('#exampleModal').modal('show');
    });

    $('.#tags-button').on('click', function() {
      $('#tagsModal').modal('show');}

      $('.#modif-button').on('click', function() {
      $('#modificateursmodal').modal('show');}

      $('.#ingredient-button').on('click', function() {
      $('#ingrédientsmodal').modal('show');}

      $('.#prix-button').on('click', function() {
      $('#branchemodal').modal('show');
      
    });
  });
</script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>

