<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Orde d'achat</title>
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
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/pickday.css">
    <script src="assets/pickday.js"></script>
    <style>
        .button-heading-container {
    display: flex;
    align-items: center;
    justify-content: space-between; 
    margin-bottom: 20px; 
}
.center-text {
    text-align: center;
    vertical-align: middle;
    color: red;
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
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>Order d'achat</h4>
                        <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Nouveau order d'achat</button>
                          </div>
                        <!-- Table -->
                        <div class="card">
                     <div class="card-datatable table-responsive">
                     <table class="datatables-customers table border-top">
                <div class="d-flex justify-content-end"> 
          
             <thead>
                    <tr>
                    <th>Tous</th>
                    <th>Brouillons</th>
                    <th>En attente</th>
                    <th>Fermé</th>
                    <th></th>  
                    <th></th>
                      </tr>
                      @if ($Ordredachats->isEmpty())
                      <tr>
                        <td colspan="8"  class="center-text">
                            Recevez les articles en stock de vos fournisseurs directement en créant une transaction d'achat
                        </td>
                      </tr>
                      @else
                      <tr>
                            <th>Référence</th>
                            <th>Fournisseurs</th>
                            <th>Destination</th>
                            <th>Statut</th>
                            <th>Date d'affaires</th>
                            <th>Créé</th>
                            
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                    @foreach ($Ordredachats as $ordre)
                        <tr >                                            
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $ordre->id }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $ordre->fournisseur }} </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $ordre->destination }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $ordre->status }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $ordre->date_livraison }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            {{ $ordre->created_at }} </td>
                                                     
                        </tr>
                        @endforeach
@endif
                    </tbody>
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
                </table>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une ordre d'achat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3" action="{{route('ordre.ajout')}}" method="POST">
                 @csrf
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Choisissez un fournisseur auprès duquel demander des articles.">
                        <span>Fournisseur </span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                        <select class="form-control"  id="fournisseur" name ="fournisseur" >
                            <option value="">Choisir...</option>
                             @foreach($fournisseurs as $fournisseur)
                              <option value="{{ $fournisseur->Nom }}">{{ $fournisseur->Nom }}</option>
                              @endforeach
                              </select>
                              <div class="invalid-feedback">Le fournisseur est obligatoire.</div>
                          </div>
                       
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Là où les articles demandés seront reçus.">
                        <span>Destination</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="Destination" name ="destination">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date de livraison</label>
                            <input type="date" class="form-control" id="deliveryDate"name ="date_livraison">
                        </div>
                          
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Vous pouvez prendre des notes supplémentaires sur cette transaction.">
                        <span>Note</span><i class="fas fa-exclamation-circle"></i></label>
                        <textarea class="form-control" id="note" name ="note"> </textarea>
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
  $(document).ready(function() {
    // Add click event listener to the save button
    $('.create-button').on('click', function() {
      $('#exampleModal').modal('show');
    });
  });
  
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9iKq7Ghi1xDxlqpAIRnFv/OMZVmeNmTtQ4" crossorigin="anonymous"></script>
<script>
  var picker = new Pikaday({
    field: document.getElementById('deliveryDate'),
    format: 'YYYY-MM-DD' // Customize date format if needed
  });
</script>

<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>

