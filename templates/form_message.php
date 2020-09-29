
<?php
$route = isset($post) && $post->get('messageId') ? 'editMessage' : 'addMessage';
$submit = $route === 'addMessage' ? 'Ajouter' : 'Mettre à jour';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>&episodeId=<?= htmlspecialchars($episode->getEpisodeId()); ?>">
    <label for="idAuthor"><?= isset($post) ? htmlspecialchars($post->get('idAuthor')) : ''; ?></label><br>
    <?= isset($errors['idAuthor']) ? $errors['idAuthor'] : ''; ?>
    <label for="content">Message</label><br>
    <textarea id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')) : ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>