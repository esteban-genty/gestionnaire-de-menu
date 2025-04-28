<?php 

// Démarrer la session si ce n'est pas déjà fait
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit;
}

// Connexion à la base de données
require_once(__DIR__ . '/start.php');

// Requête pour obtenir le nombre de catégories distinctes
$requete_nombre_categories = "SELECT COUNT(DISTINCT categories_plat) FROM plats WHERE utilisateur_id = :user_id";
$stmt = $bddPDO->prepare($requete_nombre_categories);
$stmt->execute(['user_id' => $_SESSION['utilisateur']['utilisateur_id']]);
$nombre_categories = $stmt->fetchColumn();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Site gestion de recettes">
    <meta name="keywords" content="Carteo, Recette, Restaurant, Gestion de recette">
    <meta name="author" content="Estéban, Antoine, Lamine, Sébastien">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carteo - Inscription</title>

    <!-- Fichier styles -->
    <link rel="stylesheet" href="styles/dashboard.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/root.css">
    <link rel="stylesheet" href="styles/header.css">

    <!-- Police d'écriture -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
<?php require_once(__DIR__ . '/header.php'); ?>

  <h1>Information</h1>
  <section class="info">
    <p>Vous êtes connecté en tant que <?= $_SESSION['utilisateur']['prenom'] ?></p>
    <button><a href="logout.php">Déconnexion</a></button>
  </section>
  <section class="dashboard">
    <div class="infos">
      <div class="infos-left">
        <h3>Catégories - Plats</h3>
        <span>Nombre: <?= $nombre_categories ?></span>
      </div>
      <div class="infos-right">
        <ul>
          <li><a href="plats/ajouter-categories-plats" class="btn-add">Ajouter</a></li>
          <li><a href="" class="btn-edit">Modifier</a></li>
          <li><a href="plats/supprimer-plats" class="btn-delete">Supprimer</a></li>
        </ul>
      </div>
    </div>
    <div class="infos">
      <div class="infos-left">
        <h3>Plats</h3>
      </div>
      <div class="infos-right">
        <ul>
          <li><a href="plats/ajouter-plats.php" class="btn-add">Ajouter</a></li>
          <li><a href="" class="btn-edit">Modifier</a></li>
          <li><a href="plats/supprimer-plats.php" class="btn-delete">Supprimer</a></li>
        </ul>
      </div>
    </div>
  </section>

  <?php require_once(__DIR__ . '/footer.php'); ?>
  
</body>
</html>
