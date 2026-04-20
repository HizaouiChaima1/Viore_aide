<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Article</title>
    <meta name="description" content="" />

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
    <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!-- Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!-- Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    <link rel="stylesheet" href="assets/css/produit.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <style>
        .button-heading-container {
    display: flex;
    align-items: center; /* Align items vertically in the center */
    justify-content: space-between; /* Add space between the heading and the button */
    margin-bottom: 20px; /* Adjust margin as needed */
}
.center-text {
    text-align: center;
    vertical-align: middle;
    color: red;
}
.underline {
            text-decoration: underline;
            text-decoration-color: #AF2B1D;
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
                <div class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>Articles en inventaire</h4>
                        <!-- Buttons -->
                        <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Créer un article</button>
</div>
                        <!-- Table -->
                        <div class="card">
                     <div class="card-datatable table-responsive">
                        <div id="tableContainer">
                            <table class="datatables-customers table border-top" id="mainTable">
                <div class="d-flex justify-content-end"> 
          
             <thead>
                    <tr>
                        <th class="tous th-status all underline" id="tabTous"
                        onclick="showMainTable()">Tous <span class="underline"></span></th>
                    <th class="supprime th-status deleted"id="tabSupprime"
                        onclick="showNewTable()">Supprimé <span class="underline"></span> </th> 
                        <th></th>                     
                        <th></th>                                         
                      </tr>
                      @if ($tousArticle->count()>0)
                       <tr>                         
                            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                colspan="1" style="width: 18px;" data-col="1" aria-label="">
                                <input type="checkbox" class="form-check-input">
                            </th>
                            <th>Nom</th>
                            <th>SKU</th>
                            <th>Catégorie</th>                           
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                    @foreach ($tousArticle as $article)
                    <tr onclick="window.location='{{ route('article.detail', ['article' => $article->id]) }}';" style="cursor: pointer;">                                          
                            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>                           
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $article->Nom }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $article->SkU }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $article->Catégorie }} </td>                         
                        </tr>
                        @endforeach
                        @else
                        <tr>
                          <td colspan="8"  class="center-text">Commencez à ajouter les informations sur vos articles en stock pour effectuer des transactions d'inventaire et<br> utilisez les articles comme ingrédients de menu pour suivre les coûts de votre entreprise.
                          </td>
                        </tr>
                        @endif
                    </tbody>          
                </div>
                </table>

             
                <table class="datatables-customers table border-top" id="newTable"
                style="display: none;">
              
                 <thead>
                        <tr>
                            <th class="tous th-status all underline" id="tabTous"
                            onclick="showMainTable()">Tous <span class="underline"></span></th>
                        <th class="supprime th-status deleted"id="tabSupprime"
                            onclick="showNewTable()">Supprimé <span class="underline"></span></th> 
                        <th></th>                     
                        <th></th>                     
                  

                          </tr>
                          @if ($deletedArticle->count()>0)
                           <tr>                         
                                <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                    colspan="1" style="width: 18px;" data-col="1" aria-label="">
                                    <input type="checkbox" class="form-check-input">
                                </th>
                                <th>Nom</th>
                                <th>SKU</th>
                                <th>Catégorie</th>                           
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                        @foreach ($deletedArticle as $article)
                        <tr onclick="window.location='{{ route('article.detail', ['article' => $article->id]) }}';" style="cursor: pointer;">                                          
                                <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>                           
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $article->Nom }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $article->SkU }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $article->Catégorie }} </td>                         
                            </tr>
                            @endforeach
                            @else
                            <tr>
                              <td colspan="8"  class="center-text">Commencez à ajouter les informations sur vos articles en stock pour effectuer des transactions d'inventaire et<br> utilisez les articles comme ingrédients de menu pour suivre les coûts de votre entreprise.
                              </td>
                            </tr>
                            @endif
                        </tbody>          
                    </div>
                    </table>
               
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Créer un  article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3" action="{{ route('article.ajout') }}" method="GET" id="articleForm">
                 @csrf
                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez un nom de l'article">
                        <span>Nom</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="Nommm" name ="Nom"  >
                            <div class="invalid-feedback">Le nom est obligatoire.</div>
                        </div>
                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Unité de gestion des stocks, un code unique pour votre article.">
                        <span>SKU</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                         <input type="text" class="form-control" id="skuu" name ="SKU">
                         <div class="invalid-feedback">Le sku est obligatoire.</div>
                        </div>
                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Vous pouvez ajouter un élément à une catégorie, comme des légumes.">
                        <span>Catégorie</span><i class="fas fa-exclamation-circle"></i></label>
                            <select class="form-control" id="categorie" name="Catégorie">
                            <option value="">Choisir...</option>
                           @foreach($categories as $categorie)
                            <option value="{{ $categorie->Nom }}">{{ $categorie->Nom }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Comment cet article est stocké, exemple : Boîte ou KG.">
                        <span>Espace de stockage</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="espacestockagee" name ="espacestockage">
                            <div class="invalid-feedback">l'espace de stockage est obligatoire.</div>
                        </div>
                        
    
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Comment cet article est utilisé dans les ingrédients de vos produits, exemple : GRAM ou ML.">
                        <span>unité d'ingrédient</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="uniteingrediant" name ="uniteingrediant">
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
                          <input type="number" class="form-control" id="prix" name ="prix">
                          <div class="invalid-feedback">Le coûts est obligatoire.</div>
                        </div>
                       
                        <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" id="saveButton">Sauvegarder</button>
                </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /Modal -->


     <!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
 <!-- Bootstrap JS and jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.th-status').on('click', function() {
                $('.th-status').removeClass('underline');
                if ($(this).hasClass('all')) {
                    $('.all').addClass('underline');
                } else {
                    $('.deleted').addClass('underline');
                }
            });

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



