<?php

use App\src\DAO\EpisodeDAO;
use App\src\DAO\MessageDAO;
use App\src\DAO\UserDAO;
?>

<?php $this->title = "L'épisode"; ?>

<div class="blocpage">

    <?php include("template_header.php") ?>

    <?php if ($this->session->get('flashMessage')) { ?>
        <div class="flash-messages">
            <p><?= $this->session->show('add_message'); ?></p>
            <p><?= $this->session->show('delete_message'); ?></p>
            <p><?= $this->session->show('flag_comment'); ?></p>
        </div>
    <?php } ?>


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


    <section id="comment-bloc">
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