<?php
require('./app/controller/AuthController.php');
require('./app/controller/MovieController.php');

define('DB_NAME', 'sakila');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PWD', 'secret');

$auth = new AuthController();
$movies = new MovieController();

if(empty($_GET['action']))
{
    require('./views/login.php');
}
else if ($_GET['action'] === 'login')
{
    $auth -> store($_POST);
}
else if ($_GET['action'] === 'movies')
{
    $movies -> index();
}