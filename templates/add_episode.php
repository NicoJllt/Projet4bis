<!DOCTYPE html>
<!-- PAGE DE CREATION D'UN EPISODE -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Création d'un épisode</title>
    <link rel="stylesheet" href="../../CSS/frontend/frontend.css" />
    <link rel="stylesheet" href="../../CSS/backend/backend.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
</head>

<body>
    <div class="blocpage">

        <?php include("templateHeader.php") ?>

        <?php $this->title = "Nouvel épisode"; ?>

        <section class="row">
            <div class="col-lg-12">
                <?php include('form_episode.php'); ?>
                <a href="../public/index.php">Retour à l'accueil</a>
            </div>
        </section>
    </div>
</body>

</html>