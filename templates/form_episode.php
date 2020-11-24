<!-- VALIDATION OK -->

<?php
$route = (isset($post) && $post->get('episodeId')) ? 'editEpisode&episodeId=' . $post->get('episodeId') : 'addEpisode';
$submit = ($route === 'addEpisode') ? 'Enregistrer' : 'Mettre à jour';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>" id="form-episode">
    <?php if ($route === 'addEpisode') { ?>
        <h1>Ajout d'un chapitre</h1>
    <?php } else { ?>
        <h1>Modifier le chapitre</h1>
    <?php } ?>
    <label for="title-episode-form">Titre</label><br>
    <input type="text" id="title-episode-form" name="title" value="<?= isset($post) ? htmlspecialchars(($post->get('title'))) : '' ?>"><br>
    <div class="constraint-error">
        <?= isset($errors['title']) ? $errors['title'] : '' ?>
    </div>
    <label for="content-episode-form">Contenu</label><br>
    <textarea id="content-episode-form" name="content"><?= isset($post) ? htmlspecialchars(($post->get('content'))) : '' ?></textarea><br>
    <div class="constraint-error">
        <?= isset($errors['content']) ? $errors['content'] : '' ?>
    </div>
    <input type="submit" value="<?= $submit; ?>" id="submit-form-episode" name="submit">
</form>