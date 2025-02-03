<?php
    // Information pour se connecter
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'carteo';

    // Connexion base de donnés avec PDO
    $bddPDO = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // echo "<p><strong>Connexion réussie</strong></p>";

    // Esrreurs
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>