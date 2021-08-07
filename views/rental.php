<?php session_start() ?>
<?php ob_start() ?>

<h1>Toute les locations</h1>



<?php $content = ob_get_clean() ?>

<?php require('layout.php') ?>