<?php $this->title = "Connexion"; ?>

<div class="blocpage">
    <?php include("template_header.php") ?>

    <form method="post" action="../public/index.php?route=login" id="login-section">
        <div class="constraint-error">
            <?= $this->session->show('error_login'); ?><br>
        </div>
        <label for="username">Pseudo</label><br>
        <input type="text" id="pseudo" name="username" value="<?= isset($post) ? htmlspecialchars($post->get('username')) : ''; ?>"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Connexion" class="submit-form" name="submit">
    </form>
</div>