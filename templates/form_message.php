<?php
$route = isset($post) && $post->get('messageId') ? 'editMessage' : 'addMessage';
$submit = $route === 'addMessage' ? 'Ajouter' : 'Mettre à jour';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>&episodeId=<?= htmlspecialchars($episode->getEpisodeId()); ?>">
    <label for="username">Pseudo</label><br>
    <input type="text" id="pseudo" name="username" value="<?= isset($post) ? htmlspecialchars($post->get('username')): ''; ?>"><br>
    <?= isset($errors['username']) ? $errors['username'] : ''; ?>
    <label for="content">Message</label><br>
    <textarea id="content" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>