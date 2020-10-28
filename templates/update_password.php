<?php $this->title = 'Modifier le mot de passe'; ?>

<div class="blocpage">
    <?php include("template_header.php") ?>

    <div id="update-password-bloc">
        <div class="constraint-error">
            <?= $this->session->show('update_password_failed'); ?><br>
        </div>
        <p>Le mot de passe de <?= $this->session->get('username'); ?> sera modifié.</p>
        <form method="post" action="../public/index.php?route=updatePassword">
            <label for="password">Nouveau mot de passe</label><br>
            <input type="password" id="password-input" name="password"><br>
            <input type="submit" value="Mettre à jour" id="password-submit-form" name="submit">
        </form>
    </div>
</div>