<header>
    <section class="row">
        <div class="col-lg-12">
            <nav class="summary">
                <ul>
                    <li><a href="../public/index.php?route=synopsis" class="synopsis-nav">Synopsis</a></li>
                    <li><a href="../public/index.php" class="home-nav">Accueil</a></li>
                    <li><a href="../public/index.php?route=lastEpisodes" class="last-episodes-nav">Derniers chapitres</a></li>
                    <li><input type="search" class="site-search-nav" name="q" aria-label="Search"></li>

                    <?php
                    if ($this->session->get('username')) {
                    ?>
                        <li><a href="../public/index.php?route=profile" class="profil-nav">Profil</a></li>
                        <?php if ($this->session->get('role') === 'admin') { ?>
                            <li><a href="../public/index.php?route=administration" class="admin-nav">Administration</a></li>
                            <li><a href="../public/index.php?route=addEpisode" class="add-episode-nav">Ajouter un nouveau chapitre</a></li>
                        <?php } ?>
                        <li><a href="../public/index.php?route=logout" class="logout-nav">Déconnexion</a></li>
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
</header>

<section class="row">
    <div class="col-lg-12">
        <div class="title-framed">
            <h1 class="book-title">Billet simple pour l'Alaska</h1>
            <h2 class="book-author">Par Jean Forteroche</h2>
        </div>
    </div>
</section>