<script>
  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('exampleModal');
    const form = document.getElementById('articleForm');

    form.addEventListener('submit', function(event) {
      // Prevent the default form submission
      event.preventDefault();
      
      // Clear any previous error messages
      document.querySelectorAll('.invalid-feedback').forEach(el => el.style.display = 'none');
      
      let isValid = true;
      
      // Validate Nom
      const nomInput = document.getElementById('Nommm');
      if (nomInput.value.trim() === '') {
          nomInput.classList.add('is-invalid');
          nomInput.nextElementSibling.style.display = 'block';
          isValid = false;
      } else {
          nomInput.classList.remove('is-invalid');
      }

      // Validate Référence
      const espaceInput = document.getElementById('espacestockagee');
      if (espaceInput.value.trim() === '') {
        espaceInput.classList.add('is-invalid');
        espaceInput.nextElementSibling.style.display = 'block';
          isValid = false;
      } else {
        espaceInput.classList.remove('is-invalid');
      }

      const skuInput = document.getElementById('skuu');
      if (skuInput.value.trim() === '') {
        skuInput.classList.add('is-invalid');
        skuInput.nextElementSibling.style.display = 'block';
          isValid = false;
      } else {
        skuInput.classList.remove('is-invalid');
      }

    

      // If form is valid, allow the form to submit
      if (isValid) {
          event.target.submit();
      }
    });

    // Clear error messages when the modal is closed
    modal.addEventListener('hidden.bs.modal', function () {
      clearErrorMessages();
    });

    function clearErrorMessages() {
      const invalidFeedbacks = form.querySelectorAll('.invalid-feedback');
      invalidFeedbacks.forEach(feedback => {
        feedback.style.display = 'none';
      });

      const invalidInputs = form.querySelectorAll('.is-invalid');
      invalidInputs.forEach(input => {
        input.classList.remove('is-invalid');
      });
    }
  });
</script>
    

<script>
    function showMainTable() {
        document.getElementById('mainTable').style.display = 'table';
        document.getElementById('newTable').style.display = 'none';
    }

    function showNewTable() {
        document.getElementById('mainTable').style.display = 'none';
        document.getElementById('newTable').style.display = 'table';

    }
</script>




   

<script>
  $(document).ready(function() {
    // Add click event listener to the save button
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

