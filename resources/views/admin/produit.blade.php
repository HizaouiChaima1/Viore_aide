<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>produit</title>
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
    <link rel="stylesheet" href="assets/css/produit.css">
    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!-- Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!-- Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>

  


    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    
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
}</style>

<style >
 .supprime.clicked + .table-body {
  /* Styles for the table body when the button is clicked, e.g., different background color */
}
</style >

<style >
#newTable {
    display: none;
}
.error-message {
    color: red;
    font-size: 0.875em;
}
.underline {
    text-decoration: underline;
    text-decoration-color: #AF2B1D;
}
.center-text {
    text-align: center;
    vertical-align: middle;
    color: red;
}


</style >
    
</head>

<body  class=" bg-white">



@include('admin.sidebar')

     <!-- Layout container -->
 <div class="layout-page">
        
 @include('admin.nav')
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="dev">
          <div  class="button-heading-container">
                <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>Produits</h4>
                <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">créer un produit</button>
          </div>
          
          <div class="card">
  <div class="card-datatable table-responsive">
    <div id="tableContainer">
      <!-- Main Table -->
      <table class="datatables-customers table border-top" id="mainTable">
        <thead>
          <tr>
            <th class="tous  th-status all underline" onclick="showMainTable()">Tous</th>
            <th class="active th-status active" onclick="showActiveTable()">Active</th>
            <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
            <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          @if ($tousProduit->count()>0)
         
          <tr>
            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label="">
              <input type="checkbox" class="form-check-input"> </th>
            <th></th>
            <th>Nom</th>
            <th>SKU</th>
            <th>Catégorie</th>
            <th>Prix</th>
            <th>Groupe d'impôt</th>
            <th>Status</th>
          </tr>
        </thead>
        @foreach ($tousProduit as $produit)
        <tbody class="table-body">
          <tr onclick="window.location='{{ route('produit.detail', ['produit' => $produit->id]) }}';" style="cursor: pointer;">
            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
              <img src="{{ $produit->photo}}" width="50" height="50" class="img img-responsive" />
            </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->Nom}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $produit->SKU}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
              {{ $produit->categorie->Nom }}  </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->Prix}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->Groupe_impot}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->status}} </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="8" class="center-text ">Les produits sont les articles ou services vendables dans votre entreprise.<br>
              Un produit appartient à une catégorie mais il peut appartenir à plusieurs groupes de menus et avoir plusieurs balises de produit.
            </td>
          </tr>
          @endif
        </tbody>
      </table>

      <!-- New Table (Supprimé) -->
      <table class="datatables-customers table border-top" id="newTable" style="display: none;">
        <thead>
          <tr>
          <th class="tous  th-status all" onclick="showMainTable()">Tous</th>
            <th class="active th-status active" onclick="showActiveTable()">Active</th>
            <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
            <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          @if ($deletedProduit ->count()>0)
         
          <tr>
            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label="">
              <input type="checkbox" class="form-check-input">
            </th>
            <th></th>
            <th>Nom</th>
            <th>SKU</th>
            <th>Catégorie</th>
            <th>Prix</th>
            <th>Groupe d'impôt</th>
            <th>Active</th>
          </tr>
        </thead>
        <tbody class="table-body">
        @foreach ($deletedProduit  as $produit)
          <tr onclick="window.location='{{ route('produit.detail', ['produit' => $produit->id]) }}';" style="cursor: pointer;">
            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
              <img src="{{ $produit->photo}}" width="50" height="50" class="img img-responsive" /></td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->Nom}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->SKU}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $produit->categorie->Nom }} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->Prix}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->Groupe_impot}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->status}} </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="8" class="center-text ">Les produits sont les articles ou services vendables dans votre entreprise.<br>
              Un produit appartient à une catégorie mais il peut appartenir à plusieurs groupes de menus et avoir plusieurs balises de produit.
            </td>
          </tr>
          @endif
        </tbody>
      </table>

      <!-- Active Table -->
      <table class="datatables-customers table border-top" id="activeTable" style="display: none;">
        <thead>
          <tr>
          <th class="tous  th-status all" onclick="showMainTable()">Tous</th>
            <th class="active th-status active" onclick="showActiveTable()">Active</th>
            <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
            <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          @if ($actifProduits->count() > 0)
        
          <tr>
            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label="">
              <input type="checkbox" class="form-check-input">
            </th>
            <th></th>
            <th>Nom</th>
            <th>SKU</th>
            <th>Catégorie</th>
            <th>Prix</th>
            <th>Groupe d'impôt</th>
            <th>Active</th>
          </tr>
        </thead>
        <tbody class="table-body">
        @foreach ($actifProduits as $produit)
          <tr onclick="window.location='{{ route('produit.detail', ['produit' => $produit->id]) }}';" style="cursor: pointer;">
            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
              <img src="{{ $produit->photo}}" width="50" height="50" class="img img-responsive" /></td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->Nom}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->SKU}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->categorie->Nom }} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->Prix}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->Groupe_impot}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->status}} </td>
          </tr>

          @endforeach
          @else
          <tr>
            <td colspan="8" class="center-text ">Les produits sont les articles ou services vendables dans votre entreprise.<br>
              Un produit appartient à une catégorie mais il peut appartenir à plusieurs groupes de menus et avoir plusieurs balises de produit.
            </td>
          </tr>
          @endif
        </tbody>
      </table>

      <!-- Inactive Table -->
      <table class="datatables-customers table border-top" id="inactiveTable" style="display: none;">
        <thead>
          <tr>
          <th class="tous  th-status all" onclick="showMainTable()">Tous</th>
            <th class="active th-status active" onclick="showActiveTable()">Active</th>
            <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
            <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          @if ($inactifProduits->count() > 0)
        
          <tr>
            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label="">
              <input type="checkbox" class="form-check-input">
            </th>
            <th></th>
            <th>Nom</th>
            <th>SKU</th>
            <th>Catégorie</th>
            <th>Prix</th>
            <th>Groupe d'impôt</th>
            <th>Active</th>
          </tr>
        </thead>
        <tbody class="table-body">  
        @foreach ($inactifProduits as $produit)         
          <tr onclick="window.location='{{ route('produit.detail', ['produit' => $produit->id]) }}';" style="cursor: pointer;">
            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
              <img src="{{ $produit->photo}}" width="50" height="50" class="img img-responsive" /></td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->Nom}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->SKU}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->categorie->Nom }} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->Prix}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->Groupe_impot}} </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $produit->status}} </td>
          </tr>
        
          @endforeach
          @else
          <tr>
            <td colspan="8" class="center-text ">Les produits sont les articles ou services vendables dans votre entreprise.<br>
              Un produit appartient à une catégorie mais il peut appartenir à plusieurs groupes de menus et avoir plusieurs balises de produit.
            </td>
          </tr>
          @endif
        </tbody>
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




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Créer un  produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3" action="{{ route('produit.ajout') }}" method="POST"  enctype="multipart/form-data"  id ="produitForm">
                 @csrf
                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez un nom de produit">
                        <span>Nom</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="Nommm" name ="Nom"  >
                            <div class="invalid-feedback">Le nom est obligatoire.</div>
                        </div>

                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez une photo pour la produit">
                        <span>photo de produit</span></label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        </div>

                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="choisissez la catégorie de cette produit">
                        <span>Catégorie</span> <span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                        <select class="form-control" id="Categorieee" name="Categorie">
                          <option value="">Choisir...</option>
                           @foreach($categories as $categorie)
                            <option value="{{ $categorie->Nom }}">{{ $categorie->Nom }}</option>
                            @endforeach
                            </select>
                            <div class="invalid-feedback">Le catégorie est obligatoire.</div>
                        </div>

                        <div class="mb-3">
                        <label class="form-label" for="nom" data-bs-toggle="tooltip" data-bs-placement="top" title="choisissez oui si le produit doit être vendu">Produit en stock <i class="fas fa-exclamation-circle"></i></label>
                            <select id="Produit_en_stock" name ="Produit_en_stock" class="form-control">
                            <option value="oui" name="oui">Oui</option>
                            <option value="nom" name ="non">Non</option>
                            </select>
                        </div>
                        
                        <div class="mb-2 row">
                        <label class="form-label" for="nom" data-bs-toggle="tooltip" data-bs-placement="top" title="code unique pour le produit">SKU <i class="fas fa-exclamation-circle"></i></label>
                        <div class="col-sm-8">
                         <input type="text" class="form-control" id="skuu" name ="SKU">
                         <div class="invalid-feedback">Sku est obligatoire.</div>
                        </div>
                         <div class="col-sm-2">
                        <button type="button" class="btn btn-secondary">Générer</button>
                        </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Le prix ouvert signifie que le prix peut être saisi par le caissier, sinon choisissez fixe."><span>Stratégie de prix</span>  <i class="fas fa-exclamation-circle"></i></label>
                            <select id="stp" class="form-control">
                            <option value="option1">Méthode fixe</option>
                            <option value="option2">Prix libre</option>
                            </select>
                        </div>

                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrer le prix de ce produit."><span>Prix</span>  <i class="fas fa-exclamation-circle"></i></label>
                            <input type="number" class="form-control" id="prixx" name ="Prix">
                            <div class="invalid-feedback">Le prix est obligatoire.</div>
                        </div>

                        <div class="mb-3">
                 <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Pour choisir le groupe fiscal auquel appartient ce produit."><span>Groupe d'impot</span>  <i class="fas fa-exclamation-circle"></i></label>
                 <input type="text" class="form-control" id="Groupe_impot" name="Groupe_impot">
                 </div>

                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Pour choisir le groupe fiscal auquel appartient ce produit."><span>Méthode de calcul des coûts</span>  <i class="fas fa-exclamation-circle"></i></label>
                            <select id="methode_calcul_cout" name ="methode_calcul_cout" class="form-control" >
                            <option value="Coûts fixes" name ="Coûts fixes">Coûts fixes</option>
                            <option value="A partir d'ingrédients" name="A partir d'ingrédients">A partir d'ingrédients</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Ce produit est-il vendu à l'unité ou au poids ?"><span>Méthode de vente</span>  <i class="fas fa-exclamation-circle"></i></label>
                            <select id="Méthode_vente" name ="Méthode_vente"class="form-control">
                            <option value="unité" name ="unité">unité</option>
                            <option value="poids" name ="poids">poids</option>
                            </select>
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

     <!-- Bootstrap CSS -->




 <!-- Bootstrap JS and jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>
