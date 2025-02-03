<?php
// Démarrer la session si ce n'est pas déjà fait
session_start();
require_once(__DIR__ . '/start.php');

// Vérification si le formulaire est soumis
if (isset($_POST['email'])) {
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    if ($email && $password) {
        // Requête pour récupérer l'utilisateur avec cet email
        $stmt = $bddPDO->prepare("SELECT * FROM utilisateurs WHERE mail = :mail");
        $stmt->bindParam(':mail', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Vérification du mot de passe
            if ($user['mdp'] == md5($password)) {
                // Si le mot de passe est correct, enregistrer les données de l'utilisateur dans la session
                $_SESSION['utilisateur'] = $user;

                // Redirection vers une page sécurisée (par exemple, le dashboard)
                header("Location: dashboard.php");
                exit(); // Assurez-vous que le script s'arrête après la redirection
            } else {
                $error = "Mot de passe incorrect. Veuillez réessayer.";
            }
        } else {
            $error = "Utilisateur introuvable. Veuillez vous inscrire.";
            // Si l'utilisateur n'est pas trouvé, redirige vers la page d'inscription
            header("Location: inscription.php");
            exit();
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
    <meta name="description" content="Site gestion de recettes">
    <meta name="keywords" content="Carteo, Recette, Restaurant, Gestion de recette">
    <meta name="author" content="Estéban, Antoine, Lamine, Sébastien">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carteo - Connexion</title>

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
<header>
    <nav>
        <ul class="nav-left">
            <li><a href="accueil.php" class="carteo"><h5>Carteo</h5></a></li>
        </ul>
    </nav>
</header>
    <main>
        <h1>Connexion</h1>

        <section class="formsection">
            <form action="login.php" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>

                <div id="buttonbox">
                    <button type="submit">Se connecter</button>
                </div>
            </form>
        </section>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
    </main>
</body>
</html>
