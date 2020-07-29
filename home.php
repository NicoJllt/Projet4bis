<?php
require 'Database.php';
require 'Episode.php';
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

        <?php include("../template/templateHeader.php") ?>

        <section class="news-preview-bloc">
            <section class="row">
        <?php
        $episode = new Episode();
        $episodes = $episode->getEpisodes($nb, $offset, bool $asc);
        while ($episode = $episodes->fetch()) {
        ?>
            <div class="col-md-6">
                <a href="singleEpisode.php?episodeId=<?= htmlspecialchars($episode->episodeId()) ?>">
                    <article class="news-preview">
                        <div class="news-preview-marge">
                            <h1 class="news-title-preview"><?= htmlspecialchars($episode->title()) ?></h1>
                            <p class="news-content-preview"><?= htmlspecialchars(substr($episode->content(), 0, 250)) . '...' ?></p>
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
                    
        <footer>
            <section class="row">
                <div class="col-lg-12">
                    <div id="change-page">
                        <ul>
                            <?php
                            if ($offset >= $showNbNews) { ?>
                                <li><a href="index.php?action=showNews&offset=<?= $offset - $showNbNews ?>"><button class="previous-episodes-button">Épisodes précédents</button></a></li>
                            <?php } ?>
                            <?php
                            if (count($news) >= ($showNbNews + 1)) { ?>
                                <li><a href="index.php?action=showNews&offset=<?= $offset + $showNbNews ?>"><button class="next-episodes-button">Épisodes suivants</button></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </section>
        </footer>
    </div>
</body>

</html>