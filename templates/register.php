<!DOCTYPE html>
<!-- PAGE EPISODE -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="../public/CSS/frontend.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php $this->title = "Inscription"; ?>

<body>
    <div class="blocpage">
        <?php include("template_header.php") ?>

        <form method="post" action="../public/index.php?route=register" id="register-section">
            <label for="username">Pseudo</label><br>
            <input type="text" id="pseudo" name="username" value="<?= isset($post) ? htmlspecialchars($post->get('username')) : ''; ?>"><br>
            <label for="mail">Adresse Mail</label><br>
            <input type="text" id="mail" name="mail" value="<?= isset($post) ? htmlspecialchars($post->get('mail')) : ''; ?>"><br>
            <?= isset($errors['username']) ? $errors['username'] : ''; ?>
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password"><br>
            <?= isset($errors['password']) ? $errors['password'] : ''; ?>
            <input type="submit" value="Inscription" class="submit-form" name="submit">
        </form>
    </div>
</body>

</html>