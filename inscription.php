<?php
    require_once(__DIR__ . '/start.php');
    $erreur_msg = "";
    if(isset($_POST['submitbutton'])) {
        extract($_POST);
        if ($mdp !== $mdp_confirmation) {
            $erreur_msg = "Les mots de passe ne correspondent pas";
        } 
        else {
            // Vérifier si l'email est déjà utilisé
            $req_check_email = $bddPDO->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
            $req_check_email->execute(['mail' => $mail]);
            if ($req_check_email->rowCount() > 0) {
                $erreur_msg = "Cet email est déjà utilisé.";
            } else {
                // Si l'email n'est pas utilisé, procéder à l'inscription
                $mdp_hashed = password_hash($mdp, PASSWORD_BCRYPT);
                $req = $bddPDO->prepare("INSERT INTO utilisateurs (societe, mail, prenom, nom, mdp) VALUES (:societe, :mail, :prenom, :nom, :mdp)");
                $req->execute(
                    array(
                        'societe' => $societe,
                        'mail' => $mail,
                        'prenom' => $prenom,
                        'nom' => $nom,
                        'mdp' => $mdp_hashed
                    )
                );
                if ($req->rowCount() > 0) {
                    $_SESSION['utilisateur'] = [
                        'societe' => $societe,
                        'mail' => $mail,
                        'prenom' => $prenom,
                        'nom' => $nom
                    ];
                    header('Location: login.php'); // Redirection vers la page de connexion
                    exit();
                } else {
                    echo "<p>Erreur lors de l'inscription</p>";
                }
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Site gestion de recettes">
    <meta name="keywords" content="Carteo, Recette, Restaurant, Gestion de recette">
    <meta name="author" content="Estéban, Antoine, Lamine, Sébastien">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carteo - Inscritpion</title>

    <!-- Fichier styles -->
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/inscription.css">
    <link rel="stylesheet" href="styles/root.css">

    <!-- Police d'écriture -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    <main>
        <section>
            <img src="assets\logo-carteo.png" alt="logo carteo">
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
                <label for="">Confirmation du mot de passe</label>
                <input type="password" name="mdp_confirmation" id="mdp_confirmation" required>
                <?php if ($erreur_msg): ?>
                    <p style="color: red;"><?php echo $erreur_msg; ?></p>
                <?php endif; ?>
                <div id = "buttonbox">
                    <button type="submit" name="submitbutton">S'inscrire</button>
                </div>
            </form>
        </section>
    </main>
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>