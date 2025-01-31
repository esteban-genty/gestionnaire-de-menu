<?php 
session_start();
//var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/redirection.css">
    <link rel="stylesheet" href="style/header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Connexion</title>
</head>

<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    <section class="Accueil">
    <div class="background-container">
    <div class="box">
        <p>Oops ! Vous n'etes pas encore inscrits! </p>
        <p>Veuillez vous inscrire en cliquant sur le lien suivant <a href="inscription.php">Inscription</a></p>
       
    </div>
</body>

</html>
