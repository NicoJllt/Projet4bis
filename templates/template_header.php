<section class="row">
    <div class="col-lg-12">
        <nav class="summary">
            <ul>
                <li><a href="index.php?action=synopsis" class="synopsis-nav">Synopsis</a></li>
                <li><a href="../public/index.php" class="home-nav">Accueil</a></li>
                <li><a href="index.php?action=showLastNews" class="last-episodes-nav">Derniers épisodes</a></li>
                <li><input type="search" class="site-search-nav" name="q" aria-label="Search"></li>

                <?php
                if ($this->session->get('username')) {
                ?>
                    <li><a href="../public/index.php?route=logout" class="logout-nav">Déconnexion</a></li>
                    <li><a href="../public/index.php?route=profile">Profil</a></li>
                    <?php if ($this->session->get('role') === 'admin') { ?>
                        <li><a href="../public/index.php?route=administration">Administration</a></li>
                    <?php } ?>
                    <li><a href="../public/index.php?route=addEpisode">Ajouter un nouveau chapitre</a></li>
                <?php
                } else {
                ?>
                    <li><a href="../public/index.php?route=register" class="register-nav">Inscription</a></li>
                    <li><a href="../public/index.php?route=login" class="connection-nav">Connexion</a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </div>
</section>

<section class="row">
    <div class="col-lg-12">
        <div class="title-framed">
            <h1 class="book-title">Billet simple pour l'Alaska</h1>
            <h2 class="book-author">Par Jean Forteroche</h2>
        </div>
    </div>
</section>