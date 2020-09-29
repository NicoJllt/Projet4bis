<?php $this->title = "Inscription"; ?>
<?php include("template_header.php") ?>
<div>
    <form method="post" action="../public/index.php?route=register">
        <label for="username">Pseudo</label><br>
        <input type="text" id="pseudo" name="username" value="<?= isset($post) ? htmlspecialchars($post->get('username')) : ''; ?>"><br>
        <label for="mail">Adresse Mail</label><br>
        <input type="text" id="mail" name="mail" value="<?= isset($post) ? htmlspecialchars($post->get('mail')) : ''; ?>"><br>
        <?= isset($errors['username']) ? $errors['username'] : ''; ?>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        <input type="submit" value="Inscription" id="submit" name="submit">
    </form>
</div>