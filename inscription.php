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
    $sql = $connect->query("SELECT * FROM utilisateurs");
    $users = $sql->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST['submitbutton'])) {
        var_dump($_POST);
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/inscription.css">
    <link rel="stylesheet" href="./styles/header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Inscription</title>
</head>
<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    <main>
        <section>
            <img src="ressources\logo-carteo.png" alt="logo carteo">
        </section>
        <h1>Inscription</h1>
        <section class="formsection">
            <form action="" method="post">
                <label for="">Société</label>
                <input type="text" name="entreprise" id="entreprise" required>
                <label for="">Email</label>
                <input type="email" name="email" id="email" required>
                <label for="">Prénom</label>
                <input type="text" name="prenom" id="prenom" required>
                <label for="">Nom</label>
                <input type="text" name="nom" id="nom" required>
                <label for="">Mot de passe</label>
                <input type="password" name="password" id="password" required>
                <label for="">Confirmer mot de passe</label>
                <input type="password" name="password" id="password" required>
                <div id = "buttonbox">
                    <button type="submit" name="submitbutton">S'inscrire</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>