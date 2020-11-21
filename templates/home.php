<!-- VALIDATION OK -->

<?php $this->title = "Billet simple pour l'Alaska"; ?>

<?php if ($this->request->getGet()->get('route') === 'lastEpisodes') {
    $pendingNav = 'lastEpisodes';
} else {
    $pendingNav = 'home';
} ?>

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

    <footer>
        <div id="paging">
            <?php if ($pagination) { ?>
                <nav>
                    <ul>
                        <?php if ($page > 1) { ?>
                            <li>
                                <a href="../public/index.php?page=1&limit=<?= $limit ?>">
                                    Première page
                                </a>
                            </li>
                            <li>
                                <a href="../public/index.php?page=<?= ($page - 1) ?>&limit=<?= $limit ?>">
                                    Page précédente
                                </a>
                            </li>
                        <?php } ?>
                        <?php foreach ($range as $i) { ?>
                            <li>
                                <a href="../public/index.php?page=<?= $i ?>&limit=<?= $limit ?>">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($page < $pages) { ?>
                            <li>
                                <a href="../public/index.php?page=<?= ($page + 1) ?>&limit=<?= $limit ?>">
                                    Page suivante
                                </a>
                            </li>
                            <li>
                                <a href="../public/index.php?page=<?= $pages ?>&limit=<?= $limit ?>">
                                    Dernière page
                                </a>
                            </li>
                        <?php } ?>
                        <li>
                    </ul>
                </nav>
            <?php } ?>
        </div>
    </footer>

</div>