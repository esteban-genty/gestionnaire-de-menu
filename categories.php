<?php
    // Information pour se connecter
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'carteo';

    try {
        // Connexion base de donnés avec PDO
        $connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        // Erreur PDO
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Echec de la connexion : " . $e->getMessage());
    }
    // Récupérer les recettes existantes dans la base de données
    $sql = $connect->query("SELECT * FROM patisserie");
    $patisseries = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

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
    <link rel="stylesheet" href="categories.css">
    <link rel="stylesheet" href="style.css">

    <!-- Police d'écriture -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>

<body>

    <?php require_once(__DIR__ . '/header.php'); ?>


    <section class="ajout-categories">
        <h1>Ajouter une catégorie</h1>

        <form action="" method="POST">
            <label for="titre">Titre de la recette</label>
            <input type="text" name="titre" required>

            <label for="recette">Description de la recette</label>
            <textarea name="recette" required></textarea>

            <label for="auteur">Auteur de la recette</label>
            <input type="text" name="auteur" required>

            <label for="temps">Temps de la recette</label>
            <input type="text" name="temps" required>

            <button type="submit">Envoyer</button>
        </form>
    </section>

    <?php  
    // Vérifie si le form a été soumis
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
        $recette = isset($_POST['recette']) ? $_POST['recette'] : '';
        $auteur = isset($_POST['auteur']) ? $_POST['auteur'] : '';
        $temps = isset($_POST['temps']) ? $_POST['temps'] : '';

        // Insertion dans la table patisserie
        $sql = "INSERT INTO patisserie (titre, recette, auteur, temps) VALUES (:titre, :recette, :auteur, :temps)";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':recette', $recette);
        $stmt->bindParam(':auteur', $auteur);
        $stmt->bindParam(':temps', $temps);
        
        if ($stmt->execute()) {
            echo "<p>Recette ajoutée avec succès !</p>";
        } else {
            echo "<p>Une erreur est survenue lors de l'ajout de la recette.</p>";
        }
    }
    ?>


</body>
</html>
