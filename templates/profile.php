<!-- VALIDATION OK -->

<?php $this->title = 'Mon profil'; ?>

<?php if ($this->session->get('flashMessage')) { ?>
    <div class="flash-messages">
        <?= $this->session->show('update_password'); ?>
        <?= $this->session->show('no_delete_account'); ?>
    </div>
<?php } ?>

<div class="blocpage">
    <?php include("template_header.php") ?>
    <div id="profile-section">
        <h2>Bonjour <?= $this->session->get('username'); ?></h2>
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