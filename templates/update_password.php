<?php $this->title = 'Modifier mot mot de passe'; ?>
<?php include("template_header.php") ?>
<div>
    <p>Le mot de passe de <?= $this->session->get('username'); ?> sera modifié.</p>
    <form method="post" action="../public/index.php?route=updatePassword">
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Mettre à jour" id="submit" name="submit">
    </form>
</div>