<?php
$route = isset($post) && $post->get('messageId') ? 'editMessage' : 'addMessage';
$submit = $route === 'addMessage' ? 'Valider' : 'Mettre à jour';
?>

<form method="post"  id="comment-form" action="../public/index.php?route=<?= $route; ?>&episodeId=<?= htmlspecialchars($episode->getEpisodeId()); ?>">
    <?= isset($post) ? htmlspecialchars($post->get('username')) : ''; ?><br>
    <?= isset($errors['username']) ? $errors['username'] : ''; ?>
    <textarea id="comment-content-form" name="content" rows="3"><?= isset($post) ? htmlspecialchars($post->get('content')) : ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="comment-submit-form" name="submit">
</form>