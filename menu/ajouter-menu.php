<?php require_once(__DIR__ . '/../start.php') ?>

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