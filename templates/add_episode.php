<!DOCTYPE html>
<!-- PAGE DE CREATION D'UN EPISODE -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="../public/CSS/frontend.css" />
    <link rel="stylesheet" href="../public/CSS/backend.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
</head>

<?php $this->title = "Nouvel épisode"; ?>

<body>
    <div class="blocpage">
        <section class="row">
            <div class="col-lg-12">
                <?php include("template_header.php") ?>
                <?php include('form_episode.php'); ?>
            </div>
        </section>
    </div>
</body>

</html>