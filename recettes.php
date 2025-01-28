<?php require_once(__DIR__ . '/start.php') ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Site gestion de recettes">
    <meta name="keywords" content="Carteo, Recette, Restaurant, Gestion de recette">
    <meta name="author" content="Estéban, Antoine, Lamine, Sébastien">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carteo - Recettes</title>

    <!-- Fichier styles -->
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="recettes.css">
    <link rel="stylesheet" href="style.css">

    <!-- Police d'écriture -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>

<body>

    <?php require_once(__DIR__ . '/header.php'); ?>


    <section class="ajout-categories">
        <h1>Ajouter une recettes</h1>

        <form action= "recettes.php" method="POST">
            <label for="titre">Titre de la recette</label>
            <input type="text" name="titre" required>

            <label for="recette">Description de la recette</label>
            <textarea name="recette" required></textarea>

            <label for="auteur">Auteur de la recette</label>
            <input type="text" name="auteur" required>

            <label for="temps">Temps de la recette</label>
            <input type="text" name="temps" required>

            <button type="submit" name="enregistrer">Envoyer</button>
        </form>
    </section>

    <?php
            
        if(isset($_POST['enregistrer'])){

            $titre = $_POST['titre'];
            $recette = $_POST['recette'];
            $auteur = $_POST['auteur'];
            $temps = $_POST['temps'];

            if(!empty($titre) && !empty($recette) && !empty($auteur) && !empty($temps))
            {
                $requete = $bddPDO->prepare('INSERT INTO patisserie (titre, recette, auteur, temps) VALUES (:titre, :recette, :auteur, :temps)');

                $requete->bindValue(':titre', $titre);
                $requete->bindValue(':recette', $recette);
                $requete->bindValue(':auteur', $auteur);
                $requete->bindValue(':temps', $temps);

                $result = $requete->execute();

                if(!$result){
                    echo "<p>Erreur</p>";
                }else{
                    echo "<p>Recette ajoutée | ID : </p>" . $bddPDO->lastInsertId();
                }

            }else{
                echo "<p>Veuillez remplir tous les champs</p>";
            }
        }

    ?>
</body>
</html>
