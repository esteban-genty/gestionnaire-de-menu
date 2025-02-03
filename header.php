<header>
    <nav>
        <ul class="nav-left">
            <li><a href="moncompte.html" class="carteo"><h5>Carteo</h5></a></li>
        </ul>
        <ul class="nav-right">
            <?php if(isset($_SESSION['utilisateur'])): ?>
                <li><a href="moncompte.html">Bonjour, ID : <?php echo $_SESSION['utilisateur']['prenom']; ?></a></li>
            <?php else: ?>
                <a href="/gestionnaire-de-menu/login.php"><button type="button" class="btn-connexion">Se Connecter</button></a>
                <a href="/gestionnaire-de-menu/signup.php"><button type="button" class="btn-inscription">S'inscrire</button></a>
            <?php endif; ?>
        </ul>
    </nav>
</header>