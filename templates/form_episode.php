<?php
$route = isset($episode) && $episode->getEpisodeId() ? 'editEpisode&episodeId='.$episode->getEpisodeId() : 'addEpisode';
$submit = $route === 'addEpisode' ? 'Envoyer' : 'Mettre à jour';
$title = isset($episode) && $episode->getTitle() ? htmlspecialchars($episode->getTitle()) : '';
$content = isset($episode) && $episode->getContent() ? htmlspecialchars($episode->getContent()) : '';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= $title; ?>"><br>
    <label for="content">Contenu</label><br>
    <textarea id="content" name="content"><?= $content; ?></textarea><br>
    <input type="submit" value="Envoyer" id="submit" name="submit">
</form>