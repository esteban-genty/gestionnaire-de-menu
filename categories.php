<?php require_once(__DIR__ . '/start.php') ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Site gestion de recettes">
    <meta name="keywords" content="Carteo, Recette, Restaurant, Gestion de recette">
    <meta name="author" content="Estéban, Antoine, Lamine, Sébastien">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carteo - Categories</title>

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
        <h1>Ajouter une Categories</h1>

        <form action="categories.php" method="POST">
            <label for="titre">Titre de la catégorie</label>
            <input type="text" name="titre" required>

            <button type="submit" name="enregistrer">Envoyer</button>
        </form>
    </section>

    <?php
        if(isset($_POST['enregistrer']) && !empty($_POST['titre']))
        {
            $titre = $_POST['titre'];

            $titre = preg_replace('/[^a-zA-Z0-9_]/', '', $titre);

            $sql = "CREATE TABLE `$titre` (
                    `recettes_id` INT NOT NULL AUTO_INCREMENT,
                    `titre` VARCHAR(255) NOT NULL,
                    `recette` VARCHAR(255) NOT NULL,
                    `auteur` VARCHAR(255) NOT NULL,
                    `temps` INT NOT NULL,
                    PRIMARY KEY (`recettes_id`)
                    ) ENGINE = MyISAM;";

            $result = $bddPDO->exec($sql);

            if(!$result)
            {
                echo "<p>La catégorie a bien été ajoutée nom de la catégorie : </p>" . $titre;
            }
            else
            {
                echo "<p>Erreur lors de l'ajout de la catégorie</p>";
            }
        }
    ?>

</body>
</html>
