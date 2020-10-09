<?php
$route = (isset($post) && $post->get('episodeId')) ? 'editEpisode&episodeId=' . $post->get('episodeId') : 'addEpisode';
$submit = ($route === 'addEpisode') ? 'Enregistrer' : 'Mettre à jour';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>" id="form-episode">
    <h1>Ajout d'un chapitre</h1>
    <label for="title">Titre</label><br>
    <input type="text" id="title-episode-form" name="title" value="<?= isset($post) ? htmlspecialchars(($post->get('title'))) : '' ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : '' ?>
    <label for="content">Contenu</label><br>
    <textarea id="content-episode-form" name="content"><?= isset($post) ? htmlspecialchars(($post->get('content'))) : '' ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : '' ?>
    <input type="submit" value="<?= $submit; ?>" id="submit-form-episode" name="submit">
</form>