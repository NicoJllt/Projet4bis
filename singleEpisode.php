<?php
require 'Database.php';
require 'Episode.php';
require 'Message.php';
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

        <?php include("../template/templateHeader.php") ?>

        <?php
        $episode = new Episode();
        $episodes = $episode->getEpisode($_GET['episodeId']);
        $episode = $episodes->fetch()
        ?>
        <section class="row">
            <div class="col-lg-12">
                <article id="episode-page-bloc">
                    <h1 class="news-title"><?= htmlspecialchars($episode->title()) ?></h1>
                    <div class="news-content"><?= htmlspecialchars($episode->content()) ?></div>
                </article>
            </div>
        </section>

        <?php
        $articles->closeCursor();
        ?>

        <section class="change-episode-buttons">
            <?php
            if (!is_null($news->previous())) { ?>
                <a href="home.php?action=showNewsNumber&id=<?= $news->previous() ?>">
                    <button class="previous-episode-button">Épisode précédent</button>
                </a>
            <?php } ?>
            <?php
            if (!is_null($news->next())) { ?>
                <a href="home.php?action=showNewsNumber&id=<?= $news->next() ?>">
                    <button class="next-episode-button">Épisode suivant</button>
                </a>
            <?php } ?>
        </section>


        <?php
        if ($users->userId() === true) {
        ?>

            <section class="row">
                <div class="col-lg-12">
                    <div id="comment-page-bloc">
                        <div class="show-comments">
                            <a href="home.php?action=showMessages&id=idMessage">
                                <button id="show-comments-button">Afficher les commentaires</button>
                            </a>

                            <?php
                            $message = new Message();
                            $messages = $message->getMessagesFromEpisode($_GET['episodeId']);
                            while ($message = $messages->fetch()) {
                            ?>
                                <div class="comment-bloc">
                                    <div class="message-user-name"><?= htmlspecialchars($message->userName()) ?></div>
                                    <div class="message-date"><?= htmlspecialchars(date_parse($message->dateMessage())) ?></div>
                                    <p class="message-content"><?= htmlspecialchars($message->content()) ?></p>
                                </div>
                            <?php
                            }
                            $messages->closeCursor();
                            ?>
                        </div>

                        <div id="add-comment-bloc">
                            <form method="post" action="admin.php?action=addComment">
                                <h1>Laisser un commentaire</h1>

                                <textarea name="content" rows="5" cols="141"></textarea>

                                <div id="comment-form-button">
                                    <button type="submit" value="Valider le commentaire">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

        <?php } else { ?>
            <div>
                <p>Vous devez vous connecter afin d'afficher ou d'ajouter un commentaire.</p>
            </div>
        <?php } ?>

    </div>
</body>

</html>