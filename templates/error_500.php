<!-- VALIDATION OK -->

<!-- Erreur car la requête envoyée par le navigateur n'a pas pu être traitée -->
<?php $this->title = 'erreur 500'; ?>

<h1>Erreur 500</h1>
<p>Erreur serveur provoquée par l'exception suivante :</p>
<p><?= $error->getMessage() ?></p>
<h2>Message complet</h2>
<p><?= $error ?></p>