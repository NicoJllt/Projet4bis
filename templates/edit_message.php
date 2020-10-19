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

<?php $this->title = "Modifier le commentaire"; ?>

<body>
    <div class="blocpage">
        <?php include("template_header.php") ?>
        <div id="edit-form-comment">
            <p>Modifiez votre commentaire</p>
            <?php include('form_message.php'); ?>
        </div>
    </div>
</body>

</html>