<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>compte</title>
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
    <link rel="stylesheet" href="assets/css/pickday.css">
    <script src="assets/pickday.js"></script>

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
}
.center-text {
    text-align: center;
}
</style>
</head>

<body class="bg-white">



@include ('admin.sidebar')

     <!-- Layout container -->
 <div class="layout-page">
@include('admin.nav')
 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                <div class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>Employés</h4>

                        <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter un employé</button>
                      </div>

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
            </tr>
                      <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>status</th>
                       </tr>
                    </thead>
                    <tbody class="text-sm">
                    @foreach ($Employes as $employe)
                    @if (!$employe->deleted_at )
                    <tr onclick="window.location='{{ route('employe.detail', ['employe' => $employe->id]) }}';"style="cursor: pointer;">                                           
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $employe->Nom }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $employe->Email}} </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $employe->Rôle}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $employe->status}}</td>   
                        </tr>
                        @endif
                        @endforeach
                    </tbody>         
              </div>
                </table>

                <table class="datatables-customers table border-top" id="newTable" style="display: none;">
                <thead>
             <tr>
              <th class="tous  th-status all" onclick="showMainTable()">Tous</th>
              <th class="active th-status active" onclick="showActiveTable()">Active</th>
              <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
              <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>                     
            </tr>
            @if ($deletedemp->count() > 0)
                      <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>status</th>
                       </tr>
                    </thead>
                    <tbody class="text-sm">
                    @foreach ($deletedemp as $employe)
                    
                    <tr onclick="window.location='{{ route('employe.detail', ['employe' => $employe->id]) }}';"style="cursor: pointer;">                                          
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $employe->Nom }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $employe->Email}} </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $employe->Rôle}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $employe->status}}</td>   
                        </tr>
                        @endforeach
                        @else
                        <tr>
                          <td colspan="8" class="center-text">Aucune donnée à afficher!</td>
                      </tr>
                      @endif
                    </tbody>
         
</div>
                </table>

                
                <table class="datatables-customers table border-top" id="activeTable" style="display: none;">
                <thead>
             <tr>
              <th class="tous  th-status all" onclick="showMainTable()">Tous</th>
            <th class="active th-status active" onclick="showActiveTable()">Active</th>
            <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
            <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
                        
            </tr>
                      <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>status</th>
                       </tr>
                    </thead>
                    <tbody class="text-sm">
                    @foreach ($Employes as $employe)
                    @if ($employe->status == 'Actif')
                    <tr onclick="window.location='{{ route('employe.detail', ['employe' => $employe->id]) }}';"style="cursor: pointer;">                                          
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $employe->Nom }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $employe->Email}} </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $employe->Rôle}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $employe->status}}</td>   
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
         
</div>
                </table>

                
                <table class="datatables-customers table border-top" id="inactiveTable" style="display: none;">
          <thead>
             <tr>
              <th class="tous  th-status all" onclick="showMainTable()">Tous</th>
              <th class="active th-status active" onclick="showActiveTable()">Active</th>
              <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
              <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
                        
            </tr>
                      <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>status</th>
                       </tr>
                    </thead>
                    <tbody class="text-sm">
                    @foreach ($Employes as $employe)
                    @if ($employe->status == 'Inactif')
                    <tr onclick="window.location='{{ route('employe.detail', ['employe' => $employe->id]) }}';"style="cursor: pointer;">                                          
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500"> {{ $employe->Nom }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $employe->Email}} </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $employe->Rôle}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $employe->status}}</td>   
                        </tr>
                        @endif
                        @endforeach
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un employé</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form  class="mb-3" action="{{route ('employe.store')}}" method="POST" id ="employeForm">
                        @csrf
                            <div class="mb-3">
                                <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez Le nom de l'employé">
                                <span>Nom</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                                <input type="text" class="form-control" id="Nommm" name="Nom" >
                                <div class="invalid-feedback">Le nom est obligatoire.</div>
                            </div>
                            <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez l'email de l'employe">
                               <span>Email</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                                <input type="text" class="form-control" id="emaill" name="Email"  />
                                <div class="invalid-feedback">L'email est obligatoire.</div>
                            </div>
                            <div class="mb-3">
                           <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez le numéro de téléphone">
                            <span>Numéro de Téléphone </span><i class="fas fa-exclamation-circle"></i></label>
                            <input type="tel" class="form-control" id="numero_de_téléphone" name="numero_de_téléphone"/>
                          </div>  
                          <div class="mb-3 row">
                          <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez le rôle de l'employe">
                            <span>Rôle</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                           <select id="rolee" name="Rôle" class="form-select">
                         <option value="" disabled selected hidden>Choisissez un rôle</option>
                         <option value="admin">Admin</option>
                         <option value="Cassier">Cassier</option>
                        <option value="Cuisinier">Cuisinier</option>
                         <option value="Serveur">Serveur</option>
                         <option value="client">Client</option>
                           </select>
                           <div class="invalid-feedback">Le rôle est obligatoire.</div>
                          </div>
                          <div class="mb-3">
                            <label for="telephone" class="form-label">Adresse employee :</label>
                            <input type="tel" class="form-control" id="customerAddress1"
                                name="customerAddress1"  value="L'adresse d'employéé" />
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">pays :</label>
                            <input type="tel" class="form-control" id="pays"
                                name="pays"  value="{{ session('pays') }}" />
                        </div>
                     
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Nom restaurant :</label>
                            <input type="tel" class="form-control" id="nomrestau"
                                name="nomrestau"  value="{{ session('nomrestau') }}" />
                        </div>
                            <div class="mb-3">
                                <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez le mot passe  de l'employe">
                               <span>Mot de  passe</span><i class="fas fa-exclamation-circle"></i></label>
                                <input type="password" class="form-control" id="mot_passee" name="password"  />
                                <div class="invalid-feedback">Le mot passe est obligatoire.</div>
                            </div>
                           

                            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary"  id="saveButton">Sauvegarder</button>
                </div>
            </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /Modal -->

 <!-- Bootstrap JS and jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
     <!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

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
    const form = document.getElementById('employeForm');

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

      const emailInput = document.getElementById('emaill');
      if (emailInput.value.trim() === '') {
        emailInput.classList.add('is-invalid');
        emailInput.nextElementSibling.style.display = 'block';
          isValid = false;
      } else {
        emailInput.classList.remove('is-invalid');
      }

      // Validate Référence
      const roleInput = document.getElementById('rolee');
      if (roleInput.value.trim() === '') {
        roleInput.classList.add('is-invalid');
        roleInput.nextElementSibling.style.display = 'block';
          isValid = false;
      } else {
        roleInput.classList.remove('is-invalid');
      }
      const motpasseInput = document.getElementById('mot_passee');
      if (motpasseInput.value.trim() === '') {
        motpasseInput.classList.add('is-invalid');
        motpasseInput.nextElementSibling.style.display = 'block';
          isValid = false;
      } else {
        motpasseInput.classList.remove('is-invalid');
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
  $(document).ready(function() {
    // Add click event listener to the save button
    $('.create-button').on('click', function() {
      $('#exampleModal').modal('show');
    });
  });
  
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9iKq7Ghi1xDxlqpAIRnFv/OMZVmeNmTtQ4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>

