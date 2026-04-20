<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>brabnche</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/logoo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />


    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!-- Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!-- Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    <link rel="stylesheet" href="/assets/css/produit.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>



    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

   



    <style>
        /* CSS styling for the box */

        .button-heading-container {
            display: flex;
            align-items: center;
            /* Align items vertically in the center */
            justify-content: space-between;
            /* Add space between the heading and the button */
            margin-bottom: 20px;
            /* Adjust margin as needed */
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        .add-button {
            background-color: white;
            color: black;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>


</head>

<body class=" bg-white">
    @include ('admin.sidebar')

    <!-- Layout container -->
    <div class="layout-page">
        @include('admin.nav')
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                    <h5 class="py-3 mb-2"><a href ="{{ route('branche.affich') }}"> Retour</a></h5>
                    <div class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>{{ $branche->Nom }}</h4>
                        <div class="button-group">

                            <button type="button" id="create-button" class="create-button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Modidier la branche</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3"><label>Nom:</label><br>{{ $branche->Nom }}</div>
                                    <hr>
                                    <div class="mb-3"><label>Ouverture à partir de:</label><br>{{ $branche->ouverture }}</div>
                                    <hr>
                                    <div class="mb-3"><label>Groupe d'impôt:</label> <br>{{ $branche->tax_groupe }}
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3"><label>Référence :</label><br>{{ $branche->référence }} </div>
                                    <hr>
                                    <div class="mb-3"><label>Ouverture à:</label><br>{{ $branche->fermeture }}</div>
                                    <hr>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier branche</h5>
                    </div>
                    <div class="modal-body">
                        <form class="mb-3" action="{{ route('branche.modif', $branche->id )}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Entrez un nom de branche">
                                    <span>Nom</span><span style="color: red;">*</span><i
                                        class="fas fa-exclamation-circle"></i></label>
                                <input type="text" class="form-control" id="Nom" name="Nom" value="{{ $branche->Nom }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Entrez le référence de ce branche">
                                    <span>Référence</span><i class="fas fa-exclamation-circle"></i></label>
                                <input type="text" class="form-control" id="Référence" name="référence" value="{{ $branche->référence }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Entrez le groupe d'impot">
                                    <span>Groupe d'impot</span><i class="fas fa-exclamation-circle"></i></label>
                                <input type="text" class="form-control" id="tax_groupe" name="tax_groupe" value="{{ $branche->tax_groupe}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Quand le jour ouvrable commence dans cette branche.">
                                    <span>Ouverture à partir de </span><i
                                        class="fas fa-exclamation-circle"></i></label>
                                <input type="time" class="form-control" id="time1" name="ouverture" value ="{{ $branche->ouverture}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Quand la journée se termine dans cette branche.">
                                    <span>Ouverture à </span><i class="fas fa-exclamation-circle"></i></label>
                                <input type="time" class="form-control" id="time2" name="fermeture" value="{{ $branche->fermeture}}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary" id="saveButton">Applique</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal -->


        <!-- Modal -->
        <div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="restoreModel">Confirmer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="mb-3" action ="" m method="POST">
                            @csrf
                            <div class="mb-3">
                                <h4>Etes-vous sûr de vouloir restaurer ceci?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Annuler</button>
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
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirmer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="mb-3" action ="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <h4>Etes-vous sûr de vouloir supprimer ceci?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Annuler</button>
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
        <div class="modal fade" id="tagsmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter des étiquettes </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="mb-3" action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Etiquettes </label>
                                <input type="text" class="form-control" id="étiquettes" name ="étiquettes">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary" id="saveButton">Applique</button>
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

                $('.#tags-button').on('click', function() {
                    $('#tagsModal').modal('show');
                })
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        <script src="assets/vendor/js/bootstrap.js"></script>
        <script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
        <script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>

</html>
