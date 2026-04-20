<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>modificateurs</title>
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

 
    <script src="assets/vendor/js/helpers.js"></script>

    <script src="assets/vendor/js/template-customizer.js"></script>

    <script src="assets/js/config.js"></script>
    <link rel="stylesheet" href="assets/css/produit.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    

    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet"> 
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

<body class="bg-white">



@include ('admin.sidebar')

     <!-- Layout container -->
 <div class="layout-page  " >
 @include('admin.nav')

 <!-- Content wrapper -->
 <div class="content-wrapper bg-white">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                <div  class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>Modificateurs</h4>
                        <button  id="create-category-button" class="create-button"   data-bs-toggle="modal" data-bs-target="#exampleModal">Créer un modificateur</button>
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
                onclick="showNewTable()">Supprimé <span class="underline"></span>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            @if ($tousmodif->count()>0)
            <tr>
                <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label="">
                    <input type="checkbox" class="form-check-input">
                </th>
                <th>Nom</th>
                <th>Référence</th>
                <th>Options</th>
                <th>Produits liés</th>
                <th>Créé</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($tousmodif as $modification)         
           <tr  class="clickable-row" data-bs-toggle="modal" data-bs-target="#modifModal" onclick="setId({{ $modification->id }})"
            data-nom="{{ $modification->Nom }}"
            data-reference="{{ $modification->référence }}">
                <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $modification->Nom}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $modification->référence}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Options ({{ $modification->option}})</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">produit liés ({{ $modification->Produits_liés}})</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $modification->created_at}}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="8" class="center-text">Les modificateurs contiennent des options supplémentaires pour un produit, comme Extra Cheese, Double Patty, etc.<br>
                     Créez ici un modificateur tel que Sauces et ajoutez ses options.
                 </td>
                  </tr>
                  @endif
        </tbody>
    </table>

    <table class="datatables-customers table border-top" id="newTable" style="display: none;">
        <thead>
            <tr>
                <th class="tous th-status all underline" id="tabTous"
                onclick="showMainTable()">Tous <span class="underline"></span></th>
            <th class="supprime th-status deleted"id="tabSupprime"
                onclick="showNewTable()">Supprimé <span class="underline"></span>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            @if ($deletedmodif->count()>0)
            <tr>
                <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label="">
                    <input type="checkbox" class="form-check-input">
                </th>
                <th>Nom</th>
                <th>Référence</th>
                <th>Options</th>
                <th>Produits liés</th>
                <th>Créé</th>
            </tr>
        </thead>
        <tbody class="table-body">
            @foreach ($deletedmodif as $modif)
            <tr data-bs-toggle="modal" data-bs-target="#exampleModal3"    onclick="setId({{ $modif->id }})">
                <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $modif->Nom}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $modif->référence}}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Options ({{ $modif->option}})</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">produit liés ({{ $modif->Produits_liés}})</td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $modif->created_at}}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="8" class="center-text">Les modificateurs contiennent des options supplémentaires pour un produit, comme Extra Cheese, Double Patty, etc.<br>
                     Créez ici un modificateur tel que Sauces et ajoutez ses options.
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
 <div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="restoreModel">Confirmer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3"  id="restoreForm" method="POST"  enctype="multipart/form-data">
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
<div class="modal fade custom-modal" id="exampleModal3"  tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Modifier la catégorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3" action="" method="POST">
    @csrf
    <div class="mb-3">
          <label class="form-label ms-3" for="nom">Nom</label>
          <input type="text" class="form-control" id="Nom" name="Nom">
       </div>
     <div class="mb-3">
          <label class="form-label" for="ref">Référence</label>
          <input type="text" class="form-control" id="Référence" name="Référence">
     </div>
    <div class="modal-footer">
        <a href="#"class="restore-category" data-bs-toggle="modal" data-bs-target="#restoreModal" >Restaurer la catégorie</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary" id="saveButton">Sauvegarder</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Créer un modificateurs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3" action="{{ route('modif.ajout') }}" method="POST" id ="modificateurForm">
                 @csrf
                <div class="mb-3">
                <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez un nom de modificateur">
              <span>Nom</span><span style="color: red;">*</span><i class="fas fa-exclamation-circle"></i>
            </label>
                 <input type="text" class="form-control" id="Nommm" name="Nom">
                 <div class="invalid-feedback">Le nom est obligatoire.</div>
                 </div>
                 <div class="mb-3">
                 <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top" title="Des chiffres ou des lettres aident à atteindre le modificateur.">
              <span>Référence</span><span style="color: red;">*</span><i class="fas fa-exclamation-circle"></i>
            </label>
                 <input type="text" class="form-control" id="référenceee" name="référence">
                 <div class="invalid-feedback">Le référence est obligatoire.</div>
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

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3"  id="deleteForm" method="POST"  enctype="multipart/form-data">
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
<div class="modal fade" id="modifModal" tabindex="-1" aria-labelledby="modifModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modifModalLabel">Modifier le modificateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3" id="modifform" method="POST">
                 @csrf
                <div class="mb-3">
                <label class="form-label" for="nom">Nom</label>
                 <input type="text" class="form-control" id="Nomm" name="Nom">
                 </div>
                 <div class="mb-3">
                 <label class="form-label" for="ref">Référence</label>
                 <input type="text" class="form-control" id="référencee" name="référence">
                 </div>
                 <div class="modal-footer">
                 <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="delete">Supprimer la catégorie</a>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                  @method('PUT')
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
 }
 
 function showNewTable() {
   document.getElementById('mainTable').style.display = 'none';
   document.getElementById('newTable').style.display = 'table';
 }

 </script>



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



    const modal = document.getElementById('exampleModal');
    const form = document.getElementById('modificateurForm');

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
      const refInput = document.getElementById('référenceee');
      if (refInput.value.trim() === '') {
          refInput.classList.add('is-invalid');
          refInput.nextElementSibling.style.display = 'block';
          isValid = false;
      } else {
          refInput.classList.remove('is-invalid');
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
  document.addEventListener('DOMContentLoaded', function() {
    const tableRows = document.querySelectorAll('.clickable-row');

    tableRows.forEach(row => {
      row.addEventListener('click', function() {
        const modalTitle = document.getElementById('modifModalLabel'); 
        const nomInput = document.getElementById('Nomm'); 
        const refInput = document.getElementById('référencee');

        modalTitle.textContent = 'Modifier la modificateur: ' + this.dataset.nom; 
        nomInput.value = this.dataset.nom;
        refInput.value = this.dataset.reference;
      });
    });
  });
</script>


<script>
    function setId(id) {
      document.getElementById('deleteForm').action = "{{ route('modif.efface', ['modif' => ':id']) }}".replace(':id', id);
      document.getElementById('restoreForm').action = "{{ route('modif.restore', ['modif' => ':id']) }}".replace(':id', id);
      document.getElementById('modifform').action = "{{ route('modif.modif', ['modif' => ':id']) }}".replace(':id', id);
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

<script src="assets/vendor/libs/jquery/jquery.js"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>