function showMainTable() {
  document.getElementById('mainTable').style.display = 'table';
  document.getElementById('newTable').style.display = 'none';
  document.getElementById('activeTable').style.display = 'none';
  document.getElementById('inactiveTable').style.display = 'none';
}

function showNewTable() {
  document.getElementById('mainTable').style.display = 'none';
  document.getElementById('newTable').style.display = 'table';
  document.getElementById('activeTable').style.display = 'none';
  document.getElementById('inactiveTable').style.display = 'none';
}

function showActiveTable() {
  document.getElementById('mainTable').style.display = 'none';
  document.getElementById('newTable').style.display = 'none';
  document.getElementById('activeTable').style.display = 'table';
  document.getElementById('inactiveTable').style.display = 'none';
}

function showInactiveTable() {
  document.getElementById('mainTable').style.display = 'none';
  document.getElementById('newTable').style.display = 'none';
  document.getElementById('activeTable').style.display = 'none';
  document.getElementById('inactiveTable').style.display = 'table';
}
</script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    $('.th-status').on('click', function () {
      $('.th-status').removeClass('underline');               
            if ( $(this).hasClass('all')){
              $('.all').addClass('underline');
            } else if ( $(this).hasClass('deleted')){
              $('.deleted').addClass('underline');
            }else if ( $(this).hasClass('active')){
              $('.active').addClass('underline');
            }else {
              $('.inactive').addClass('underline');
            }
    });

    const modal = document.getElementById('exampleModal');
    const form = document.getElementById('produitForm');

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
      const categorieInput = document.getElementById('Categorieee');
      if (categorieInput.value.trim() === '') {
        categorieInput.classList.add('is-invalid');
        categorieInput.nextElementSibling.style.display = 'block';
          isValid = false;
      } else {
        categorieInput.classList.remove('is-invalid');
      }

      const skuInput = document.getElementById('skuu');
      if (skuInput.value.trim() === '') {
        skuInput.classList.add('is-invalid');
        skuInput.nextElementSibling.style.display = 'block';
          isValid = false;
      } else {
        skuInput.classList.remove('is-invalid');
      }

      const prixInput = document.getElementById('prixx');
      if (prixInput.value.trim() === '') {
        prixInput.classList.add('is-invalid');
        prixInput.nextElementSibling.style.display = 'block';
          isValid = false;
      } else {
        prixInput.classList.remove('is-invalid');
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
document.addEventListener("DOMContentLoaded", function() {
    var headers = document.querySelectorAll("th"); // Get all table headers

    headers.forEach(function(header) {
        header.addEventListener("click", function() {
            // Remove "active-header" class from all headers
            headers.forEach(function(h) {
                h.classList.remove("active-header");
            });

            // Add "active-header" class to the clicked header
            header.classList.add("active-header");
        });
    });
});
</script>
<script>
  $(document).ready(function() {
    // Add click event listener to the save button
    $('.create-button').on('click', function() {
      $('#exampleModal').modal('show');
    });
  });
</script>

    <!-- Inclure Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap"></script>
    <!-- Inclure les fichiers JavaScript requis de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>

