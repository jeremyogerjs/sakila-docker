<?php ob_start() ?>


<p>Vous ete connecté</p>


<?php $content = ob_get_clean() ?>

<?php require('layout.php') ?>