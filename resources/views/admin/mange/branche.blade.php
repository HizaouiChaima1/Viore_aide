<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>brabnche</title>
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
}
</style>
</head>

<body class="bg-white">



@include ('admin.sidebar')

     <!-- Layout container -->
 <div class="layout-page  " >
        @include('admin.nav')

 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                <div class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>Branches</h4>               
                        <button  id="create-category-button" class="create-button"   data-bs-toggle="modal" data-bs-target="#exampleModal">Créer une branche</button>
</div> 
                        <!-- Table --> <div class="card">
                     <div class="card-datatable table-responsive">
                     <div id="tableContainer">
                     <table class="datatables-customers table border-top"  id="mainTable">
                <div class="d-flex justify-content-end"> 
        
             <thead>
                    <tr>
                    <th>Tous</th>                  
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>                         
                      </tr>
                      @if ($branches->isEmpty())
                      <tr>
                        <td colspan="8" class="center-text">Aucune donnée à afficher!</td>
                    </tr>
                    @else 
                        <tr>
                             <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                colspan="1" style="width: 18px;" data-col="1" aria-label="">
                                <input type="checkbox" class="form-check-input">
                            </th>
                            <th>Nom</th>
                            <th>Référence</th>
                            <th>Groupe d'impôt</th>
                            <th>Créé</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">                  
                    @foreach($branches as $branche)
                           <tr onclick="window.location='{{ route('branche.detail', ['branche' => $branche->id]) }}';" style="cursor: pointer;">
                           <td><input type="checkbox" class="dt-checkboxes-select-all form-check-input"> </th>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $branche->Nom }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $branche->référence }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $branche->tax_groupe }} </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $branche->created_at }} </td>                           
                        </tr>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Créer une branche</h5>
                </div>
                <div class="modal-body">
                <form class="mb-3" action="{{ route('branche.ajout') }}" method="POST" id ="brancheForm">
                 @csrf
                <div class="mb-3">
                <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez un nom de branche">
                        <span>Nom</span><span style="color: red;">*</span><i class="fas fa-exclamation-circle"></i></label>
                   <input type="text" class="form-control" id="Nommm" name="Nom">
                   <div class="invalid-feedback">La nom est obligatoire.</div>
                 </div>
                 <div class="mb-3">
                 <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez le référence de ce branche">
                        <span>Référence</span><i class="fas fa-exclamation-circle"></i></label>
                 <input type="text" class="form-control" id="Référenceee" name="référence">
                 <div class="invalid-feedback">La référence est obligatoire.</div>
                 </div>
                 <div class="mb-3">
                 <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez le groupe d'impot">
                        <span>Groupe d'impôt</span><i class="fas fa-exclamation-circle"></i></label>
                 <input type="text" class="form-control" id="tax_groupe" name="tax_groupe">
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




<script>
  $(document).ready(function() {
    // Add click event listener to the save button
    $('.create-button').on('click', function() {
      $('#exampleModal').modal('show');
    });
  });
</script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    $('.th-status').on('click', function () {
      $('.th-status').removeClass('underline');            
            if ( $(this).hasClass('all')){
              $('.all').addClass('underline');
            } else{
              $('.deleted').addClass('underline');
            }
    });

    const modal = document.getElementById('exampleModal');
    const form = document.getElementById('brancheForm');

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
      const referenceInput = document.getElementById('Référenceee');
      if (referenceInput.value.trim() === '') {
          referenceInput.classList.add('is-invalid');
          referenceInput.nextElementSibling.style.display = 'block';
          isValid = false;
      } else {
          referenceInput.classList.remove('is-invalid');
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
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>





<script src="assets/vendor/libs/jquery/jquery.js"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>

