<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Style pour centrer la barre latérale */
        @media (max-width: 768px) {
  #sidebar {
    width: 150px;
  }
}
.sidebar {
  width: 200px;
  margin: 0 10px;
  padding: 10px;
}
.dev{
           margin-right: -20% !important;
           margin-left: 35% !important;
            
}
.t {
width: 205% !important; /* Set the width of the table to 100% of its container */
border-collapse: collapse; /* Collapse the borders to remove extra space */
}
    </style>
</head>
<body>  
    <div class="sidebar">      
        @include('admin.sidebar') 
    </div>
   
    <div class="dev prod ">
        <div class="t">
        @include('admin.nav')
        </div>
        <div class="content-wrapper">
          
            <div class="container-xxl flex-grow-1 container-p-y">           
            <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>Tous les Employeés</h4>
                <div class="card t">
                    <div class="card-datatable table-responsive table">
                        <a href="/ajouter" class="butt bg-red-700 hover:bg-black-700 text-white py-2 px-4 rounded inline-block">
                            Ajouter un nouveau employé
                        </a>
                        <table class="table datatables-customers table border-top">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" class="dt-checkboxes form-check-input"></th>
                                    <th>Nom et Prénom</th>
                                    <th>Email</th>
                                    <th>Tel</th>
                                    <th>Rôle</th>
                                   
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @foreach ($Employe as $Emp) 
                                    <tr>
                                        <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $Emp->Nom }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $Emp->Email }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $Emp->numero_de_téléphone }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $Emp->Rôle }}</td>
                                    </tr>
                                @endforeach
                            </tbody> 
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
   
</body>
</html>
