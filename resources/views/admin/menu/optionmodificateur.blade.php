<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>option modificateurs</title>
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
    <style >
 .supprime.clicked + .table-body {
  /* Styles for the table body when the button is clicked, e.g., different background color */
}
</style >

<style >
#newTable {
    display: none; /* Initially hide the new table */
}
.restore-category {
    color: green;
}
</style >
<style>
   .button-heading-container {
    display: flex;
    align-items: center; /* Align items vertically in the center */
    justify-content: space-between; /* Add space between the heading and the button */
    margin-bottom: 20px; /* Adjust margin as needed */
}

.underline {
    text-decoration: underline;
    text-decoration-color: #AF2B1D;
}


        
        .center-text {
    text-align: center;
}
</style>


</head>

<body class ="bg-white">



@include ('admin.sidebar')

     <!-- Layout container -->
 <div class="layout-page  " >
 @include('admin.nav')

 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                <div  class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>Option modificateurs</h4>
                        <button  id="create-category-button" class="create-button"   data-bs-toggle="modal" data-bs-target="#exampleModal">Créer une option modificateur</button>
</div> 
                        <!-- Table -->
                        <div class="card">
                     <div class="card-datatable table-responsive">
                     <div id="tableContainer">
                <table class="datatables-customers table border-top" id="mainTable">
                <div class="d-flex justify-content-end">
             <thead>
            <tr>
            <th class="tous  th-status all underline" onclick="showMainTable()">Tous</th>
            <th class="active th-status active" onclick="showActiveTable()">Active</th>
            <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
            <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            @if ($tousOptions->count()>0)
        

            <tr>
                <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label="">
                    <input type="checkbox" class="form-check-input">
                </th>
                <th>Nom</th>
                <th>SKU</th>
                <th>Modificateur</th>
                <th>Prix</th>
                <th>Groupe d'impot</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody class="bg-white">
          @foreach ($tousOptions as $option)
            <tr onclick="window.location='{{ route('option.detail', ['option' => $option->id]) }}';" style="cursor: pointer;">  
                <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->Nom}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->SKU}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->modify->Nom}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->prix}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->groupe_impot}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->statut}}</td>
            </tr>
            @endforeach
          @else
          <tr>
            <td colspan="8" class="center-text" >Les produits sont les articles ou services vendables dans votre entreprise.<br>
              Un produit appartient à une catégorie mais il peut appartenir à plusieurs groupes de menus et avoir plusieurs balises de produit.
            </td>
          </tr>
          @endif
        </tbody>
    </table>

    <table class="datatables-customers table border-top" id="newTable" style="display: none;">
        <thead>
        <tr>
        <th class="tous  th-status all underline" onclick="showMainTable()">Tous</th>
            <th class="active th-status active" onclick="showActiveTable()">Active</th>
            <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
            <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            @if ($deletedOptions->count()>0)
         
            <tr>
                <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label="">
                    <input type="checkbox" class="form-check-input">
                </th>
                <th>Nom</th>
                <th>SKU</th>
                <th>Modificateur</th>
                <th>Prix</th>
                <th>Groupe d'impot</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody class="table-body">
          @foreach ($deletedOptions as $option)
            <tr onclick="window.location='{{ route('option.detail', ['option' => $option->id]) }}';" style="cursor: pointer;">     
                <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->Nom}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->SKU}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->modify->Nom}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->prix}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->groupe_impot}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->statut}}</td>
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


    <table class="datatables-customers table border-top" id="activeTable" style="display: none;">
        <thead>
        <tr>
        <th class="tous  th-status all underline" onclick="showMainTable()">Tous</th>
            <th class="active th-status active" onclick="showActiveTable()">Active</th>
            <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
            <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
          @if ($actifOption->count()>0)
          
            <tr>
                <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label="">
                    <input type="checkbox" class="form-check-input">
                </th>
                <th>Nom</th>
                <th>SKU</th>
                <th>Modificateur</th>
                <th>Prix</th>
                <th>Groupe d'impot</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody class="table-body">
          @foreach ($actifOption as $option)
            <tr onclick="window.location='{{ route('option.detail', ['option' => $option->id]) }}';" style="cursor: pointer;">     
                <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->Nom}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->SKU}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->modify->Nom}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->prix}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->groupe_impot}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->statut}}</td>
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


    <table class="datatables-customers table border-top" id="inactiveTable" style="display: none;">
        <thead>
        <tr>
        <th class="tous  th-status all underline" onclick="showMainTable()">Tous</th>
            <th class="active th-status active" onclick="showActiveTable()">Active</th>
            <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
            <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
           @if ($inactifOption->count()> 0)
      
            <tr>
                <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label="">
                    <input type="checkbox" class="form-check-input">
                </th>
                <th>Nom</th>
                <th>SKU</th>
                <th>Modificateur</th>
                <th>Prix</th>
                <th>Groupe d'impot</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody class="table-body">
          @foreach ($inactifOption as $option)
            <tr onclick="window.location='{{ route('option.detail', ['option' => $option->id]) }}';" style="cursor: pointer;">     
                <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->Nom}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->SKU}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->modify->Nom}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->prix}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->groupe_impot}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $option->statut}}</td>
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
</div>
</div>


 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Créer une oprion de modificateurs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3" action="{{ route('optionmodif.ajout') }}" method="POST" id="optionForm">
                 @csrf
                <div class="mb-3">
                <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="le nom de l'option du modificateur">
                  <span>Nom</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                 <input type="text" class="form-control" id="Nommm" name="Nom">
                 <div class="invalid-feedback">Le nom est obligatoire.</div>
                 </div>
                 <div class="mb-3">
                <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="choisissez le modificateur de cette option">
                  <span>Modificateur</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                <select class="form-control" id="modificateurr" name="modificateur">
                          <option value="">Choisir...</option>
                           @foreach($modif as $modif)
                            <option value="{{ $modif->Nom }}">{{ $modif->Nom }}</option>
                            @endforeach
                            </select>
                            <div class="invalid-feedback">Le modificateur est obligatoire.</div>
                 </div>
                 <div class="mb-3">
                 <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="L'unité de gestion des stocks est un code composé de chiffres ou de lettres.">
                  <span>SKU</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                 <input type="text" class="form-control" id="SKUu" name="SKU">
                 <div class="invalid-feedback">sku est obligatoire.</div>
                 </div>
                 <div class="mb-3">
                 <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Pour définir le prix de l’option de modificateur">
                  <span>Prix</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                 <input type="number" class="form-control" id="prixx" name="prix">
                 <div class="invalid-feedback">Le prix est obligatoire.</div>
                 </div>
                 <div class="mb-3">
                <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Pour choisir le groupe de d'impot appliqué à cette option de modificateur.">
                  <span>Groupe d'impôt</span> <i class="fas fa-exclamation-circle"></i></label>
                 <input type="text" class="form-control" id="groupe_impot" name="groupe_impot">
                 </div>
                 <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Choisissez le mode de calcul du coût des options de modificateur.">
                  <span>Méthode de calcul des coûts</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <select id="mccc" class="form-control" name ="méthode_calcul_couts">
                            <option value="Coûts fixes" name ="Coûts fixes">Coûts fixes</option>
                            <option value="A partir d'ingrédients" name="A partir d'ingrédients">A partir d'ingrédients</option>
                            </select>
                        </div>
                        <div class="mb-3" id="prixContainer" style="display: none;">
                   <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Coût fixe par unité.">
                  <span>coût</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                 <input type="text" class="form-control" id="coutt" name="cout">
                 <div class="invalid-feedback">La coûts est obligatoire.</div>
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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

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
    const modal = document.getElementById('exampleModal');
    const form = document.getElementById('optionForm');

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
      const categorieInput = document.getElementById('modificateurr');
      if (categorieInput.value.trim() === '') {
        categorieInput.classList.add('is-invalid');
        categorieInput.nextElementSibling.style.display = 'block';
          isValid = false;
      } else {
        categorieInput.classList.remove('is-invalid');
      }

      const skuInput = document.getElementById('SKUu');
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
      const mccInput = document.getElementById('mccc');
      if (mccInput.value.trim() === '') {
        mccInput.classList.add('is-invalid');
        mccInput.nextElementSibling.style.display = 'block';
          isValid = false;
      } else {
        mccInput.classList.remove('is-invalid');
      }

      const coutInput = document.getElementById('coutt');
      if ((coutInput.value.trim() === '')&&  (mccInput.value.trim() === 'Coûts fixes') ){
        coutInput.classList.add('is-invalid');
        coutInput.nextElementSibling.style.display = 'block';
          isValid = false;
      } else {
        coutInput.classList.remove('is-invalid');
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
    function setId(id) {
      document.getElementById('deleteForm').action = "{{ route('modif.efface', ['modif' => ':id']) }}".replace(':id', id);
      document.getElementById('restoreForm').action = "{{ route('modif.restore', ['modif' => ':id']) }}".replace(':id', id);
      
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
  $(document).ready(function() {
    // Add click event listener to the save button
    $('.create-button').on('click', function() {
      $('#exampleModal').modal('show');
    });
  });
</script>

<script src="assets/vendor/libs/jquery/jquery.js"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>

