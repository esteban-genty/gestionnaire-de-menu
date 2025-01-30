<header>
    <nav>
        <ul class="nav-left">
            <li><a href="moncompte.html"><h5>Carteo</h5></a></li>
        </ul>
        <ul class="nav-right">
            <?php if(isset($_SESSION['utilisateur'])): ?>
                <li><a href="moncompte.html">Bonjour, ID : <?php echo $_SESSION['utilisateur']['utilisateur_id']; ?></a></li>
            <?php else: ?>
                <li><a href="connexion.html">Se connecter</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>