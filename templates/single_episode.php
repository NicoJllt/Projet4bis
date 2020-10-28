<?php

use App\src\DAO\EpisodeDAO;
use App\src\DAO\MessageDAO;
use App\src\DAO\UserDAO;
?>

<!DOCTYPE html>
<!-- PAGE EPISODE -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="../public/CSS/frontend.css" />
    <link rel="stylesheet" href="../public/CSS/backend.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<?php $this->title = "L'épisode"; ?>

<body>
    <div class="blocpage">

        <?php include("template_header.php") ?>

        <?php if ($this->session->get('flashMessage')) { ?>
            <div class="flash-messages">
                <p><?= $this->session->show('add_message'); ?></p>
                <p><?= $this->session->show('delete_message'); ?></p>
                <p><?= $this->session->show('flag_comment'); ?></p>
            </div>
        <?php } ?>

        <section class="row">
            <div class="col-lg-12">
                <section id="episode-page-bloc">
                    <article id="title-content-episode">
                        <h1 class="episode-title"><?= htmlspecialchars($episode->getTitle()) ?></h1>
                        <div class="episode-content"><?= htmlspecialchars($episode->getContent()) ?></div>
                    </article>

                    <?php if ($this->session->get('role') === 'admin') { ?>
                        <div id="edit-delete-episode">
                            <a href="../public/index.php?route=editEpisode&episodeId=<?= $episode->getEpisodeId() ?>">Modifier</a>
                            <a href="../public/index.php?route=deleteEpisode&episodeId=<?= $episode->getEpisodeId(); ?>">Supprimer</a>
                        </div>
                    <?php } ?>
                </section>
            </div>
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
                    <p id="connect-to-interact">Vous devez vous connecter afin de pouvoir interagir.</p>
                <?php
                }
                ?>
            </div>

            <?php if (!empty($messages)) { ?>
                <h3>Commentaires</h3>
                <?php
                foreach ($messages as $message) {
                ?>
                    <div id="show-comments">
                        <div class="comment-div">
                            <div class="comment-username"><?= htmlspecialchars($message->getUsername()) ?></div>
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
                                    <p id="flagged-comment">Ce commentaire a déjà été signalé</p>
                                <?php
                                } else if (($message->isFlag() === false) || ($this->session->get('username') !== htmlspecialchars($message->getUsername()))) {
                                ?>
                                    <p><a href="../public/index.php?route=flagComment&messageId=<?= $message->getMessageId(); ?>" id="flag-comment-icon" title="Signaler le commentaire"><i class="far fa-flag"></i></a></p>
                                <?php
                                }
                                ?>
                                <?php
                                if ($this->session->get('username') === htmlspecialchars($message->getUsername())) {
                                ?>
                                    <p><a href="../public/index.php?route=editMessage&messageId=<?= $message->getMessageId(); ?>&episodeId=<?= $episode->getEpisodeId(); ?>" id="edit-comment-icon" title="Modifier le commentaire"><i class="far fa-edit"></i></a></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (($this->session->get('role') === 'admin') || ($this->session->get('username') === htmlspecialchars($message->getUsername()))) {
                                ?>
                                    <p><a href="../public/index.php?route=deleteMessage&messageId=<?= $message->getMessageId(); ?>" id="delete-comment-icon" title="Supprimer le commentaire"><i class="fas fa-ban"></i></a></p>
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
            <?php } else { ?>
                <h3>Aucun commentaire</h3>
            <?php } ?>
        </section>
    </div>

    <script src="../public/js/timeOutFlashMessage.js"></script>

</body>

</html>