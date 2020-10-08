<?php

use App\src\DAO\EpisodeDAO;

?>

<!DOCTYPE html>
<!-- PAGE D'ACCUEIL -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="../public/CSS/frontend.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php $this->title = "Billet simple pour l'Alaska"; ?>

<body>
    <div class="blocpage">

        <?php include("template_header.php") ?>

        <?= $this->session->show('add_episode') ?>
        <?= $this->session->show('edit_episode') ?>
        <?= $this->session->show('delete_episode'); ?>
        <?= $this->session->show('add_message'); ?>
        <?= $this->session->show('flag_comment'); ?>
        <?= $this->session->show('delete_message'); ?>
        <?= $this->session->show('register'); ?>
        <?= $this->session->show('login'); ?>
        <?= $this->session->show('logout'); ?>
        <?= $this->session->show('delete_account'); ?>

        <section class="episode-preview-bloc">
            <section class="row">
                <?php
                foreach ($episodes as $episode) {
                ?>
                    <div class="col-md-6">
                        <a href="../public/index.php?route=episode&episodeId=<?= htmlspecialchars($episode->getEpisodeId()) ?>">
                            <article class="episode-preview">
                                <div class="episode-preview-marge">
                                    <h1 class="episode-title-preview"><?= htmlspecialchars($episode->getTitle()) ?></h1>
                                    <p class="episode-content-preview"><?= htmlspecialchars(substr($episode->getContent(), 0, 250)) . '...' ?></p>
                                    <p>Créé le : <?= htmlspecialchars($episode->getDateEpisode()); ?></p>
                                </div>
                            </article>
                        </a>
                    </div>
                <?php
                }
                ?>
            </section>
        </section>
    </div>
</body>

</html>