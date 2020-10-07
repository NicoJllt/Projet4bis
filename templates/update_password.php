<!DOCTYPE html>
<!-- PAGE D'ACCUEIL -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="../public/CSS/frontend.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<?php $this->title = 'Modifier le mot de passe'; ?>

<body>
    <div class="blocpage">
        <?php include("template_header.php") ?>

        <p>Le mot de passe de <?= $this->session->get('username'); ?> sera modifié.</p>
        <form method="post" action="../public/index.php?route=updatePassword">
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password"><br>
            <input type="submit" value="Mettre à jour" id="submit" name="submit">
        </form>
    </div>
</body>

</html>