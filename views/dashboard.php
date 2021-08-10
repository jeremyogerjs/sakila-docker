<?php if(!empty($_SESSION)) : ?>
<h3>Bienvenue <?= $_SESSION["username"] ?> sur votre espace réservé</h3>
<p>Vous ete connecté</p>

<?php else : ?>
<p>Vous devez etre connecté pour accéder a cette page</p>
<?php endif ?>