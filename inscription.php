<?php
    session_start();
        require_once(__DIR__ . '/start.php');
        if(isset($_POST['submitbutton'])) {
            extract($_POST);

            $req = $bddPDO->prepare("INSERT INTO utilisateurs (societe, mail, prenom, nom, mdp) VALUES (:societe, :mail, :prenom, :nom, MD5(:mdp))");
            $req -> execute(
                array(
                    'societe' => $societe,
                    'mail' => $mail,
                    'prenom' => $prenom,
                    'nom' => $nom,
                    'mdp' => $mdp
                )
            );
            if ($req->rowCount() > 0) {
                $_SESSION['utilisateur'] = [
                    'societe' => $societe,
                    'mail' => $mail,
                    'prenom' => $prenom,
                    'nom' => $nom
                ];
                header('Location: index.php');
                exit();
            }
            else {
                echo "<p>Erreur lors de l'inscription</p>";
            }
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
                <input type="text" name="societe" id="societe" required>
                <label for="">Email</label>
                <input type="email" name="mail" id="mail" required>
                <label for="">Prénom</label>
                <input type="text" name="prenom" id="prenom" required>
                <label for="">Nom</label>
                <input type="text" name="nom" id="nom" required>
                <label for="">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" required>
                <div id = "buttonbox">
                    <button type="submit" name="submitbutton">S'inscrire</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>