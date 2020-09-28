<!DOCTYPE html>
<!-- PAGE DE CREATION D'UN EPISODE -->
<html lang="fr">

<head>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
</head>

<body>
    <div class="blocpage">

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