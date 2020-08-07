<?php
require '../src/DAO/DAO.php';
require '../src/DAO/EpisodeDAO.php';

use App\src\DAO\EpisodeDAO;

?>

<!DOCTYPE html>
<!-- PAGE D'ACCUEIL -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Les derniers épisodes</title>
    <link rel="stylesheet" href="../../CSS/frontend/frontend.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="blocpage">

        <?php include("templateHeader.php") ?>

        <section class="news-preview-bloc">
            <section class="row">
        <?php
        $episode = new EpisodeDAO();
        $episodes = $episode->getEpisodes(10, 0, true);
        while ($episode = $episodes->fetch()) {
        ?>
            <div class="col-md-6">
                <a href="singleEpisode.php?episodeId=<?= htmlspecialchars($episode->episodeId) ?>">
                    <article class="news-preview">
                        <div class="news-preview-marge">
                            <h1 class="news-title-preview"><?= htmlspecialchars($episode->title) ?></h1>
                            <p class="news-content-preview"><?= htmlspecialchars(substr($episode->content, 0, 250)) . '...' ?></p>
                        </div>
                    </article>
                </a>
            </div>
        <?php
        }
        $episodes->closeCursor();
        ?>
            </section>
        </section>
    </div>
</body>

</html>