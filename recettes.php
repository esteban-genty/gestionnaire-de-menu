<?php require_once(__DIR__ . '/start.php'); ?>

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
        <h1>Ajouter une recette</h1>

        <form action="recettes.php" method="POST">
            <label for="categorie">Catégorie de la recette</label>

            <?php 
                $requete = "SHOW TABLES FROM $dbname";
                $result = $bddPDO->query($requete); 
            ?>
            <select name="categories" id="categories">
                <?php
                    while ($row = $result->fetch(PDO::FETCH_NUM)) {
                        echo "<option value='" . htmlspecialchars($row[0], ENT_QUOTES) . "'>" . htmlspecialchars($row[0], ENT_QUOTES) . "</option>";
                    }
                ?>
            </select>

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
    if (isset($_POST['enregistrer'])) {

        // Récupérer et sécurise les donnés
        $categorie = htmlspecialchars($_POST['categories']);
        $titre = htmlspecialchars($_POST['titre']);
        $recette = htmlspecialchars($_POST['recette']);
        $auteur = htmlspecialchars($_POST['auteur']);
        $temps = htmlspecialchars($_POST['temps']);

        if (!empty($categorie) && !empty($titre) && !empty($recette) && !empty($auteur) && !empty($temps)) {

            // Requête SQL
            $requete = $bddPDO->prepare("INSERT INTO `$categorie` (titre, recette, auteur, temps) VALUES (:titre, :recette, :auteur, :temps)");

            // Change les valuer des paramètres de la requête SQL
            $requete->bindValue(':titre', $titre);
            $requete->bindValue(':recette', $recette);
            $requete->bindValue(':auteur', $auteur);
            $requete->bindValue(':temps', $temps);

            // Exécution de la requête SQL
            $result = $requete->execute();

            if ($result) {
                echo "<p>Recette ajoutée | ID : " . $bddPDO->lastInsertId() . " | Catgeorie : " . $categorie . "</p>";
            } else {
                echo "<p>Erreur lors de l'ajout de la recette.</p>";
            }
        } else {
            echo "<p>Veuillez remplir tous les champs.</p>";
        }
    }
?>



</body>
</html>
