<!DOCTYPE html>
<!-- PAGE D'ACCUEIL -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="../public/CSS/frontend.css" />
    <link rel="stylesheet" href="../public/CSS/backend.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php $this->title = 'Administration'; ?>

<body>
    <div class="blocpage">

        <?php include("template_header.php") ?>

        <?php if ($this->session->get('flashMessage')) { ?>
            <div class="flash-messages">
                <?= $this->session->show('add_episode'); ?>
                <?= $this->session->show('edit_episode'); ?>
                <?= $this->session->show('delete_episode'); ?>
                <?= $this->session->show('unflag_comment'); ?>
                <?= $this->session->show('delete_message'); ?>
                <?= $this->session->show('delete_user'); ?>
            </div>
        <?php } ?>

        <section id="bloc-admin">

            <h1>PAGE ADMINISTRATION</h1>
            <h2>Chapitres</h2>
            <div id="add-episode-button">
                <a href="../public/index.php?route=addEpisode">Ajouter un nouveau chapitre</a>
            </div>
            <table id="chapter-table-admin">
                <tr>
                    <td>Id</td>
                    <td>Titre</td>
                    <td>Contenu</td>
                    <td>Date</td>
                    <td>Actions</td>
                </tr>
                <?php
                foreach ($episodes as $episode) {
                ?>
                    <tr>
                        <td><?= htmlspecialchars($episode->getEpisodeId()); ?></td>
                        <td><a href="../public/index.php?route=episode&episodeId=<?= htmlspecialchars($episode->getEpisodeId()); ?>" id="title-table-admin"><?= substr(htmlspecialchars($episode->getTitle()), 0, 50); ?></a></td>
                        <td><?= substr(htmlspecialchars($episode->getContent()), 0, 50); ?></td>
                        <td>Créé le : <?= htmlspecialchars($episode->getDateEpisode()); ?></td>
                        <td>
                            <a href="../public/index.php?route=editEpisode&episodeId=<?= $episode->getEpisodeId(); ?>">Modifier</a>
                            <a href="../public/index.php?route=deleteEpisode&episodeId=<?= $episode->getEpisodeId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>

            <h2>Commentaires signalés</h2>
            <table id="flag-table-admin">
                <tr>
                    <td>Id</td>
                    <td>Pseudo</td>
                    <td>Message</td>
                    <td>Date</td>
                    <td>Actions</td>
                </tr>
                <?php
                foreach ($messages as $message) {
                ?>
                    <tr>
                        <td><?= htmlspecialchars($message->getMessageId()); ?></td>
                        <td><?= htmlspecialchars($message->getUsername()); ?></td>
                        <td><?= substr(htmlspecialchars($message->getContent()), 0, 150); ?></td>
                        <td>Créé le : <?= htmlspecialchars($message->getDateMessage()); ?></td>
                        <td>
                            <a href="../public/index.php?route=unflagComment&messageId=<?= $message->getMessageId(); ?>">Désignaler le commentaire</a>
                            <a href="../public/index.php?route=deleteMessage&messageId=<?= $message->getMessageId(); ?>">Supprimer le commentaire</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>

            <h2>Utilisateurs</h2>
            <table id="user-table-admin">
                <tr>
                    <td>Id</td>
                    <td>Pseudo</td>
                    <td>Date</td>
                    <td>Rôle</td>
                    <td>Actions</td>
                </tr>
                <?php
                foreach ($users as $user) {
                ?>
                    <tr>
                        <td><?= htmlspecialchars($user->getUserId()); ?></td>
                        <td><?= htmlspecialchars($user->getUsername()); ?></td>
                        <td>Créé le : <?= htmlspecialchars($user->getRegistrationDate()); ?></td>
                        <td><?= htmlspecialchars($user->getIdRole()); ?></td>
                        <td>
                            <?php
                            if ($user->getIdRole() != 'admin') {
                            ?>
                                <a href="../public/index.php?route=deleteUser&userId=<?= $user->getUserId(); ?>">Supprimer</a>
                            <?php } else {
                            ?>
                                Suppression impossible
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </section>
    </div>

    <script src="../public/js/timeOutFlashMessage.js"></script>

</body>

</html>