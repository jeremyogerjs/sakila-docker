<?php ob_start() ?>


<?php var_dump($data) ?>


<?php $content = ob_get_clean() ?>

<?php require('layout.php') ?>