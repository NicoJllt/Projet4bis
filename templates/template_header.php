<section class="row">
    <div class="col-lg-12">
        <div class="topnav" id="myTopnav">
            <!-- <a href="../public/index.php" class="home-nav-small"><i class="fas fa-home"></i></a> -->
            <a href="../public/index.php" class="home-nav" class="active">Accueil</a>
            <a href="../public/index.php?route=synopsis" class="synopsis-nav">Synopsis</a>
            <a href="../public/index.php?route=lastEpisodes" class="last-episodes-nav">Derniers chapitres</a>
            <div class="topnav-bis">
                <?php
                if ($this->session->get('username')) {
                ?>
                    <a href="../public/index.php?route=profile" class="profil-nav">Profil</a>
                    <?php if ($this->session->get('role') === 'admin') { ?>
                        <a href="../public/index.php?route=administration" class="admin-nav">Administration</a>
                        <a href="../public/index.php?route=addEpisode" class="add-episode-nav">Ajouter un nouveau chapitre</a>
                    <?php } ?>
                    <a href="../public/index.php?route=logout" class="logout-nav">Déconnexion</a>
                <?php
                } else {
                ?>
                    <a href="../public/index.php?route=register" class="register-nav">Inscription</a>
                    <a href="../public/index.php?route=login" class="connection-nav">Connexion</a>
                <?php
                }
                ?>
            </div>

            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </div>
</section>

<section>
    <div class="title-framed">
        <h1 class="book-title">Billet simple pour l'Alaska</h1>
        <h2 class="book-author">Par Jean Forteroche</h2>
    </div>
</section>