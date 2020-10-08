<?php

use App\src\DAO\EpisodeDAO;
use App\src\DAO\MessageDAO;
use App\src\DAO\UserDAO;

$this->title = 'Episode';
?>

<!DOCTYPE html>
<!-- PAGE EPISODE -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="../public/CSS/frontend.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php $this->title = "L'épisode"; ?>

<body>
    <div class="blocpage">

        <?php include("template_header.php") ?>

        <section class="row">
            <div class="col-lg-12">
                <article id="episode-page-bloc">
                    <h1 class="episode-title"><?= htmlspecialchars($episode->getTitle()) ?></h1>
                    <div class="episode-content"><?= htmlspecialchars($episode->getContent()) ?></div>
                </article>
            </div>

            <?php if ($this->session->get('role') === 'admin') { ?>
                <div id="edit-delete-episode">
                    <a href="../public/index.php?route=editEpisode&episodeId=<?= $episode->getEpisodeId() ?>">Modifier</a>
                    <a href="../public/index.php?route=deleteEpisode&episodeId=<?= $episode->getEpisodeId(); ?>">Supprimer</a>
                </div>
            <?php } ?>

        </section>

        <section class="row">
            <div class="col-lg-12">
                <div id="comment-bloc">
                    <!-- <a href="home.php?action=showMessages&id=idMessage">
                            <button id="show-comments-button">Afficher les commentaires</button>
                        </a> -->

                    <h3>Ajouter un commentaire</h3>
                    <?php
                    if ($this->session->get('username')) {
                        include('form_message.php');
                    } else {
                    ?>
                        <p>Vous devez vous connecter afin de pouvoir ajouter un commentaire.</p>
                    <?php
                    }
                    ?>

                    <h3>Commentaires</h3>

                    <?php
                    foreach ($messages as $message) {
                    ?>
                        <div class="all-comments">
                            <div class="message-user-name">Rédigé par : <?= htmlspecialchars($message->getUsername()) ?></div>
                            <div class="message-date">Le : <?= htmlspecialchars($message->getDateMessage()) ?></div>
                            <p class="message-content"><?= htmlspecialchars($message->getContent()) ?></p>
                            <?php
                            if ($message->isFlag()) {
                            ?>
                                <p>Ce commentaire a déjà été signalé.</p>
                            <?php
                            } else {
                            ?>
                                <p><a href="../public/index.php?route=flagComment&messageId=<?= $message->getMessageId(); ?>">Signaler le commentaire</a></p>
                            <?php
                            }
                            ?>
                            <p><a href="../public/index.php?route=editMessage&messageId=<?= $message->getMessageId(); ?>&episodeId=<?= $episode->getEpisodeId(); ?>">Modifier le commentaire</a></p>
                            <p><a href="../public/index.php?route=deleteMessage&messageId=<?= $message->getMessageId(); ?>">Supprimer le commentaire</a></p>
                        </div>
                        </br>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

    </div>
</body>

</html>