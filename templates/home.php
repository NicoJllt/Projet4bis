<?php

use App\src\DAO\EpisodeDAO;

?>

<!DOCTYPE html>
<!-- PAGE D'ACCUEIL -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Les derniers épisodes</title>
    <link rel="stylesheet" href="../../CSS/frontend/frontend.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="blocpage">

        <?php include("template_header.php") ?>

        <?php $this->title = "Accueil"; ?>

        <?= $this->session->show('add_episode') ?>
        <?= $this->session->show('edit_episode') ?>
        <?= $this->session->show('delete_episode'); ?>
        <?= $this->session->show('add_message'); ?>
        <?= $this->session->show('flag_comment'); ?>
        <?= $this->session->show('delete_message'); ?>

        <a href="../public/index.php?route=addEpisode">Ajouter un nouveau chapitre</a>

        <section class="news-preview-bloc">
            <section class="row">
                <?php

                foreach ($episodes as $episode) {
                ?>
                    <div class="col-md-6">
                        <a href="../public/index.php?route=episode&episodeId=<?= htmlspecialchars($episode->getEpisodeId()) ?>">
                            <article class="news-preview">
                                <div class="news-preview-marge">
                                    <h1 class="news-title-preview"><?= htmlspecialchars($episode->getTitle()) ?></h1>
                                    <p class="news-content-preview"><?= htmlspecialchars(substr($episode->getContent(), 0, 250)) . '...' ?></p>
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