<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Details compte</title>
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
    <link rel="stylesheet" href="/assets/css/produit.css"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
       
        .button-heading-container {
    display: flex;
    align-items: center;
    justify-content: space-between; 
    margin-bottom: 20px;
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
                     <h5 class="py-3 mb-2"><a href ="{{ route('employe.affich') }}">Retour</a></h5>
                     <div  class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>{{$employe->Nom}}</h4>
                        <div class="button-group">
                        @if (!$employe->deleted_at )
                        <form action ="{{ route ('employe.status', $employe->id)}}" method="POST" id="form-status" >
                          @csrf
                         @method('PUT')
                         <button type="submit" id="change-status"class="button-button" >Employe {{$employe->status }}</button>
                          </form>                      
                        <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Modidier l'employé</button>
                        @else  
                        <button type="button" id="restore-button" class="button-button"  data-bs-toggle="modal" data-bs-target="#restoreModal">Restaurer l'employé</button>
                @endif 
            </div>
                    </div>

                        <div class="card">
                    <div class="card-body">
                       <div class="row">
                       <!-- Left half -->
                         <div class="col-md-6">
                                <div class="mb-3"><label>Nom:</label><br>{{ $employe->Nom }}</div><hr> 
                                <div class="mb-3"><label>Numero de téléphone:</label><br>{{ $employe->numero_de_téléphone}}</div><hr>
                              
                                 
                                 </div>
            <!-- Right half -->
            <div class="col-md-6">
                                 <div class="mb-3"><label>Email principale:</label><br> {{ $employe->Email }}</div><hr>
                                 <div class="mb-3"><label>Rôle:</label><br> {{ $employe->Rôle}}</div><hr>
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
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmer</h5>
                </div>
                <div class="modal-body">
                <form class="mb-3"  action ="{{ route('employe.sup', $employe->id) }}" method="POST"  enctype="multipart/form-data">
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
<div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="restoreModel">Confirmer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3"  action ="{{ route('employe.restauremploye', $employe->id)}}"  method="POST" >
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Moodifier un employé</h5>
                </div>
                <div class="modal-body">
                <form  class="mb-3" action="{{route ('employe.modif',$employe->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                                <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez Le nom de l'employé">
                                <span>Nom</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                                <input type="text" class="form-control" id="Nommm" name="Nom" value="{{ $employe->Nom }}">
                            </div>
                            <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez l'email de l'employe">
                               <span>Email</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                                <input type="text" class="form-control" id="emaill" name="Email"  value="{{ $employe->Email }}" />
                              
                            </div>
                            <div class="mb-3">
                           <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez le numéro de téléphone">
                            <span>Numéro de Téléphone </span><i class="fas fa-exclamation-circle"></i></label>
                            <input type="tel" class="form-control" id="numero_de_téléphone" name="numero_de_téléphone"  value="{{ $employe->numero_de_téléphone }}"/>
                          </div>  
                          <div class="mb-3 row">
                          <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez le rôle de l'employe">
                            <span>Rôle</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                           <select id="rolee" name="Rôle" class="form-select">
                         <option value="{{$employe->Rôle}}" >{{$employe->Rôle}}</option>
                         <option value="Cassier">Cassier</option>
                        <option value="Cuisinier">Cuisinier</option>
                         <option value="Serveur">Serveur</option>
                           </select>                  
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
                                <input type="password" class="form-control" id="mot_passee" name="password"   value ="{{$employe->password}}"/>
                            </div>
                           

                            <div class="modal-footer">
                              <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal" class="delete" style="margin-right: auto; color: red;">Supprimer l'employé</a>
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




       


 <!-- Bootstrap JS and jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
  $(document).ready(function() {
    $('.create-button').on('click', function() {
      $('#exampleModal').modal('show');
    });
    $('#change-status').on('click', function() {
      console.log('test');
      let url =$('#form-status').attr('url');
      console.log(url);
     
    });

    
  });
</script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>

