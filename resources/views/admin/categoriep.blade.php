<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>catégorie principale</title>
    <meta name="description" content="" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/logoo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <style>
        .supprime.clicked+.table-body {
            /* Styles for the table body when the button is clicked, e.g., different background color */
        }
    </style>

    <style>
        #newTable {
            display: none;
            /* Initially hide the new table */
        }
    </style>


    <style>
        .restore-category {
            color: green;
        }
    </style>

    <style>
        .button-heading-container {
            display: flex;
            align-items: center;
            /* Align items vertically in the center */
            justify-content: space-between;
            /* Add space between the heading and the button */
            margin-bottom: 20px;
            /* Adjust margin as needed */
        }
    </style>
    <style>
        .error-message {
            color: red;
            font-size: 0.875em;
        }
    </style>

    <style>
        .underline {
            text-decoration: underline;
            text-decoration-color: #AF2B1D;
        }


        .active-tab .underline {
            display: inline;
            border-bottom: 2px solid black;
        }

        .active-tab {
            font-weight: bold;
        }
        .center-text {
    text-align: center;
}
    </style>

</head>

<body class="bg-white">



    @include ('admin.sidebar')

    <!-- Layout container -->
    <div class="layout-page  ">

        @include ('admin.nav')
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                    <div class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>Catégories principales</h4>
                        <button id="create-category-button" class="create-button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Créer une catégorie principale</button>
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
                                                </th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                @if ($touscatp->count() > 0)
                                                </th>
                                                <th>Photo de catégorie</th>
                                                <th>Nom</th>
                                                <th>Référence</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-body">
                                            @foreach ($touscatp as $categoriep)
                                         
                                                <tr class="clickable-row" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal2"
                                                    onclick="setId({{ $categoriep->id }})"
                                                    data-nom="{{ $categoriep->Nom }}"
                                                    data-reference="{{ $categoriep->Référence }}">
                                                    <td><img src="{{ $categoriep->photo }}" width="60"
                                                            height="60" class="img img-responsive"
                                                            style="position: center" /></td>
                                                    <td>{{ $categoriep->Nom }}</td>
                                                    <td>{{ $categoriep->Référence }}</td>
                                                </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="8" class="center-text">Commencez à gérer votre menu en créant des catégories principale</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </div>
                                </table>

                                <table class="datatables-customers table border-top" id="newTable"
                                    style="display: none;">
                                    <div class="d-flex justify-content-end">

                                        <thead>
                                            <tr>
                                                <th class="tous th-status all underline" id="tabTous"
                                                    onclick="showMainTable()">Tous <span class="underline"></span></th>
                                                <th class="supprime th-status deleted"id="tabSupprime"
                                                    onclick="showNewTable()">Supprimé <span class="underline"></span>
                                                </th>
                                                <th></th>
                                            </tr>
                                            @if ($deletedcatp->count() > 0)
                                            <tr>
                                                </th>
                                                <th>Photo de catégorie</th>
                                                <th>Nom</th>
                                                <th>Référence</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-body">

                                            @foreach ($deletedcatp as $categoriep)
                                                <tr class="clickable-row3" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal3"
                                                    onclick="setId({{ $categoriep->id }})">
                                                    <td><img src="{{ $categoriep->photo }}" width="80"
                                                            height="80" class="img img-responsive"
                                                            style="position: center" /></td>
                                                    <td>{{ $categoriep->Nom }}</td>
                                                    <td>{{ $categoriep->Référence }}</td>
                                                </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="8" class ="center-text">Commencez à gérer votre menu en créant des catégories principale</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </div>
                                </table>





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
        </div>
        <!-- Modal -->
        <div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="restoreModalLabel">Confirmer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- The form action should be set to the delete route, either statically or dynamically via JS -->
                        <form class="mb-3" id="restoreForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Add @method('DELETE') inside the form to set the method to DELETE -->
                            @method('PUT')
                            <div class="mb-3">
                                <h4>Etes-vous sûr de vouloir raustaurer ceci?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary" id="deleteButton">Oui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal -->

        <!-- Modal -->
        <div class="modal fade custom-modal" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Modifier la catégorie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form class="mb-3" id ="exampleModal3" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label ms-3" for="nom">Nom</label>
                                <input type="text" class="form-control" id="Nom3" name="Nom">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Photo de catégorie</label>
                                <input type="file" class="form-control" id="photo3" name="photo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="ref">Référence</label>
                                <input type="text" class="form-control" id="Référence3" name="Référence">
                            </div>
                            <div class="modal-footer">
                                <a href="#"class="restore-category" data-bs-toggle="modal"
                                    data-bs-target="#restoreModal">Restaurer la catégorie</a>
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary" id="saveButton">Sauvegarder</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <!-- /Modal -->




        <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Modifier la catégorie principale</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="mb-3" id ="exampleForm2" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label ms-3" for="nom">Nom</label>
                                <input type="text" class="form-control" value="" id="Nomm"
                                    name="Nom">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Photo de catégorie</label>
                                <input type="file" class="form-control" value="" id="photo"
                                    name="photo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="ref">Référence</label>
                                <input type="text" class="form-control" id="Référencee" name="Référence">
                            </div>
                            <div class="modal-footer">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                    class="delete">Supprimer la catégorie</a>
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Fermer</button>
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">Sauvegarder</button>
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
                        <form class="mb-3" id="deleteForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <div class="mb-3">
                                <h4>Etes-vous sûr de vouloir supprimer cecis?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary" id="deleteButton">Oui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal -->




        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Créer une catégorie principale</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('catégorie.storep') }}" method="POST" id="categoriepForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="Nom">Nom de catégorie Principale:</label>
                                <input type="text" class="form-control" id="Nommm" name="Nom">
                                <div class="invalid-feedback">Le nom de catégorie principale est obligatoire.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="photo">Photo de catégorie:</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Référence">Référence :</label>
                                <input type="text" class="form-control" id="Référenceee" name="Référence">
                                <div class="invalid-feedback">La référence est obligatoire.</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Modal -->
        

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
                const form = document.getElementById('categoriepForm');

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


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>




        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>  <script>
            $(document).ready(function() {
              $("#categoriepForm").validate({
                rules: {
                  Nom: {
                    required: true,
                    maxlength: 255
                  },
                  Référence: {
                    required: true,
                    maxlength: 255
                  }
                  // Add rules for photo validation (optional)
                },
                messages: {
                  Nom: {
                    required: "Le nom de catégorie principale est obligatoire.",
                    maxlength: "Le nom ne peut pas dépasser 255 caractères."
                  },
                  Référence: {
                    required: "La référence est obligatoire.",
                    maxlength: "La référence ne peut pas dépasser 255 caractères."
                  }
                  // Add custom messages for photo validation (optional)
                },
                submitHandler: function(form) {
                  form.submit(); // Submit the form if validation passes
                }
              });
            });
          </script>
          
          



        <script>
            function setId(id) {
                document.getElementById('deleteForm').action = "{{ route('categoriesp.delete', ['categoriep' => ':id']) }}"
                    .replace(':id', id);
                document.getElementById('restoreForm').action = "{{ route('categoriesp.restore', ['categoriep' => ':id']) }}"
                    .replace(':id', id);
                document.getElementById('exampleForm2').action = "{{ route('categoriesp.modifier', ['categoriep' => ':id']) }}"
                    .replace(':id', id);
            }
        </script>








        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const tableRows = document.querySelectorAll('.clickable-row');
        
                tableRows.forEach(row => {
                    row.addEventListener('click', function() {
                        // Get the modal elements
                        const modalTitle = document.querySelector('#exampleModal2 .modal-title');
                        const nomInput = document.getElementById('Nomm');
                        const refInput = document.getElementById('Référencee');
        
                        // Update the modal elements with data from the clicked row
                        modalTitle.textContent = 'Modifier la catégorie: ' + this.dataset.nom;
                        nomInput.value = this.dataset.nom;
                        refInput.value = this.dataset.reference;
                    });
                });
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






        <!-- Inclure Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap"></script>
        <!-- Inclure jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Inclure les fichiers JavaScript requis de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

        <script src="assets/vendor/libs/jquery/jquery.js"></script>
        <script src="assets/vendor/js/bootstrap.js"></script>
        <script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
        <script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>

</html>
