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

        <section id="comment-bloc">
            <!-- <a href="home.php?action=showMessages&id=idMessage">
                            <button id="show-comments-button">Afficher les commentaires</button>
                        </a> -->
            <div id="add-comment">
                <h3>Ajouter un commentaire</h3>
                <?php
                if ($this->session->get('username')) {
                    include('form_message.php');
                } else {
                ?>
                    <p>Vous devez vous connecter afin de pouvoir interagir.</p>
                <?php
                }
                ?>
            </div>

            <h3>Commentaires</h3>
            <?php
            foreach ($messages as $message) {
            ?>
                <div id="show-comments">
                    <div class="comment-div">
                        <div class="comment-username">Rédigé par : <?= htmlspecialchars($message->getUsername()) ?></div>
                        <div class="comment-date">Le : <?= htmlspecialchars($message->getDateMessage()) ?></div>
                        <p class="comment-content"><?= htmlspecialchars($message->getContent()) ?></p>
                    </div>

                    <?php
                    if ($this->session->get('username')) {
                    ?>

                        <div class="comment-options">
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
                            <?php
                            if ($this->session->get('username') === htmlspecialchars($message->getUsername())) {
                            ?>
                                <p><a href="../public/index.php?route=editMessage&messageId=<?= $message->getMessageId(); ?>&episodeId=<?= $episode->getEpisodeId(); ?>">Modifier le commentaire</a></p>
                            <?php
                            }
                            ?>
                            <?php
                            if (($this->session->get('role') === 'admin') || ($this->session->get('username') === htmlspecialchars($message->getUsername()))) {
                            ?>
                                <p><a href="../public/index.php?route=deleteMessage&messageId=<?= $message->getMessageId(); ?>">Supprimer le commentaire</a></p>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>
        </section>
    </div>
</body>

</html>