<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for signing up</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .logo {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('slims.png')}}"  class="logo">
        <h1>Bienvenue</h1>
        <p>
            Vous recevrez un e-mail avec les détails du compte.
        </p>
        <p>
           <a href="/">retour à la page d'acceuil </a>
            </p>
            <p>
                Veuillez attendre l'e-mail contenant les détails du compte.
            </p>
      
    </div>
</body>
</html>