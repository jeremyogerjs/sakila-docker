<?php
require('./app/controller/AuthController.php');
require('./app/controller/MovieController.php');

define('DB_NAME', 'sakila');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PWD', 'secret');

$movies = new MovieController();
$auth = new AuthController();

if(empty($_GET['target']))
{
    require('./views/login.php');
}
else if ($_GET['target'] === 'login')
{
    $auth -> store($_POST);
}
else if ($_GET['target'] === 'films')
{
    if(isset($_GET['store']))
    {
        if(!empty($_POST))
        {
            $movies ->search();
            die();
        }
        $movies -> show();
        die();
    }
    $movies -> index();
}
else if ($_GET['target'] === 'logout')
{
    $auth -> logout();
}
else if ($_GET['target'] === 'dashboard')
{
    require('./views/dashboard.php');
}