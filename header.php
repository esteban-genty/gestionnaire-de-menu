<header>
    <nav>
        <ul class="nav-left">
            <li><a href="accueil.php" class="carteo"><h5>Carteo</h5></a></li>
        </ul>
        <ul class="nav-right">
            <?php if(isset($_SESSION['utilisateur'])): ?>
                <li><a href="moncompte.html">Bonjour, ID : <?php echo $_SESSION['utilisateur']['utilisateur_id']; ?></a></li>
            <?php else: ?>
                <a href="login.php"><button type="button" class="btn-connexion">Se Connecter</button></a>
                <a href="inscription.php"><button type="button" class="btn-inscription">S'inscrire</button></a>
            <?php endif; ?>
        </ul>
    </nav>
</header>