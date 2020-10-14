<!DOCTYPE html>
<!-- PAGE D'ACCUEIL -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="../public/CSS/frontend.css" />
    <link rel="stylesheet" href="../public/CSS/backend.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php $this->title = 'Modifier le mot de passe'; ?>

<body>
    <div class="blocpage">
        <?php include("template_header.php") ?>

        <div id="update-password-bloc">
            <p>Le mot de passe de <?= $this->session->get('username'); ?> sera modifié.</p>
            <form method="post" action="../public/index.php?route=updatePassword">
                <label for="password">Nouveau mot de passe</label><br>
                <input type="password" id="password-input" name="password"><br>
                <input type="submit" value="Mettre à jour" id="password-submit-form" name="submit">
            </form>
        </div>
    </div>
</body>

</html>