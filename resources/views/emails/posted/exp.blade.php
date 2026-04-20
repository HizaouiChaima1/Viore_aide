<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur notre plateforme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 100px;
            height: auto;
        }
        .message {
            margin-bottom: 20px;
        }
        .credentials {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
        }
        .credentials p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ $message->embed(public_path('slims.png')) }}" alt="Logo de notre plateforme">

        </div>
        <div class="message">
            <p>Bienvenue sur notre plateforme !</p>
            <p>Voici vos informations de connexion :</p>
        </div>
        <div>
            <p><strong>login :</strong><a href="{{ url('SlimsDigital/logine') }}">SlimsDigital/logine</a>
            <p><strong>E-mail :</strong>{{ $email }} </p>
            <p><strong>Mot de passe :</strong>{{ $password}} </p>
        </div>
        <p>Merci de vous être inscrit sur notre plateforme. Si vous avez des questions ou des problèmes, n'hésitez pas à nous contacter.</p>
        <p>Cordialement,<br>L'équipe de Slims</p>
    </div>
</body>
</html>
