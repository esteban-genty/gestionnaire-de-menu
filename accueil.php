<?php 
session_start();

//var_dump($_SESSION);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Gestionnaire de Menu</title>
    
        <!-- Police d'écriture -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
   
   
        <!---------style CSS-------->
        <link rel="stylesheet" href="Carteo.css/style.css">
        <link rel="preconnect" href="Carteo.css/header.css" >
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>


<body>
    <!-- Header -->
    <?php require_once(__DIR__ . '/header.php'); ?>
  
    <!-- Section d'accueil -->
    <section class="Accueil">
    <div class="background-container">
    <div class="box">
        <h2>Bienvenue sur CarteO</h2>
        <p>Bienvenue sur Carteo ! 🍽️✨
Découvrez un univers gourmand où chaque recette est une invitation au voyage des saveurs. Que vous soyez un chef passionné ou un amateur en quête d’inspiration, notre collection de recettes saura éveiller votre créativité culinaire.

Préparez-vous à explorer des plats savoureux, simples ou sophistiqués, adaptés à toutes les envies et occasions. Bon appétit et bonne découverte sur Carteo ! 🍴👨‍🍳!</p>
       
    </div>
</div>
        <p style="font-family: cursive;">Découvrez plus en vous connectant</p>
        <button><a href="inscription.php">Inscrivez vous gratuitement</a> </button>
        <p>Ou</p>
        <a href="login.php" style="text-decoration: underline;color: black;">Connectez vous</a>
           
 

    </section>


    <!---------------------------->
  
   


  


    <!-- Section principale -->
    <main>
        <section class="recettes">
            <!-- article pour une carte -->
            <article>
                <div class="carte">
                    <img src="assets/test pizza.jpg" alt="Image 2">
                    <h3>Recette 1</h3>
                    <div class="temps-box">
                        <p>Tps</p>
                    </div>
                    <div>
                        <p>Liste des ingrédients :</p>
                    </div>
                    <div class="conteneur-texte">
                        <p>- 200g de farine</p>
                        <p>- 2 œufs</p>
                        <p>- 50g de sucre</p>
                    </div>
                </div>
               
                </div>
            </article>
            <!--  -->
            <article>
                <div class="carte">
                    <img src="assets/test pizza.jpg" alt="Image 2">
                    <h3>Recette 2</h3>
                    <div class="temps-box">
                        <p>Tps</p>
                    </div>
                    <div>
                        <p>Liste des ingrédients :</p>
                    </div>
                    <div class="conteneur-texte">
                        <p>- 200g de farine</p>
                        <p>- 2 œufs</p>
                        <p>- 50g de sucre</p>
                    </div>
                </div>
               
                </div>
            </article>
            <article>
                <div class="carte">
                    <img src="assets/test pizza.jpg" alt="Image 2">
                    <h3>Recette 3</h3>
                    <div class="temps-box">
                        <p>Tps</p>
                    </div>
                    <div>
                        <p>Liste des ingrédients :</p>
                    </div>
                    <div class="conteneur-texte">
                        <p>- 200g de farine</p>
                        <p>- 2 œufs</p>
                        <p>- 50g de sucre</p>
                    </div>
                </div>
               
                </div>
            </article>
            <article>
                <div class="carte">
                    <img src="assets/test pizza.jpg" alt="Image 2">
                    <h3>Recette 4</h3>
                    <div class="temps-box">
                        <p>Tps</p>
                    </div>
                    <div>
                        <p>Liste des ingrédients :</p>
                    </div>
                    <div class="conteneur-texte">
                        <p>- 200g de farine</p>
                        <p>- 2 œufs</p>
                        <p>- 50g de sucre</p>
                    </div>
                </div>
               
                </div>
            </article>
            <article>
                <div class="carte">
                    <img src="assets/test pizza.jpg" alt="Image 2">
                    <h3>Recette 5</h3>
                    <div class="temps-box">
                        <p>Tps</p>
                    </div>
                    <div>
                        <p>Liste des ingrédients :</p>
                    </div>
                    <div class="conteneur-texte">
                        <p>- 200g de farine</p>
                        <p>- 2 œufs</p>
                        <p>- 50g de sucre</p>
                    </div>
                </div>
               
                </div>
            </article>
            <article>
                <div class="carte">
                    <img src="assets/test pizza.jpg" alt="Image 2">
                    <h3>Recette 6</h3>
                    <div class="temps-box">
                        <p>Tps</p>
                    </div>
                    <div>
                        <p>Liste des ingrédients :</p>
                    </div>
                    <div class="conteneur-texte">
                        <p>- 200g de farine</p>
                        <p>- 2 œufs</p>
                        <p>- 50g de sucre</p>
                    </div>
                </div>
               
                </div>
            </article>
            <article>
                <div class="carte">
                    <img src="assets/test pizza.jpg" alt="Image 2">
                    <h3>Recette 7</h3>
                    <div class="temps-box">
                        <p>Tps</p>
                    </div>
                    <div>
                        <p>Liste des ingrédients :</p>
                    </div>
                    <div class="conteneur-texte">
                        <p>- 200g de farine</p>
                        <p>- 2 œufs</p>
                        <p>- 50g de sucre</p>
                    </div>
                </div>
               
                </div>
            </article>
            <article>
                <div class="carte">
                    <img src="assets/test pizza.jpg" alt="Image 2">
                    <h3>Recette 8</h3>
                    <div class="temps-box">
                        <p>Tps</p>
                    </div>
                    <div>
                        <p>Liste des ingrédients :</p>
                    </div>
                    <div class="conteneur-texte">
                        <p>- 200g de farine</p>
                        <p>- 2 œufs</p>
                        <p>- 50g de sucre</p>
                    </div>
                </div>
               
                </div>
            </article>
            <!--  -->
        </section>
    </main>
    <footer class="footer">
    <div class="footer-content">
        <h2>CarTeo - Recettes Délicieuses</h2>
        <p>Découvrez des recettes faciles et savoureuses à partager avec vos proches.</p>
       
    </div>
  
</footer>

</body>
</html>
