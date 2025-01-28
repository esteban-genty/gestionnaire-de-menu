<?php
// Connexion à la base de données
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'carteo';

try {
    // Connexion avec PDO
    $bddPDO = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}

// Vérification si le formulaire est soumis

//var_dump($_POST);

if (isset($_POST['email'])) {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    //var_dump('je suis dedans bordel');

    if ($email && $password) {
        // Requête pour récupérer l'utilisateur avec cet email
        $stmt = $bddPDO->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
        $stmt->bindParam(':mail', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
       // var_dump($user);

        if ($user) {
            // Vérification du mot de passe
            if (password_verify($password, $user['mot de passe'])) {
                // Si le mot de passe est correct, rediriger vers une page sécurisée
                header("Location: accueil.php");
                exit();
            } else {
                $error = "Mot de passe incorrect. Veuillez réessayer.";
            }
        } else {
            $error = "Utilisateur introuvable. Veuillez vous inscrire.";
            header("Location: accueil.php");
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Carteo.css/login.css">
    <link rel="stylesheet" href="Carteo.css/header.css">
    <title>Connexion</title>
</head>

<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    <main>
        <h1>Connexion</h1>

        <section class="formsection">
            <!-- Affiche un message d'erreur s'il existe -->

            <form action="" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Mot de passe</label>
                <input type="password" name="mdp" id="password" required>

                <div id="buttonbox">
                    <button type="submit">Se connecter</button>
                </div>
            </form>
            <?php
         isset($error) ? print_r($error)  : '';
            ?>
        </section>
        </section>
    </main>
</body>

</html>