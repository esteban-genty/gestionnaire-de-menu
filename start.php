<?php
    // Information pour se connecter
    $host = 'localhost:3306';
    $username = 'carteo';
    $password = 'nM85&q0i4';
    $dbname = 'antoine-leca_carteo';

    // Connexion base de donnés avec PDO
    $bddPDO = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // echo "<p><strong>Connexion réussie</strong></p>";

    // Esrreurs
    $bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>