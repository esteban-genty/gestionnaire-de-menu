<?php 

// Démarrer la session si ce n'est pas déjà fait
session_start();
var_dump($_SESSION);

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit;
}

require_once(__DIR__ . '/../start.php') ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Site gestion de recettes">
    <meta name="keywords" content="Carteo, Recette, Restaurant, Gestion de recette">
    <meta name="author" content="Estéban, Antoine, Lamine, Sébastien">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carteo - Ajout Catégorie</title>

    <!-- Fichier styles -->
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/ajouter-categories-plats.css">
    <link rel="stylesheet" href="../styles/root.css">
    <link rel="stylesheet" href="../styles/footer.css">

    <!-- Police d'écriture -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>

<body>

    <?php require_once(__DIR__ . '/../header.php'); ?>

    <section class="ajout-categories">
        <h1>Ajouter une catégorie</h1>

        <form action="ajouter-categories-plats.php" method="POST">

            <input placeholder="Titre Catégorie" type="text" name="categories_plat" required>

            <button type="submit" name="enregistrer">Ajouter</button>

        </form>

    </section>

    <section class="validation">

        <?php
            if (isset($_POST['enregistrer'])) {
                $categories_plat = $_POST['categories_plat'];
                $titre_plat = NULL;
                $description_plat = NULL;
                $prix_plat = NULL;
                $afficher_plat = false;

                // Préparation de la requête SQL avec des paramètres
                $requete = $bddPDO->prepare("INSERT INTO `plats` (`plat_id`, `categories_plat`, `titre_plat`, `description_plat`, `prix_plat`, `afficher_plat`, `utilisateur_id`) VALUES (NULL, :categorie, :titre, :description_plat, :prix, :afficher, :utilisateur)");

                if (!empty($categories_plat)) {
                    // Lier les valeurs des paramètres
                    $requete->bindValue(':categorie', $categories_plat);
                    $requete->bindValue(':titre', $titre_plat);
                    $requete->bindValue(':description_plat', $description_plat);
                    $requete->bindValue(':prix', $prix_plat);
                    $requete->bindValue(':afficher', $afficher_plat);
                    $requete->bindValue(':utilisateur', $_SESSION['utilisateur']['utilisateur_id']);

                    // Exécution de la requête
                    $result = $requete->execute();

                    if ($result) {
                        echo "<p>Catégorie ajoutée : " . htmlspecialchars($categories_plat) . "</p>";
                        header("Location: " . $_SERVER['PHP_SELF']);
                        exit; 
                    } else {
                        echo "<p>Erreur lors de l'ajout de la catégorie.</p>";
                    }

                } else {
                    echo "<p>Veuillez remplir tous les champs.</p>";
                }
            }
        ?>
    </section>

    <?php require_once(__DIR__ . '/../footer.php') ?>

</body>
</html>
