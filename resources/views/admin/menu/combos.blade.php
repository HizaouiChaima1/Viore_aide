<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>combos</title>
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
    <script src="assets/vendor/js/template-customizer.js"></script>
    <script src="assets/js/config.js"></script>
    <link rel="stylesheet" href="assets/css/produit.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />


    <style>
        .button-heading-container {
    display: flex;
    align-items: center; /* Align items vertically in the center */
    justify-content: space-between; /* Add space between the heading and the button */
    margin-bottom: 20px; /* Adjust margin as needed */
}
</style>
<style >
 .supprime.clicked + .table-body {
  /* Styles for the table body when the button is clicked, e.g., different background color */
}
</style >

<style >
#newTable {
    display: none; /* Initially hide the new table */
}
.underline {
    text-decoration: underline;
    text-decoration-color: #AF2B1D;
}
</style >
  
</head>

<body class="bg-white">


 
@include ('admin.sidebar')

     <!-- Layout container -->
 <div class="layout-page">
       
 @include('admin.nav')
 <!-- Content wrapper -->
 <div class="content-wrapper  >
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y   bg-white">
                <div class="dev">
                <div class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>Combinaisons</h4>                    
                        <button type="button" id="create-produit-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">créer une combinitions</button>
</div>
                        <!-- Table -->
                        
                        <div class="card">
                     <div class="card-datatable table-responsive">
                     <div id="tableContainer">
          <table class="datatables-customers table border-top"   id="mainTable">
                <div class="d-flex justify-content-end"> 
        
    
             <thead>
                    <tr>
                      <th class="tous  th-status all underline" onclick="showMainTable()">Tous</th>
            <th class="active th-status active" onclick="showActiveTable()">Active</th>
            <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
            <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
                            <th></th>
                            <th></th>
                      </tr> 
                            @if ($Combos->isEmpty())
                     <tr>
                      <td colspan="8">À l’aide des Combos, vous pouvez vendre un ensemble spécifié de produits à un prix différent de celui s’ils étaient vendus séparément.
                       </td>
                        </tr>
                      @else                          
                        <tr>                         
                            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                colspan="1" style="width: 18px;" data-col="1" aria-label="">
                                <input type="checkbox" class="form-check-input">
                            </th>
                            <th></th>
                            <th>Nom</th>
                            <th>SKU</th>
                            <th>Catégorie</th>
                            <th>Status</th>
                        </tr>                    
                    </thead>
                    <tbody class="bg-white">
                    @foreach ($Combos as $comboss)
                    @if (!$comboss->deleted_at )
                    <tr onclick="window.location='{{ route('combos.detail', ['combos' => $comboss->id]) }}';" style="cursor: pointer;">                                                  
                            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>                            
                           <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <img src="{{$comboss->photo}}" width ="50"height ="50"class ="img img-responsive"/></td>          
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $comboss->nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $comboss->sku}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $comboss->category->Nom}} </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $comboss->status}} </td>   
                        </tr>
                        @endif
                        @endforeach 
                    </tbody>     
                    @endif 
                  </div>
           </table>


    <table class="datatables-customers table border-top" id="newTable" style="display: none;">
             <thead>
                    <tr>
                      <th class="tous  th-status all" onclick="showMainTable()">Tous</th>
                      <th class="active th-status active" onclick="showActiveTable()">Active</th>
                      <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
                      <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
                            <th></th>
                            <th></th>
                      </tr> 
                      </thead>
                      <tbody class="bg-white">
                            @if ($Combos->isEmpty())
                     <tr>
                      <td colspan="8">À l’aide des Combos, vous pouvez vendre un ensemble spécifié de produits à un prix différent de celui s’ils étaient vendus séparément.
                       </td>
                        </tr>
                      @else                          
                        <tr>                         
                            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                colspan="1" style="width: 18px;" data-col="1" aria-label="">
                                <input type="checkbox" class="form-check-input">
                            </th>
                            <th></th>
                            <th>Nom</th>
                            <th>SKU</th>
                            <th>Catégorie</th>
                            <th>Status</th>
                        </tr>                    
                    @foreach ($Combos as $combos)
                    @if ($combos->deleted_at )
                    <tr onclick="window.location='{{ route('combos.detail', ['combos' => $combos->id]) }}';" style="cursor: pointer;">                                                  
                            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>                            
                           <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <img src="{{$combos->photo}}" width ="50"height ="50"class ="img img-responsive"/></td>          
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $combos->nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $combos->sku}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $combos->category->Nom}} </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $combos->status}} </td>   
                        </tr>
                        @endif
                        @endforeach 
                        @endif 
                    </tbody>     
                  </div>
           </table>


           <table class="datatables-customers table border-top"  id="activeTable" style="display: none;">
                <div class="d-flex justify-content-end"> 
     
             <thead>
                    <tr>
                      <th class="tous  th-status all" onclick="showMainTable()">Tous</th>
            <th class="active th-status active" onclick="showActiveTable()">Active</th>
            <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
            <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
                            <th></th>
                            <th></th>
                      </tr> 
                            @if ($Combos->isEmpty())
                     <tr>
                      <td colspan="8">À l’aide des Combos, vous pouvez vendre un ensemble spécifié de produits à un prix différent de celui s’ils étaient vendus séparément.
                       </td>
                        </tr>
                      @else                          
                        <tr>                         
                            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                colspan="1" style="width: 18px;" data-col="1" aria-label="">
                                <input type="checkbox" class="form-check-input">
                            </th>
                            <th></th>
                            <th>Nom</th>
                            <th>SKU</th>
                            <th>Catégorie</th>
                            <th>Status</th>
                        </tr>                    
                    </thead>
                    <tbody class="bg-white">
                    @foreach ($Combos as $combos)
                    @if ($combos->status == 'Actif')
                    <tr onclick="window.location='{{ route('combos.detail', ['combos' => $combos->id]) }}';" style="cursor: pointer;">                                                  
                            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>                            
                           <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <img src="{{$combos->photo}}" width ="50"height ="50"class ="img img-responsive"/></td>          
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $combos->nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $combos->sku}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $combos->category->Nom}} </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $combos->status}} </td>   
                        </tr>
                        @endif
                        @endforeach 
                    </tbody>  
                    @endif    
                  </div>
           </table>


           <table class="datatables-customers table border-top" id="inactiveTable" style="display: none;">
                <div class="d-flex justify-content-end"> 
     
             <thead>
                    <tr>
                      <th class="tous  th-status all underline" onclick="showMainTable()">Tous</th>
                      <th class="active th-status active" onclick="showActiveTable()">Active</th>
                      <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
                      <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
                            <th></th>
                            <th></th>
                      </tr> 
                            @if ($Combos->isEmpty())
                     <tr>
                      <td colspan="8">À l’aide des Combos, vous pouvez vendre un ensemble spécifié de produits à un prix différent de celui s’ils étaient vendus séparément.
                       </td>
                        </tr>
                      @else                          
                        <tr>                         
                            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                colspan="1" style="width: 18px;" data-col="1" aria-label="">
                                <input type="checkbox" class="form-check-input">
                            </th>
                            <th></th>
                            <th>Nom</th>
                            <th>SKU</th>
                            <th>Catégorie</th>
                            <th>Status</th>
                        </tr>                    
                    </thead>
                    <tbody class="bg-white">
                    @foreach ($Combos as $combos)
                    @if ($combos->status == 'Inactif')
                    <tr onclick="window.location='{{ route('combos.detail', ['combos' => $combos->id]) }}';" style="cursor: pointer;">                                                  
                            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>                            
                           <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <img src="{{$combos->photo}}" width ="50"height ="50"class ="img img-responsive"/></td>          
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $combos->nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $combos->sku}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $combos->category->Nom}} </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $combos->status}} </td>   
                        </tr>
                        @endif
                        @endforeach 
                    </tbody>  
                    @endif    
                  </div>
           </table>
