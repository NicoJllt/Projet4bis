<?php
$route = (isset($post) && $post->get('episodeId')) ? 'editEpisode&episodeId=' . $post->get('episodeId') : 'addEpisode';
$submit = ($route === 'addEpisode') ? 'Envoyer' : 'Mettre à jour';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>">
    <label for="title">Titre</label><br>
    <input type="text" id="title" name="title" value="<?= isset($post) ? htmlspecialchars(($post->get('title'))) : '' ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : '' ?>
    <label for="content">Contenu</label><br>
    <textarea id="content" name="content"><?= isset($post) ? htmlspecialchars(($post->get('content'))) : '' ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : '' ?>
    <input type="submit" value="Envoyer" id="submit" name="submit">
</form>