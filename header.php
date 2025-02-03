<header>
    <nav>
        <ul class="nav-left">
            <!-- Redirection vers accueil.php dans le répertoire gestionnaire-de-menu -->
            <li><a href="/gestionnaire-de-menu/index.php" class="carteo"><h5>Carteo</h5></a></li>
        </ul>
        <ul class="nav-right">
            <?php if (isset($_SESSION['utilisateur'])): ?>
                <li><a href="/gestionnaire-de-menu/dashboard.php">Bonjour, <?php echo $_SESSION['utilisateur']['prenom']; ?></a></li>
            <?php else: ?>
                <a href="/gestionnaire-de-menu/login.php"><button type="button" class="btn-connexion">Se Connecter</button></a>
                <a href="/gestionnaire-de-menu/inscription.php"><button type="button" class="btn-inscription">S'inscrire</button></a>
            <?php endif; ?>
        </ul>
    </nav>
</header>
