<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js')}}"></script>
    <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!-- Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('assets/vendor/js/template-customizer.js')}}"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
      <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
      
      <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
      <script src="{{ asset('assets/js/config.js')}}"></script>
    <style>

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
           margin-right: -98%;
            margin-left: -0.02%;         
}
.prod{
    margin-right: -100%;
    width: 100%;
}
.table {
  width: 100%; /* Set the width of the table to 100% of its container */
  border-collapse: collapse; /* Collapse the borders to remove extra space */
}
.button-heading-container {
    display: flex;
    align-items: center; /* Align items vertically in the center */
    justify-content: space-between; /* Add space between the heading and the button */
    margin-bottom: 20px; /* Adjust margin as needed */
}
    </style>
</head>
<body>    
        @include('admin.sidebar')
        <div class="content-wrapper table-container">
           <div class="dev prod">
        @include('admin.nav')  
            <div  class="button-heading-container">         
            <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>Tous les Commandes</h4>   
                        <a href="/ordre" class="butt bg-red-700 hover:bg-black-700 text-white py-2 px-4 rounded inline-block">
                            Nouvelle Commande
                        </a>
                    </div>
                   
                    <div class="container-xxl flex-grow-1 container-p-y">   
                    <div class="card ">
                        <div class="card-datatable table-responsive table">
                        <table class="table datatables-customers table border-top">
                            <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Branche</th>
                                    <th>client</th>
                                    <th>Status</th>
                                    <th>Source</th>
                                    <th>Total</th>
                                    <th>Date d'affaires</th>
                                    <th>Ouvert à</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @foreach ($cmds as $command) 
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $command->id }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $command->branch }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $command->client }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $command->status }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $command->source }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $command-> total_price }}dt</td>   
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $command->created_at }}</td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">8h</td>
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