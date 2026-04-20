<?php
$avatarPath = ""; // Initialise la variable $avatarPath

if(isset($_FILES['upload'])) {
    $target_dir = "uploads/"; // Le dossier où vous souhaitez enregistrer les images
    $target_file = $target_dir . basename($_FILES["upload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Vérifie si le fichier est une image réelle ou une fausse image
    $check = getimagesize($_FILES["upload"]["tmp_name"]);
    if($check === false) {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }
    
    // Vérifie si le fichier existe déjà
    if (file_exists($target_file)) {
        echo "Désolé, un fichier avec ce nom existe déjà.";
        $uploadOk = 0;
    }
    
    // Vérifie la taille du fichier (en bytes)
    if ($_FILES["upload"]["size"] > 5000000) {
        echo "Désolé, votre fichier est trop volumineux.";
        $uploadOk = 0;
    }
    
    // Autorise certains formats de fichiers
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        $uploadOk = 0;
    }
    if ($_FILES["upload"]["error"] > 0) {
        echo "Erreur lors du téléchargement: " . $_FILES["upload"]["error"];
    }
    
    // Vérifie si $uploadOk est défini à 0 par une erreur
    if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'a pas pu être téléchargé.";
    // Si tout est ok, essayez de télécharger le fichier
    } else {
        if (move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) {
            $avatarPath = $target_file; // Stocke le chemin de l'image téléchargée
            echo "Le fichier ". htmlspecialchars( basename( $_FILES["upload"]["name"])). " a été téléchargé.";
        } else {
            echo "Il y a eu une erreur lors du téléchargement de votre fichier.";
        }
    }
}

