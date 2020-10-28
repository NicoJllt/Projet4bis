<?php
$route = (isset($post) && $post->get('messageId')) ? 'editMessage&messageId=' . $post->get('messageId') : 'addEpisode';
$submit = $route === 'addMessage' ? 'Valider' : 'Mettre à jour';
?>

<form method="post" id="comment-form" action="../public/index.php?route=<?= $route; ?>&episodeId=<?= htmlspecialchars($episode->getEpisodeId()); ?>">
    <?= isset($post) ? htmlspecialchars($post->get('username')) : ''; ?><br>
    <div class="constraint-error">
        <?= isset($errors['username']) ? $errors['username'] : ''; ?>
    </div>
    <textarea id="comment-content-form" name="content" rows="3"><?= isset($post) ? htmlspecialchars($post->get('content')) : ''; ?></textarea><br>
    <div class="constraint-error">
        <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    </div>
    <input type="submit" value="<?= $submit; ?>" id="comment-submit-form" name="submit">
</form>