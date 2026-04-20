<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Details reduction</title>
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
    <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!-- Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!-- Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
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
         @include('admin.nav')

 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                     <h5 class="py-3 mb-2"><a href ="{{route('reduction.affich')}}">Retour</a></h5>
                     <div  class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>{{$reduction->nom}}</h4>

                        @if (!$reduction->deleted_at )                   
                        <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Modifier la réduction</button>
                        @else
                        <button type="button" id="restore-button" class="button-button"  data-bs-toggle="modal" data-bs-target="#restoreModal">Restaurer la réduction</button>
                        @endif
                        </div>
                       <div class="card">
    <div class="card-body">
        <div class="row">
            <!-- Left half -->
            <div class="col-md-6">
                <div class="mb-3"><label>Nom:</label><br>{{$reduction->nom}}</div><hr>
                @if ($reduction->type_reduction=='Fixée')
                <div class="mb-3"><label>Montant de la remise:</label><br>{{$reduction->montant_reductionF}}</div><hr>
                @else 
                <div class="mb-3"><label>Montant de la remise:</label><br>{{$reduction->montant_reductionP}}%</div><hr>
                <div class="mb-3"><label>Prix maximum du produit:</label><br>{{$reduction->reduction_maximale}}</div><hr>
                @endif
            </div>

            <!-- Right half -->
            <div class="col-md-6">
                <div class="mb-3"><label>Qualification:</label><br>{{$reduction->qualification}}</div><hr>
                <div class="mb-3"><label>Référence:</label><br>{{$reduction->reference}}</div><hr>
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
            <form class="mb-3"  action ="{{ route('reduction.restaurereduction',$reduction->id)}}"  method="POST" >
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
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="mb-3"  action ="{{ route('reduction.sup', $reduction->id ) }}" method="POST"  enctype="multipart/form-data">
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
                <form class="mb-3" action="{{ route('reduction.modif', $reduction->id )}}" method="POST">
                    @csrf
                    @method('PUT')
                 <div class="mb-3">
                    <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"title="Entrez un nom de réduction">
                    <span>Nom</span><span style="color: red;">*</span><i class="fas fa-exclamation-circle"></i></label>
                      <input type="text" class="form-control" id="nomm" name ="nom"  value="{{$reduction->nom}}">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"title="Choisissez si la remise peut être appliquée au niveau de la commande, au niveau du produit ou aux deux.">
                      <span>Qualification</span><span style="color: red;">*</span><i class="fas fa-exclamation-circle"></i></label>
                      <select id="qualificationn" class="form-control" name ="qualification">
                      <option value="">Choisir...</option>
                      <option value="" {{ $reduction->qualification == '' ? 'selected' : '' }}>Choisir...</option>
                      <option value="Produit" {{ $reduction->qualification == 'Produit' ? 'selected' : '' }}>Produit</option>
                      <option value="Order" {{ $reduction->qualification == 'Order' ? 'selected' : '' }}>Order</option>
                      <option value="Order & produit" {{ $reduction->qualification == 'Order & produit' ? 'selected' : '' }}>Order & produit</option>
                      </select>
                  </div>
               
                  <div class="mb-3">
                      <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"title="Qu’il s’agisse d’une remise d’un montant fixe ou d’une remise en pourcentage.">
                        <span>Type de réduction</span><span style="color: red;">*</span><i class="fas fa-exclamation-circle"></i></label>
                      <select id="tdr" class="form-control" name="type_reduction">
                      <option value="" {{ $reduction->type_reduction == '' ? 'selected' : '' }}>Choisir...</option>
                      <option value="Fixée" {{ $reduction->type_reduction == 'Fixée' ? 'selected' : '' }}>Fixée</option>
                      <option value="Pourcentage" {{ $reduction->type_reduction == 'Pourcentage' ? 'selected' : '' }}>Pourcentage</option>
                      </select>
                  </div>
                
                  <div class="mb-3" id="typefixeContainer" style="display: none;">
             <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Montant de la remise qui sera appliquée sur les commandes ou les produits.">
            <span>Montant de la réduction</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
           <input type="text" class="form-control" id="montant_remise" name="montant_reductionF" value="{{$reduction->montant_reductionF}}">
           </div>

  
           <div  id="typepourcentageContainer" style="display: none;">
           <div class="mb-3">
             <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Montant de la remise qui sera appliquée sur les commandes ou les produits.">
            <span>Montant de la réduction (%)</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
           <input type="text" class="form-control" id="montant_remise" name="montant_reductionP"  value="{{$reduction->montant_reductionP}}">
           </div>
           <div class="mb-3">
             <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="La valeur maximale de la réduction peut être appliquée.">
            <span>Réduction maximale</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
           <input type="text" class="form-control" id="reduction_maximale" name="reduction_maximale" value="{{$reduction->reduction_maximale}}">
           </div>
        </div>



                  <div class="mb-3">
                    <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"title="Numéro de référence ou identifiant de la remise.">
                      <span>Référence</span><span style="color: red;">*</span><i class="fas fa-exclamation-circle"></i></label>
                      <input type="text" class="form-control" id="reference" name ="reference"   value="{{$reduction->reference}}">
                  </div>
                  
                      
                     
       
                        
                        <div class="modal-footer">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="delete" style="margin-right: auto;">Supprimer la réduction</a>
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








 <!-- Bootstrap JS and jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>
  $(document).ready(function() {
    $('.create-button').on('click', function() {
      $('#exampleModal').modal('show');
    });

    $('.branche-button').on('click', function() {
      $('#brancheModal').modal('show');
    });

    $('.categorie-button').on('click', function() {
      $('#categoriemodal').modal('show');
    });

    $('.produit-button').on('click', function() {
      $('#produitmodal').modal('show');
    });

    $('.combos-button').on('click', function() {
      $('#combosmodal').modal('show');
    });
  });
</script>

<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>

