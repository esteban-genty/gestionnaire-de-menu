<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/dashboard.css">
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="stylesheet" href="./styles/root.css">    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
    <?php require_once(__DIR__ . '/header.php'); ?>    
    <main>
        <section class="bigsection">
            <div>
                <h1>Informations</h1>
                <a href="categories.php"><i class="fa-solid fa-square-plus"></i></a>
            </div>
            <section class="catcard">
                <div class="leftsideCard">
                    <h2>Nom de la catégorie via form</h2>
                    <h3>Nombre de plats via sum bdd "plats"</h3>
                    <a href="recettes.php"><i class="fa-solid fa-square-plus"></i></a>
                    <a href="#"><i class="fa-regular fa-pen-to-square"></i></a>
                    <a href="#"><i class="fa-regular fa-trash-can"></i></a>
                </div>
            </section>
        </main>
    </body>
    </html>