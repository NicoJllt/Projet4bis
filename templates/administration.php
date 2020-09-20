<?php $this->title = 'Administration'; ?>

<h1>Mon blog</h1>
<p>En construction</p>
<?= $this->session->show('add_episode'); ?>
<?= $this->session->show('edit_episode'); ?>
<?= $this->session->show('delete_episode'); ?>
<?= $this->session->show('unflag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('delete_user'); ?>

<h2>Chapitres</h2>
<a href="../public/index.php?route=addEpisode">Ajouter un nouveau chapitre</a>
<table>
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
            <td><a href="../public/index.php?route=episode&episodeId=<?= htmlspecialchars($episode->getEpisodeId()); ?>"><?= substr(htmlspecialchars($episode->getTitle()), 0, 100); ?></a></td>
            <td><?= htmlspecialchars($episode->getContent()); ?></td>
            <td>Créé le : <?= htmlspecialchars($episode->getdateMessage()); ?></td>
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
<table>
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
            <td><?= substr(htmlspecialchars($message->getUsername()), 0, 50); ?></td>
            <td><?= substr(htmlspecialchars($message->getContent()), 0, 150); ?></td>
            <td>Créé le : <?= htmlspecialchars($message->getDateMessage()); ?></td>
            <td>En construction</td>
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
<table>
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
            <td>Créé le : <?= htmlspecialchars($user->getDateRegistration()); ?></td>
            <td><?= htmlspecialchars($user->getRole()); ?></td>
            <td>
                <?php
                if ($user->getRole() != 'admin') {
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