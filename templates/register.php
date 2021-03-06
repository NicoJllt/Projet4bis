<!-- VALIDATION OK -->

<?php $this->title = "Inscription"; ?>

<div class="blocpage">
    <?php include("template_header.php") ?>

    <form method="post" action="../public/index.php?route=register" id="register-section">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="username" value="<?= isset($post) ? htmlspecialchars($post->get('username')) : ''; ?>"><br>
        <div class="constraint-error">
            <?= isset($errors['username']) ? $errors['username'] : ''; ?>
        </div>
        <label for="mail">Adresse Mail</label><br>
        <input type="text" id="mail" name="mail" value="<?= isset($post) ? htmlspecialchars($post->get('mail')) : ''; ?>"><br>
        <div class="constraint-error">
            <?= isset($errors['mail']) ? $errors['mail'] : ''; ?>
        </div>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <div class="constraint-error">
            <?= isset($errors['password']) ? $errors['password'] : ''; ?>
        </div>
        <input type="submit" value="Inscription" class="submit-form" name="submit">
    </form>
</div>