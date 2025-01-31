<?php require_once(__DIR__ . '/start.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Site gestion de recettes">
    <meta name="keywords" content="Carteo, Recette, Restaurant, Gestion de recette">
    <meta name="author" content="Estéban, Antoine, Lamine, Sébastien">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carteo - Inscritpion</title>

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

  <h1>information</h1>
  <section class="dashboard">
    <div class="infos">
      <div class="infos-left">
        <h3>categories - plats</h3>
        <span>nombre:</span>
      </div>
      <div class="infos-right">
        <ul>
          <li><a href="plats/ajouter-categories-plats" class="btn-add">ajouter</a></li>
          <li><a href="" class="btn-edit">modifier</a></li>
          <li><a href="plats/supprimer-plats" class="btn-delete">supprimer</a></li>
        </ul>
      </div>
    </div>
    <div class="infos">
      <div class="infos-left">
        <h3>categories - Menus</h3>
        <span>nombre:</span>
      </div>
      <div class="infos-right">
        <ul>
          <li><a href="" class="btn-add">ajouter</a></li>
          <li><a href="" class="btn-edit">modifier</a></li>
          <li><a href="" class="btn-delete">supprimer</a></li>
        </ul>
      </div>
    </div>
    <div class="infos">
      <div class="infos-left">
        <h3>Menus</h3>
        <span>nombre:</span>
      </div>
      <div class="infos-right">
        <ul>
          <li><a href="" class="btn-add">ajouter</a></li>
          <li><a href="" class="btn-edit">modifier</a></li>
          <li><a href="" class="btn-delete">supprimer</a></li>
        </ul>
      </div>
    </div>

  </section>

  <?php require_once(__DIR__ . '/footer.php'); ?>
  
</body>
</html>