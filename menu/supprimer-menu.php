<?php require_once(__DIR__ . '/../start.php') ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Site gestion de recettes">
    <meta name="keywords" content="Carteo, Recette, Restaurant, Gestion de recette">
    <meta name="author" content="Estéban, Antoine, Lamine, Sébastien">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carteo - Suppression</title>

    <!-- Fichier styles -->
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/supprimer.css">
    <link rel="stylesheet" href="../styles/style.css">

    <!-- Police d'écriture -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>

<body>

    <?php require_once(__DIR__ . '/../header.php'); ?>

    <?php
        $requete = "SELECT * FROM plats";
        $result = $bddPDO->query($requete);
    ?>

    <h1>Supprimer un plat</h1>
    <section class="suppression-plats">
        <?php
            while ($plats = $result->fetch(PDO::FETCH_ASSOC)) {
                if($plats['afficher_plat'] == 1) {
                    echo "<article>";
                    echo "<div class=\"detail\">";
                    echo "<h2>" . $plats['titre_plat'] . " | ID : " . $plats['plat_id'] . "</h2>";
                    echo "<h3> Catégorie : ". $plats['categories_plat'] . " | Prix : " . $plats['prix_plat'] . "€</h3>";
                    echo "</div>";

                    echo "<form method=\"POST\" action=\"\">";
                    echo "<input type=\"hidden\" name=\"plat_id\" value=\"" . $plats['plat_id'] . "\">";
                    echo "<button type=\"submit\" name=\"supprimer-plats\">Supprimer</button>";
                    echo "</form>";
                    echo "</article>";
                }
            }
        ?>
    </section>

    <h1>Supprimer une catégorie de plat</h1>
    <section class="suppression-categories-plats">
        <?php
            $result = $bddPDO->query($requete);
            
            while ($plats = $result->fetch(PDO::FETCH_ASSOC)) {
                if($plats['afficher_plat'] == 0) {
                    echo "<article>";
                    echo "<div class=\"detail\">";
                    echo "<h2> Catégorie : ". $plats['categories_plat'] . "</h2>";
                    echo "</div>";

                    echo "<form method=\"POST\" action=\"\">";
                    echo "<input type=\"hidden\" name=\"plat_id\" value=\"" . $plats['plat_id'] . "\">";
                    echo "<button type=\"submit\" name=\"supprimer-categories-plats\">Supprimer</button>";
                    echo "</form>";
                    echo "</article>";
                }
            }
        ?>
    </section>

    <?php
        if (isset($_POST['supprimer-plats'])) {
            $plat_id = $_POST['plat_id'];

            if($plat_id == 0){
                echo "<p>Impossible de supprimer la catégorie par défaut.</p>";
                exit;
            } else{
            
                $requete = $bddPDO->prepare("DELETE FROM `plats` WHERE `plat_id` = :id");

                $requete->bindValue(':id', $plat_id, PDO::PARAM_INT);
                
                $result = $requete->execute();

                if ($result) {
                    echo "<p>Catégorie supprimée avec succès. ID : " . $plat_id . "</p>";
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit; 
                } else {
                    echo "<p>Erreur lors de la suppression de la catégorie.</p>";
                }
            }
        }
    ?>

    <?php
        if(isset($_POST['supprimer-categories-plats']))
        {
            $plat_id = $_POST['plat_id'];

            if($plat_id == 1) {
                echo "<p>Impossible de supprimer la catégorie par défaut.</p>";
                exit;
            } else{

               // while ($plats = $result->fetch(PDO::FETCH_ASSOC)) {
                 //   if($plats['categories_plat'] ==  ) {
                   // }

                $requete = $bddPDO->prepare("DELETE FROM `plats` WHERE `plat_id` = :id");

                $requete->bindValue(':id', $plat_id, PDO::PARAM_INT);
                
                $result = $requete->execute();

                if ($result) {
                    echo "<p>Catégorie supprimée avec succès. ID : " . $plat_id . "</p>";
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit; 
                } else {
                    echo "<p>Erreur lors de la suppression de la catégorie.</p>";
                }
            }
        }
    ?>




</body>
</html>
