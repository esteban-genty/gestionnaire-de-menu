<?php require_once(__DIR__ . '/../start.php') ?>

<?php
session_start();
require 'config.php'; // Fichier contenant la connexion PDO à la base de données

if (!isset($_SESSION['utilisateur_id'])) {
    die("Accès refusé. Veuillez vous connecter.");
}

$utilisateur_id = $_SESSION['utilisateur_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre_menu = $_POST['titre_menu'];
    $entree_id = $_POST['entree'];
    $plat_id = $_POST['plat'];
    $dessert_id = $_POST['dessert'];

    // Récupérer les prix des plats sélectionnés
    $requete = $bddPDO->prepare("SELECT SUM(prix_plat) AS total_prix FROM plats WHERE plat_id IN (?, ?, ?) AND utilisateur_id = ?");
    $requete->execute([$entree_id, $plat_id, $dessert_id, $utilisateur_id]);
    $result = $requete->fetch(PDO::FETCH_ASSOC);
    $total_prix = $result['total_prix'];

    // Insérer le menu dans la base de données
    $requete = $bddPDO->prepare("INSERT INTO menus (titre_menu, plats_menu, prix_menu, afficher_menu, utilisateur_id) VALUES (?, ?, ?, 1, ?)");
    $requete->execute([$titre_menu, "$entree_id,$plat_id,$dessert_id", $total_prix, $utilisateur_id]);

    echo "<h2>Menu créé avec succès</h2>";
    echo "<h3>$titre_menu</h3>";
    echo "<p>Prix total : $total_prix €</p>";
} else {
    // Affichage du formulaire de création de menu
    $requete = $bddPDO->prepare("SELECT plat_id, titre_plat, prix_plat, categories_plat FROM plats WHERE afficher_plat = 1 AND utilisateur_id = ?");
    $requete->execute([$utilisateur_id]);
    $plats = $requete->fetchAll(PDO::FETCH_ASSOC);
    
    $categories = ['entrée' => [], 'plat' => [], 'dessert' => []];
    foreach ($plats as $plat) {
        $categories[$plat['categories_plat']][] = $plat;
    }
    
    echo '<form method="POST">';
    echo '<label>Nom du menu :</label> <input type="text" name="titre_menu" required><br>';
    
    foreach (['entrée', 'plat', 'dessert'] as $cat) {
        echo "<label>Choisir un $cat :</label>";
        echo "<select name='$cat' required>";
        foreach ($categories[$cat] as $plat) {
            echo "<option value='{$plat['plat_id']}'>{$plat['titre_plat']} ({$plat['prix_plat']} €)</option>";
        }
        echo "</select><br>";
    }
    
    echo '<button type="submit">Créer le menu</button>';
    echo '</form>';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/root.css">    
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/ajouter-menu.css">
    <link rel="stylesheet" href="../styles/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Carteo - Ajout de menu</title>
</head>
<body>
    <?php require_once(__DIR__ . '/../header.php'); ?>
    <main>
        <h1>Ajout de menu</h1>
        <section class="formsection">
            <form action="" method="post">
                <label for="">Entrez le nom du menu</label>
                <input placeholder="Enfant, Carte du jour..." type="text" name="titre_menu" required>
                <label for="">Choisissez</label>
                <select name="choix-plat1" id="">
                    <option value="">Un premier plat</option>
                </select>
                <select name="choix-plat2" id="">
                <option value="">Un deuxième plat</option>
                </select>
                <select name="choix-plat3" id="">
                <option value="">Un troisième plat</option>
                </select>
                <label for="">Prix du menu : </label>
                <div id = "buttonbox">
                    <button type="submit" name="submitbutton">Envoi</button>
                </div>
            </form>
        </section>
    </main>
    <?php require_once(__DIR__ . '/../footer.php'); ?>
</body>
</html>