<?php require_once(__DIR__ . '/../start.php') ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Site gestion de recettes">
    <meta name="keywords" content="Carteo, Recette, Restaurant, Gestion de recette">
    <meta name="author" content="Estéban, Antoine, Lamine, Sébastien">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carteo - Ajout Plats</title>

    <!-- Fichier styles -->
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/ajouter-plats.css">
    <link rel="stylesheet" href="../styles/style.css">

    <!-- Police d'écriture -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>

<body>

    <?php require_once(__DIR__ . '/../header.php'); ?>

    <section class="ajout-categories">
        <h1>Ajouter un plat</h1>
        <form action="ajouter-plats.php" method="POST">

            <?php 
                $requete = "SELECT DISTINCT categories_plat FROM plats WHERE utilisateur_id = :user_id";
                $requete_plats = $bddPDO->prepare($requete);
                $requete_plats->bindValue(':user_id', $_SESSION['utilisateur']['utilisateur_id']);
                $requete_plats->execute();
            ?>
            <select name="categories_plat" id="categories_plat">
                <option value="choisir-categories">Choisir Categorie</option>
                <?php
                    while ($choisir_categories = $requete_plats->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $choisir_categories['categories_plat'] . "'>" . $choisir_categories['categories_plat'] . "</option>";
                    }
                ?>
            </select>


            <input placeholder="Titre" type="text" name="titre_plat" required>

            <textarea placeholder="Description Plat" name="description_plat" required></textarea>

            <input placeholder="Prix" type="text" name="prix_plat" required>

            <button type="submit" name="enregistrer">Ajouter</button>
        </form>
    </section>
    <section class="validation">

    <?php require_once(__DIR__ . '/../footer.php') ?>

    <?php
        if (isset($_POST['enregistrer'])) {

            $categorie = htmlspecialchars($_POST['categories_plat']);

            if($categorie == "choisir-categories"){
                echo "<p>Veuillez choisir une catégorie.</p>";
                exit();
            }else{
                $categorie = htmlspecialchars($_POST['categories_plat']);
            }

            $titre = htmlspecialchars($_POST['titre_plat']);
            $description_plat = htmlspecialchars($_POST['description_plat']);
            $prix = htmlspecialchars($_POST['prix_plat']);
            $afficher = true;

            if (!empty($categorie) && !empty($titre) && !empty($description_plat) && !empty($prix)) {

                // Requête SQL
                $requete = $bddPDO->prepare("INSERT INTO `plats` (categories_plat, titre_plat, description_plat, prix_plat, afficher_plat, utilisateur_id) VALUES (:categorie, :titre, :description_plat, :prix, :afficher, :utilisateur)");

                // Change les valuer des paramètres de la requête SQL
                $requete->bindValue(':categorie', $categorie);
                $requete->bindValue(':titre', $titre);
                $requete->bindValue(':description_plat', $description_plat);
                $requete->bindValue(':prix', $prix);
                $requete->bindValue(':afficher', $afficher);
                $requete->bindValue(':utilisateur', $_SESSION['utilisateur']['utilisateur_id']);

                // Exécution de la requête SQL
                $result = $requete->execute();

                if ($result) {
                    echo "<p>Plat ajoutée | ID : " . $bddPDO->lastInsertId() . " </br> Catgeorie : " . $categorie . "</p>";
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit; 
                } else {
                    echo "<p>Erreur lors de l'ajout du plat.</p>";
                }
            } else {
                echo "<p>Veuillez remplir tous les champs.</p>";
                }
        }
    ?>
</section>
</body>
</html>
