<!DOCTYPE html>
<!-- PAGE EPISODE -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="../public/CSS/frontend.css" />
    <link rel="stylesheet" href="../public/CSS/backend.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php $this->title = 'Mon profil'; ?>

<?php if ($this->session->get('flashMessage')) { ?>
    <div class="flash-messages">
        <?= $this->session->show('update_password'); ?>
    </div>
<?php } ?>

<body>
    <div class="blocpage">
        <?php include("template_header.php") ?>
        <div id="profile-section">
            <h2>Bonjour <?= $this->session->get('username'); ?>,</h2>
            <p><?= $this->session->get('userId'); ?></p>
            <div id="link-profile-bloc">
                <a href="../public/index.php?route=updatePassword" id="edit-password">Modifier mon mot de passe</a>
                <?php
                if (!($this->session->get('role') === 'admin')) {
                ?>
                    <a href="../public/index.php?route=deleteAccount" id="delete-account">Supprimer mon compte</a>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>