</div>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Créer une  combinaison</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form   class="mb-3" action="{{ route('combos.ajout') }}" method="POST"  enctype="multipart/form-data"  id ="combosForm">
                      @csrf
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez un nom de ce combo">
                        <span>Nom</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="nomm" name ="nom" >
                            <div class="invalid-feedback">Le nom est obligatoire.</div>
                        </div>
                        <div class="mb-3">
                      <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez le photo de ce combo">
                        <span>Photo de combinaison</span> <i class="fas fa-exclamation-circle"></i></label>
                       <input type="file" class="form-control" id="photo" name="photo">
                       </div>
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Choisissez la catégorie de ce combo.">
                        <span>Catégorie</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <select class="form-control" id="categoriee" name="categorie">
                             <option value="">Choisir...</option>
                               @foreach($categories as $categorie)
                                   <option value="{{ $categorie->Nom }}">{{ $categorie->Nom }}</option>
                                    @endforeach
                                 </select>
                                 <div class="invalid-feedback">Le catégorie est obligatoire.</div>
                        </div>
                    
                        <div class="mb-2 row">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Stock Keeping Unit is a code of numbers or letters identify the combo.">
                        <span>SKU</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                        <div class="col-sm-8">
                         <input type="text" class="form-control" id="skuu" name ="sku">
                         <div class="invalid-feedback">Le SKU est obligatoire.</div>
                        </div>
                         <div class="col-sm-2">
                        <button type="button" class="btn btn-secondary">Générer</button>
                        </div>
                        </div>
                       <div>
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

 <!-- Bootstrap JS and jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>



    
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
    const form = document.getElementById('combosForm');

    form.addEventListener('submit', function(event) {
      // Prevent the default form submission
      event.preventDefault();
      
      // Clear any previous error messages
      document.querySelectorAll('.invalid-feedback').forEach(el => el.style.display = 'none');
      
      let isValid = true;
      
      // Validate Nom
      const nomInput = document.getElementById('nomm');
      if (nomInput.value.trim() === '') {
          nomInput.classList.add('is-invalid');
          nomInput.nextElementSibling.style.display = 'block';
          isValid = false;
      } else {
          nomInput.classList.remove('is-invalid');
      }

      // Validate Référence
      const categorieInput = document.getElementById('categoriee');
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
  $(document).ready(function() {
    $('.create-button').on('click', function() {
      $('#exampleModal').modal('show');
    });
  });

</script>


</script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>

