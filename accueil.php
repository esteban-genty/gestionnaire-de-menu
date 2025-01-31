<?php 
require_once("config.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

session_destroy();

// Récupération des recettes depuis la base de données
try {
    $sql = "SELECT id, titre, description, image, temps_preparation, ingredients FROM recettes LIMIT 8";
    $stmt = $pdo->query($sql);
    $recettes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de la récupération des recettes : " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Gestionnaire de Menu</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="styles/accueil.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <style>
        .popo {
  padding: 60px 20px;
  background: rgba(253, 204, 175, 0.8);
  text-align: center;
  font-family: 'Roboto', sans-serif;
}
.popo {
  padding: 60px 20px;
  background-color: #F4EBDC;
  text-align: center;
  font-family: 'Roboto', sans-serif;
}

.popo h2 {
  font-size: 2.2rem;
  color: #512314;
  margin-bottom: 30px;
  font-weight: 700;
  font-family: "Lobster", sans-serif;
}

.caracteristiques {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 30px;
  max-width: 950px;
  margin: 0 auto;
}

.caracteristique {
    background: rgba(253, 204, 175, 0.8);
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
  text-align: left;
  max-width: 300px;
  margin: 0 auto;
}

.caracteristique:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
}

.caracteristique i {
  font-size: 3rem;
  color:rgb(233, 118, 24);
  margin-bottom: 15px;
}

.caracteristique h3 {
  font-size: 1.4rem;
  color: #512314;
  margin-bottom: 10px;
  font-weight: 600;
}

.caracteristique p {
  font-size: 0.95rem;
  color: #666666;
  line-height: 1.5;
}

@media (max-width: 768px) {
  .caracteristique {
    padding: 18px;
  }

  .caracteristique i {
    font-size: 2.5rem;
  }

  .caracteristique h3 {
    font-size: 1.3rem;
  }
}
.social-media {
  position: fixed;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  display: flex;
  flex-direction: column;
  gap: 20px;
  background-color: #f0f8ff;
  padding: 10px;
  border-radius: 12px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.social-icon {
  background-color: #1e90ff;
  color: white;
  font-size: 2rem;
  padding: 15px;
  border-radius: 50%;
  transition: transform 0.3s ease, background-color 0.3s ease;
}

.social-icon:hover {
  transform: scale(1.1);
  background-color: #003366;
}

.social-icon i {
  pointer-events: none;
}


</style>
</head>

<body>

    <!-- Header -->
    <?php require_once(__DIR__ . '/header.php'); ?>

    <section class="Accueil">
        <div class="background-container">
            <div class="box">
                <h2>Bienvenue sur CarteO</h2>
                <p>Bienvenue sur Carteo ! 🍽️✨ Découvrez un univers gourmand où chaque recette est une invitation au voyage des saveurs.</p>
            </div>
        </div>
        <p style="font-family: cursive;">Découvrez plus en vous connectant</p>
        <button><a href="inscription.php">Inscrivez-vous gratuitement</a></button>
        <p>Ou</p>
        <a href="login.php" style="text-decoration: underline;color: black;">Connectez-vous</a>
    </section>

    </section>


<!---------------------------->




<section class="popo">
<h2>Pourquoi choisir CarteO ?</h2>
<div class="caracteristiques">
<div class="caracteristique">
  <i class="fas fa-utensils"></i>
  <h3>Recettes variées et gourmandes</h3>
  <p>CarteO vous propose une large sélection de recettes pour tous les goûts, des plats rapides aux créations plus élaborées.</p>
</div>
<div class="caracteristique">
  <i class="fas fa-mobile-alt"></i>
  <h3>Facilité d'utilisation</h3>
  <p>Naviguez facilement grâce à une interface simple et claire, optimisée pour tous vos appareils.</p>
</div>
<div class="caracteristique">
  <i class="fas fa-lemon"></i>
  <h3>Ingrédients frais et sains</h3>
  <p>Nous mettons l'accent sur des ingrédients frais et de qualité pour vous offrir des repas à la fois délicieux et équilibrés.</p>
</div>
<div class="caracteristique">
  <i class="fas fa-user-chef"></i>
  <h3>Accessibilité à tous les niveaux de cuisine</h3>
  <p>Que vous soyez un chef expérimenté ou un débutant, CarteO s’adapte à tous les niveaux grâce à des instructions détaillées et des astuces.</p>
</div>
<div class="caracteristique">
  <i class="fas fa-calendar-alt"></i>
  <h3>Planification des repas</h3>
  <p>Organisez vos repas à l’avance grâce à notre fonctionnalité de planification, pour une semaine sans stress.</p>
</div>
<div class="caracteristique">
  <i class="fas fa-users"></i>
  <h3>Communauté de passionnés</h3>
  <p>Rejoignez une communauté active de gourmets qui partagent leurs astuces, leurs recettes et leurs expériences culinaires.</p>
</div>
</div>
</section>
    <!-- Affichage des recettes dynamiques -->

<section class="recettes">
    <?php if (!empty($recettes)): ?>
        <?php foreach ($recettes as $recette): ?>
            <article>
                <div class="carte">
                    <!-- Vérification si l'image est présente -->
                    <img src="<?php echo !empty($recette['image']) ? 'assets/' . htmlspecialchars($recette['image']) : 'assets/default.jpg'; ?>" alt="<?php echo htmlspecialchars($recette['titre']); ?>">
                    <h3><?= htmlspecialchars($recette['titre']) ?></h3>
                    <div class="temps-box">
                        <!-- Affichage du temps de préparation -->
                        <p><?= htmlspecialchars($recette['temps_preparation']) ?> min</p>
                    </div>
                    <div>
                        <p>Ingrédients :</p>
                    </div>
                    <div class="conteneur-texte">
                        <?php
                        $ingredients = explode(',', $recette['ingredients']);
                        foreach ($ingredients as $ingredient) {
                            echo "<p>- " . htmlspecialchars(trim($ingredient)) . "</p>";
                        }
                        ?>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="aucun">Aucune recette disponible pour le moment.</p>
    <?php endif; ?>
</section>

    <!-- Réseaux sociaux -->
    <div class="social-media">
        <a href="https://www.facebook.com" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.twitter.com" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
        <a href="https://www.linkedin.com" target="_blank" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
    </div>

    <!-- Footer -->
    <?php require_once(__DIR__ . '/footer.php'); ?>

</body>
</html>
