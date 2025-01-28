<?php
   

   session_start();
   require_once 'login.php';
   if (isset($_POST ['enregistrer'])){
    // pour la validation
            $email = trim($_POST['email']);
            $password = ($_POST['password'])
            $confirmPassword = $_POST[confirmPassword];
   if(empty($email)  || empty($password))
   echo"";
   echo"";
   exit;
   }

   //confirmation du mots de passe
   if($password ! == $confirmPassword){
    echo"";
    echo"";
    exit;
   }

   try{
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `utilisateurs` (mail, nom, prenom, password) VALUES (:mail, :nom, :prenom, :password)";
    $stmt->bindParam(':', $email);
    $stmt->bindParam('mdp:', $password);

}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Carteo.css/login.css">
    <link rel="stylesheet" href="Carteo.css/header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Inscription</title>
</head>
<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    <main>
        <section>
            <img src="assets/CarteO-27-01-2025.png" alt="logo carteo">
        </section>
        <h1>Inscription</h1>
        <section class="formsection">
            <form action="" method="post">
               
                <label for="">Email</label>
                <input type="email" name="email" id="email" required>
              
                <label for="">Mot de passe</label>
                <input type="password" name="password" id="password" required>
              
                <div id = "buttonbox">
                    <button type="submit" name="submitbutton">S'inscrire</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>