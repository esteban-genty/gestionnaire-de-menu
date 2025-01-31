<?php require_once(__DIR__ . '/../start.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="styles/dashboard.css">
  <link rel="stylesheet" href="styles/header.css">
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
          <li><a href="" class="btn-add">ajouter</a></li>
          <li><a href="" class="btn-edit">modifier</a></li>
          <li><a href="" class="btn-delete">supprimer</a></li>
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