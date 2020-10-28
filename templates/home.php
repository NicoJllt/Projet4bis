<?php

use App\src\DAO\EpisodeDAO;

?>

<?php $this->title = "Billet simple pour l'Alaska"; ?>

<div class="blocpage">

    <?php include("template_header.php") ?>

    <?php if ($this->session->get('flashMessage')) { ?>
        <div class="flash-messages">
            <p><?= $this->session->show('add_episode') ?></p>
            <p><?= $this->session->show('edit_episode') ?></p>
            <p><?= $this->session->show('delete_episode'); ?></p>
            <p><?= $this->session->show('edit_message') ?></p>
            <p><?= $this->session->show('register'); ?></p>
            <p><?= $this->session->show('login'); ?></p>
            <p><?= $this->session->show('logout'); ?></p>
            <p><?= $this->session->show('delete_account'); ?></p>
        </div>
    <?php } ?>

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
                                <p class="episode-content-preview"><?= htmlspecialchars(substr($episode->getContent(), 0, 500)) . '...' ?></p>
                                <p class="date-episode-preview">Créé le : <?= htmlspecialchars($episode->getDateEpisode()); ?></p>
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

<script src="../public/js/timeOutFlashMessage.js"></script>