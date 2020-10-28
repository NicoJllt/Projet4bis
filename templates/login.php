<!DOCTYPE html>
<!-- PAGE EPISODE -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="../public/CSS/frontend.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php $this->title = "Connexion"; ?>

<body>
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
</body>

</html>