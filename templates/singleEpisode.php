<?php

use App\src\DAO\EpisodeDAO;
use App\src\DAO\MessageDAO;

?>

<!DOCTYPE html>
<!-- PAGE EPISODE -->
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Billet simple pour l'Alaska</title>
    <link rel="stylesheet" href="../../CSS/frontend/frontend.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="blocpage">

        <?php include("templateHeader.php") ?>

        <?php
        $episode = $episodes->fetch();
        ?>
        <section class="row">
            <div class="col-lg-12">
                <article id="episode-page-bloc">
                    <h1 class="news-title"><?= htmlspecialchars($episode->getTitle()) ?></h1>
                    <div class="news-content"><?= htmlspecialchars($episode->getContent()) ?></div>
                </article>
            </div>
        </section>

        <?php
        $episodes->closeCursor();
        ?>

            <section class="row">
                <div class="col-lg-12">
                    <div id="comment-page-bloc">
                        <div class="show-comments">
                            <a href="home.php?action=showMessages&id=idMessage">
                                <button id="show-comments-button">Afficher les commentaires</button>
                            </a>

                            <?php
                            foreach ($messages as $message) {
                            ?>
                                <div class="comment-bloc">
                                    <div class="message-user-name"><?= htmlspecialchars($message->getUsername()) ?></div>
                                    <div class="message-date"><?= htmlspecialchars(date_parse($message->getDateMessage())) ?></div>
                                    <p class="message-content"><?= htmlspecialchars($message->getContent()) ?></p>
                                </div>
                            <?php
                            }
                            $messages->closeCursor();
                            ?>
                        </div>

                        
                    </div>
                </div>
            </section>

    </div>
</body>

</html>