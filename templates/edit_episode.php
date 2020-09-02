<?php $this->title = "Modifier l'article"; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<div>
    <form method="post" action="../public/index.php?route=editEpisode&episodeId=<?= htmlspecialchars($episode->getEpisodeId()); ?>">
        <label for="title">Titre</label><br>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($episode->getTitle()); ?>"><br>
        <label for="content">Contenu</label><br>
        <textarea id="content" name="content"><?= htmlspecialchars($episode->getContent()); ?></textarea><br>

        <input type="submit" value="Mettre à jour" id="submit" name="submit">
    </form>
    <a href="../public/index.php">Retour à l'accueil</a>
</div>