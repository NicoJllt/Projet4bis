<?php $this->title = 'Administration'; ?>

<h1>Mon blog</h1>
<p>En construction</p>
<?= $this->session->show('add_episode'); ?>
<?= $this->session->show('edit_episode'); ?>
<?= $this->session->show('delete_episode'); ?>
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

<h2>Utilisateurs</h2>