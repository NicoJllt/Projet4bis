<?php $this->title = "Connexion"; ?>
<?php include("template_header.php") ?>

<?= $this->session->show('error_login'); ?>
<div>
    <form method="post" action="../public/index.php?route=login">
        <label for="username">Pseudo ou adresse mail</label><br>
        <input type="text" id="pseudo" name="username" value="<?= isset($post) ? htmlspecialchars($post->get('username')) : ''; ?>"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Connexion" id="submit" name="submit">
    </form>
</div>