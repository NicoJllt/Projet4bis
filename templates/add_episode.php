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

        <?php include("../template/templateHeader.php") ?>

        <?php $this->title = "Nouvel épisode"; ?>

        <section class="row">
            <div class="col-lg-12">
                <form method="post" action="../public/index.php?route=addEpisode">
                    <div id="create-news-form-bloc">
                        <h1 id="header-form-create">Ajout d'un nouvel épisode</h1>

                        <label for="title">Titre</label><br>
                        <input type="text" id="title" name="title" placeholder="Titre de l'épisode" /><br>

                        <label for="content">Contenu</label><br>
                        <textarea id="content" name="content" rows="8" cols="30" placeholder="Contenu de l'épisode"></textarea><br>

                        <div id="create-form-buttons">
                            <button type="reset" value="Annuler">Annuler</button>
                            <input type="submit" value="Ajouter l'épisode" id="submit" name="submit">
                        </div>
                    </div>
                </form>
                <a href="../public/index.php">Retour à l'accueil</a>
            </div>
        </section>
    </div>
</body>

</html>