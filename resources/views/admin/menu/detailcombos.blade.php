<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Details combos</title>
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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="/assets/css/produit.css">

    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

    <style>
        /* CSS styling for the box */
      
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
.button-group {
    display: flex;
    gap: 10px;
}

    </style>

</head>

<body  class=" bg-white">



@include ('admin.Sidebar')

     <!-- Layout container -->
 <div class="layout-page">
 @include('admin.nav')
 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                <h5 class="py-3 mb-2"><a href ="{{ route('combos.affich') }}"  style="text-decoration: none; border-bottom: 1px solid black;" >  Retour</a></h5>
                     <div  class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>{{$Combos->nom}}</h4>
                        <div class="button-group">
                        @if (!$Combos->deleted_at )
                        <form action ="{{ route('combos.statut', ['id'=> $Combos->id])}}" method="POST" id="form-status">
                          @csrf
                         @method('PUT')
                         <button type="button" id ="change-status" class="button-button" >Combainaisons {{$Combos->status }}</button>
                          </form>                   
                        <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Modidier la combinaisons</button>
                        @else  
                        <button type="button" id="restore-button" class="button-button"  data-bs-toggle="modal" data-bs-target="#restoreModal">Restaurer la combinaisons</button>
                @endif
                             
                        </div>
                      </div>
                      <div class="card">
                    <div class="card-body">
                    <div class="row">
                         <div class="col-md-6">
                                <div class="mb-3"><label>Nom:</label><br> {{$Combos->nom}}</div><hr> 
                                <div class="mb-3"><label>Catégorie:</label><br> {{$Combos->category->Nom}}</div><hr>                           
                                <div class="mb-3"><label>Description:</label><br> {{$Combos->description}}</div><hr> 
                                 </div>
            <div class="col-md-6">
                                  <div class="mb-3"><label>SKU:</label><br>  {{$Combos->sku}} </div><hr> 
                                 <div class="mb-3"><label>Code à barre:</label><br>{{$Combos->code_barre}} </div><hr>
</div>
                         </div>
</div>
</div>                         
                         
</div>
                        
</diV>







            
                       
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
                <form class="mb-3"  action ="{{ route('combos.restaurecombos', ['id' => $Combos->id])}}"  method="POST" >
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
                <form class="mb-3"  action ="{{ route('combos.sup', ['id' => $Combos->id]) }}" method="POST"  enctype="multipart/form-data">
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
                    <h5 class="modal-title" id="exampleModalLabel">Modifier la combinaison</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form   class="mb-3" action="{{ route('combos.modif', $Combos->id )}}" method="POST"  enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez un nom de ce combo">
                        <span>Nom</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="nomm" name ="nom"  value ="{{$Combos->nom}}">
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
                            <select class="form-control" id="categoriee" name="categorie" >
                             <option value="">Choisir...</option>
                               @foreach($categories as $categorie)
                               <option value="{{ $categorie->Nom }}" @if($Combos->category->Nom == $categorie->Nom) selected @endif>{{ $categorie->Nom }}</option>
                                    @endforeach
                                 </select>
                                 <div class="invalid-feedback">Le catégorie est obligatoire.</div>
                        </div>
                    
                        <div class="mb-2 row">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Stock Keeping Unit is a code of numbers or letters identify the combo.">
                        <span>SKU</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                        <div class="col-sm-8">
                         <input type="text" class="form-control" id="skuu" name ="sku"   value="{{$Combos->sku}}">
                         <div class="invalid-feedback">Le SKU est obligatoire.</div>
                        </div>
                         <div class="col-sm-2">
                        <button type="button" class="btn btn-secondary">Générer</button>
                        </div>
                        </div>
                       <div>
                       <div>
                       <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Numéro de code-barres de ce combo.">
                        <span>Code à barre </span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="code_barre" name ="code_barre" value="{{$Combos->code_barre}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="description du contenu combiné.">
                        <span>Description</span> <i class="fas fa-exclamation-circle"></i></label>
                            <textarea class="form-control" id="description" name ="description" >{{$Combos->description}}</textarea>
                        </div>
                       <div class="modal-footer">
                       <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="delete" style="margin-right: auto;">Supprimer la combinaisons</a>
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

  
    <



<script>
  const tableRows = document.querySelectorAll('.clickable-row');

  tableRows.forEach(row => {
    row.addEventListener('click', function() {
      const button = document.getElementById('exampleModal'); 
      const nomInput = document.getElementById('Nom'); 
      const refInput = document.getElementById('Référence');
      const photoInput = document.getElementById('photo');
      const categorieInput =document.getElementById('categorie');

      modalTitle.textContent = 'Modifier la catégorie: ' + this.dataset.nom; 
      nomInput.setAttribute('value',this.dataset.nom);
      refInput.setAttribute('value',this.dataset.reference); 
      categorieInput.setAttribute('value',this.dataset.categorie); 
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

    $('#change-status').on('click', function() {
      console.log('test');
      let url =$('#form-status').attr('action');
      console.log(url);
      $.ajax({
                    url: url, // Laravel route to handle the request
                    method: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}' // CSRF token for security
                    },
                    success: function(response) {
                        location.reload();
                        // $('#message').html('<p>Product added successfully!</p>');
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
     
    });


  }
);
</script>


<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>
