<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>carte cadeau</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/logoo.png" />
    <link rel="stylesheet" href="assets/css/produit.css">
    


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />
 
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
 <div class="layout-page">
         
 @include('admin.nav')
 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                <div class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>Carte cadeau</h4>
                        <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Créer une carte de fidélité</button>
                        </div>
                        <!-- Table -->
                        <div class="card">
                     <div class="card-datatable table-responsive">
                     <div id="tableContainer">
                     <table class="datatables-customers table border-top"  id="mainTable">
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
                      @if ($touscarte ->count()==0)
                     <tr>
                      <td colspan="8" class="center-text">Créez des cartes-cadeaux que les clients peuvent acheter et utiliser plus tard pour payer leurs commandes.<br>
                       La carte-cadeau est vendue en tant que produit et le montant de la vente ne sera pas reflété dans les rapports de ventes.
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
                            <th>Prix</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                     <tbody class="bg-white">
                     @foreach ($touscarte as $carte)
                     <tr onclick="window.location='{{ route('carte.detail', ['carte' => $carte->id]) }}';" style="cursor: pointer;">                                                
                            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>                    
                           <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <img src="{{ $carte->photo}}" width ="50"height ="50"class ="img img-responsive"/></td>                     
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->SKU}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->category->Nom}}</td>
                            @if ($carte->strategie_prix === 'Prix libre')
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Prix libre</td>
                        @else
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Prix}}</td>
                        @endif
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->status}} </td>                          
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    </div>
                </table>
              

                <table class="datatables-customers table border-top" id="newTable" style="display: none;">
                <div class="d-flex justify-content-end"> 
        
             <thead>
                    <tr>
                        <th class="tous  th-status all" onclick="showMainTable()">Tous</th>
                        <th class="active th-status active" onclick="showActiveTable()">Active</th>
                        <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
                        <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
                            <th></th>
                            <th></th>
                            <th></th>
                      </tr>
                      @if ($deletedCarte->count()==0)
                     <tr>
                      <td colspan="8"  class="center-text ">Créez des cartes-cadeaux que les clients peuvent acheter et utiliser plus tard pour payer leurs commandes.<br>
                       La carte-cadeau est vendue en tant que produit et le montant de la vente ne sera pas reflété dans les rapports de ventes.
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
                            <th>Prix</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                     <tbody class="bg-white">
                     @foreach ($deletedCarte as $carte)
                     <tr onclick="window.location='{{ route('carte.detail', ['carte' => $carte->id]) }}';" style="cursor: pointer;">                                                
                            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>                    
                           <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <img src="{{ $carte->photo}}" width ="50"height ="50"class ="img img-responsive"/></td>                     
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->SKU}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->category->Nom}}</td>
                            @if ($carte->strategie_prix === 'Prix libre')
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Prix libre</td>
                        @else
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Prix }}</td>
                        @endif
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->status}} </td>                          
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    </div>
                </table>


                
                <table class="datatables-customers table border-top" id="activeTable" style="display: none;">
                <div class="d-flex justify-content-end"> 
        
             <thead>
                    <tr>
                        <th class="tous  th-status al" onclick="showMainTable()">Tous</th>
                        <th class="active th-status active" onclick="showActiveTable()">Active</th>
                        <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
                        <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
                            <th></th>
                            <th></th>
                            <th></th>
                      </tr>
                      @if ($actifCarte ->count()==0)
                     <tr>
                      <td colspan="8"   class="center-text ">Créez des cartes-cadeaux que les clients peuvent acheter et utiliser plus tard pour payer leurs commandes.<br>
                       La carte-cadeau est vendue en tant que produit et le montant de la vente ne sera pas reflété dans les rapports de ventes.
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
                            <th>Prix</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                     <tbody class="bg-white">
                     @foreach ($actifCarte as $carte)
                     <tr onclick="window.location='{{ route('carte.detail', ['carte' => $carte->id]) }}';" style="cursor: pointer;">                                                
                            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>                    
                           <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <img src="{{ $carte->photo}}" width ="50"height ="50"class ="img img-responsive"/></td>                     
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->SKU}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->category->Nom}}</td>
                            @if ($carte->strategie_prix === 'Prix libre')
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Prix libre</td>
                        @else
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Prix}}</td>
                        @endif
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->status}} </td>                          
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    </div>
                </table>



                <table class="datatables-customers table border-top" id="inactiveTable" style="display: none;">
                <div class="d-flex justify-content-end"> 
        
             <thead>
                    <tr>
                        <th class="tous  th-status all" onclick="showMainTable()">Tous</th>
                        <th class="active th-status active" onclick="showActiveTable()">Active</th>
                        <th class="inactive th-status inactive" onclick="showInactiveTable()">Inactive</th>
                        <th class="supprime th-status deleted" onclick="showNewTable()">Supprimé</th>
                            <th></th>
                            <th></th>
                            <th></th>
                      </tr>
                      @if ($inactifCarte ->count()==0)
                     <tr>
                      <td colspan="8" class="center-text ">Créez des cartes-cadeaux que les clients peuvent acheter et utiliser plus tard pour payer leurs commandes.<br>
                       La carte-cadeau est vendue en tant que produit et le montant de la vente ne sera pas reflété dans les rapports de ventes.
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
                            <th>Prix</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                     <tbody class="bg-white">
                     @foreach ($inactifCarte as $carte)
                     <tr onclick="window.location='{{ route('carte.detail', ['carte' => $carte->id]) }}';" style="cursor: pointer;">                                                
                            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>                    
                           <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <img src="{{ $carte->photo}}" width ="50"height ="50"class ="img img-responsive"/></td>                     
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->SKU}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->category->Nom}}</td>
                            @if ($carte->strategie_prix === 'Prix libre')
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Prix libre</td>
                        @else
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Prix}}</td>
                        @endif
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->status}} </td>                          
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Créer une carte de fidélité</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3" action="{{ route('cartefidelite.ajout') }}" method="POST" enctype="multipart/form-data" id ="carteForm">
                 @csrf
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez un nom de carte de fidélité">
                        <span>Nom</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="Nommm" name ="Nom"  >
                            <div class="invalid-feedback">Le nom est obligatoire.</div>
                        </div>
                        <div class="mb-3">
                         <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez une photo de carte de fidélité">
                        <span>Photo de carte de fidélité</span><i class="fas fa-exclamation-circle"></i></label>
                       <input type="file" class="form-control" id="photo" name="photo">
                         </div>
                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Choisissez la catégorie de cette carte fidélité">
                        <span>Catégories</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <select class="form-control" id="categoriee" name="Catégorie">
                             <option value="">Choisir...</option>
                               @foreach($categories as $categorie)
                                   <option value="{{ $categorie->Nom }}">{{ $categorie->Nom }}</option>
                                    @endforeach
                                 </select>
                                 <div class="invalid-feedback">La catégorie est obligatoire.</div>
                        </div>
                        <div class="mb-2 row">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="L'unité de gestion des stocks est un code composé de chiffres ou de lettres qui identifie la carte fidélité">
                        <span>SKU</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                        <div class="col-sm-8">
                         <input type="text" class="form-control" id="skuu" name ="SKU">
                         <div class="invalid-feedback">Le SKU est obligatoire.</div>
                        </div>
                         <div class="col-sm-2">
                        <button type="button" class="btn btn-secondary">Générer</button>
                        </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Pour choisir le mode de tarification">
                        <span>Stratégie de prix</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <select id="stp" class="form-control" name ="strategie_prix">
                            <option value="Prix fixe" name="Prix fixe">Prix fixe</option>
                            <option value="Prix libre" name ="Prix libre">Prix libre</option>
                            </select>
                        </div>
                        <div class="mb-3" id="prixContainer" style="display: none;">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Pour choisir le mode de tarification">
                        <span>Prix</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="number" class="form-control" id="prix" name ="Prix">
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
      const form = document.getElementById('carteForm');
  
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
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.getElementById('stp');
        const prixContainer = document.getElementById('prixContainer');

        selectElement.addEventListener('change', function() {
            if (this.value === 'Prix fixe') {
                prixContainer.style.display = 'block';
            } else {
                prixContainer.style.display = 'none';
            }
        });

        // To handle the initial load state
        if (selectElement.value === 'Prix fixe') {
            prixContainer.style.display = 'block';
        } else {
            prixContainer.style.display = 'none';
        }
    });
</script>

<script>
  $(document).ready(function() {
    $('.create-category-button').on('click', function() {
      $('#exampleModal').modal('show');
    });
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>

