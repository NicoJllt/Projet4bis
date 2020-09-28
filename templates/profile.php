<?php $this->title = 'Mon profil'; ?>
<?php include("template_header.php") ?>
<?= $this->session->show('update_password'); ?>
<div>
    <h2><?= $this->session->get('username'); ?></h2>
    <p><?= $this->session->get('userId'); ?></p>
    <a href="../public/index.php?route=updatePassword">Modifier mon mot de passe</a>
    <a href="../public/index.php?route=deleteAccount">Supprimer mon compte</a>
</div>