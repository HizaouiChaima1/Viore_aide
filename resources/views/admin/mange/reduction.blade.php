<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>reduction</title>
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

.add-button {
    background-color: white;
    color: black;
    border-radius: 5px;
    cursor: pointer;
}
.center-text {
    text-align: center;
}
.underline {
            text-decoration: underline;
            text-decoration-color: #AF2B1D;
        }
        </style>
    
</head>

<body  class=" bg-white">



@include ('admin.sidebar')

     <!-- Layout container -->
 <div class="layout-page">
         @include('admin.nav')

 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                <div  class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>Réductions</h4>
                        <!-- Buttons -->
                        <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">créer des réductions</button>
                        </div>
                        <!-- Table -->
                        <div class="card">
                     <div class="card-datatable table-responsive">
                     <div id="tableContainer">
                     <table class="datatables-customers table border-top"  id="mainTable">
                <div class="d-flex justify-content-end"> 
          
             <thead>
                    <tr>
                        <th class="tous th-status all underline" id="tabTous"onclick="showMainTable()">Tous <span class="underline"></span></th>
                    <th class="supprime th-status deleted"id="tabSupprime"onclick="showNewTable()">Supprimé <span class="underline"></span> </th>
                            <th></th>
                            <th></th>
                            <th></th>                        
                      </tr>
                      @if ($tousReduction->count()==0)                     
                      <tr>
                                  <td colspan="8" class="center-text">Créez des remises que vos employés autorisés peuvent utiliser avec les commandes.</td>
                                </tr>                 
                        <tr>
                         @else 
                            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                colspan="1" style="width: 18px;" data-col="1" aria-label="">
                                <input type="checkbox" class="form-check-input">
                            </th>
                            <th>Nom</th>
                            <th>Référence</th>
                            <th>Qualification</th>
                            <th>Discount</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                    @foreach($tousReduction as $red)
                    <tr onclick="window.location='{{ route('reduction.detail', ['reduction' => $red->id]) }}';" style="cursor: pointer;">                                             
                            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{$red->nom}}
                         </td>
                         <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{$red->reference}}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{$red->qualification}}
                             </td>
                             @if ($red->type_reduction=='Fixée')
                             <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{$red->montant_reductionF}}
                             @else 
                             <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{$red->montant_reductionP}}%
                             @endif
                                                    
                        </tr>
                      @endforeach
                      @endif
                        
                    </tbody>
       
                </table>

                <table class="datatables-customers table border-top" id="newTable"
                style="display: none;">
                    <div class="d-flex justify-content-end"> 
              
                 <thead>
                        <tr>
                            <th class="tous th-status all underline" id="tabTous"onclick="showMainTable()">Tous <span class="underline"></span></th>
                        <th class="supprime th-status deleted"id="tabSupprime"onclick="showNewTable()">Supprimé <span class="underline"></span> </th>
                                <th></th>
                                <th></th>
                                <th></th>                        
                          </tr>
                          @if ($deletedReduction ->count()==0)                     
                          <tr>
                                      <td colspan="8" class="center-text">Créez des remises que vos employés autorisés peuvent utiliser avec les commandes.</td>
                                    </tr>                 
                            <tr>
                             @else 
                                <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                    colspan="1" style="width: 18px;" data-col="1" aria-label="">
                                    <input type="checkbox" class="form-check-input">
                                </th>
                                <th>Nom</th>
                                <th>Référence</th>
                                <th>Qualification</th>
                                <th>Réduction</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                        @foreach($deletedReduction as $red)
                        <tr onclick="window.location='{{ route('reduction.detail', ['reduction' => $red->id]) }}';" style="cursor: pointer;">                                             
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{$red->nom}}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{$red->reference}}
                               </td>
                               <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{$red->qualification}}
                                </td>
                                @if ($red->type_reduction=='Fixée')
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{$red->montant_reductionF}}
                                @else 
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{$red->montant_reductionP}}%
                                @endif
                                                       
                           </tr>
                          @endforeach
                          @endif
                            
                        </tbody>
           
                    </table>
               

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
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">créer une réduction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3" action="{{ route('reduction.ajout') }}" method="POST" id="reductionForm">
                 @csrf
                        <div class="mb-3">
                          <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"title="Entrez un nom de réduction">
                          <span>Nom</span><span style="color: red;">*</span><i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="nomm" name ="nom"  >
                            <div class="invalid-feedback">Le nom est obligatoire.</div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"title="Choisissez si la remise peut être appliquée au niveau de la commande, au niveau du produit ou aux deux.">
                            <span>Qualification</span><span style="color: red;">*</span><i class="fas fa-exclamation-circle"></i></label>
                            <select id="qualificationn" class="form-control" name ="qualification">
                            <option value="">Choisir...</option>
                            <option value="Produit">Produit</option>
                            <option value="Order">Order</option>
                            <option value="Order & produit">Order & produit</option>
                            </select>
                            <div class="invalid-feedback">Le qualification est obligatoire.</div>
                        </div>
                     
                        <div class="mb-3">
                            <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"title="Qu’il s’agisse d’une remise d’un montant fixe ou d’une remise en pourcentage.">
                              <span>Type de réduction</span><span style="color: red;">*</span><i class="fas fa-exclamation-circle"></i></label>
                            <select id="tdr" class="form-control" name="type_reduction">
                            <option value="">Choisir...</option>
                            <option value="Fixée">Fixée</option>
                            <option value="Pourcentage">Pourcentage</option>
                            </select>
                            <div class="invalid-feedback">Le type de réduction est obligatoire.</div>
                        </div>
                      
                        <div class="mb-3" id="typefixeContainer" style="display: none;">
                   <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Montant de la remise qui sera appliquée sur les commandes ou les produits.">
                  <span>Montant de la réduction</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                 <input type="number" class="form-control" id="montant_remise" name="montant_reductionF">
                 </div>





                 
                 <div  id="typepourcentageContainer" style="display: none;">
                 <div class="mb-3">
                   <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Montant de la remise qui sera appliquée sur les commandes ou les produits.">
                  <span>Montant de la réduction (%)</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                 <input type="number" class="form-control" id="montant_remise" name="montant_reductionP">
                 </div>
                 <div class="mb-3">
                   <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="La valeur maximale de la réduction peut être appliquée.">
                  <span>Réduction maximale</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                 <input type="number" class="form-control" id="reduction_maximale" name="reduction_maximale">
                 </div>
              </div>



                        <div class="mb-3">
                          <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"title="Numéro de référence ou identifiant de la remise.">
                            <span>Référence</span><span style="color: red;">*</span><i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="reference" name ="reference">
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

 <!-- Bootstrap JS and jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.getElementById('tdr');
        const typefixeContainer = document.getElementById('typefixeContainer');
        const typepourcentageContainer = document.getElementById('typepourcentageContainer');

        selectElement.addEventListener('change', function() {
            if (this.value === 'Fixée') {
                typefixeContainer.style.display = 'block';
                typepourcentageContainer.style.display = 'none';
            } else if (this.value === 'Pourcentage') {
                typefixeContainer.style.display = 'none';
                typepourcentageContainer.style.display = 'block';
            } else {
                typefixeContainer.style.display = 'none';
                typepourcentageContainer.style.display = 'none';
            }
        });
    });
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
      const form = document.getElementById('reductionForm');

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

          const qualificationInput = document.getElementById('qualificationn');
          if (qualificationInput.value.trim() === '') {
            qualificationInput.classList.add('is-invalid');
            qualificationInput.nextElementSibling.style.display = 'block';
              isValid = false;
          } else {
            qualificationInput.classList.remove('is-invalid');
          }

          // Validate Référence
          const tdrInput = document.getElementById('tdr');
          if (tdrInput.value.trim() === '') {
              tdrInput.classList.add('is-invalid');
              tdrInput.nextElementSibling.style.display = 'block';
              isValid = false;
          } else {
              tdrInput.classList.remove('is-invalid');
          }

          // If form is valid, allow the form to submit
          if (isValid) {
              event.target.submit();
          }
      });

      // Clear error messages when the modal is closed
      modal.addEventListener('hidden.bs.modal', function() {
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

