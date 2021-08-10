<?php
require('./routes/Router.php');

define('VIEWS',dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ecf-6' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('CONTROLLER',dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ecf-6' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR);
define('MODEL',dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ecf-6' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR);

$router = new Router($_SERVER['REQUEST_URI']);


// page connexion default
$router -> get('','AuthController@login');

// auth user
$router -> get('login','AuthController@create');
$router -> post('login','AuthController@store');
$router -> get('logout','AuthController@logout');
$router -> get('dashboard','AuthController@index');

// movies
$router -> get('films','MovieController@index');
$router -> post('films/search','MovieController@search');
$router -> get('films/:id','MovieController@show');
$router -> get('films/categories','MovieController@filterByCategory');
$router -> get('films/store/:id','MovieController@filterByStore');

// rental
$router -> get('locations','RentalController@index');
$router -> get('locations/:id','RentalController@show');
$router -> get('films/:id/location','RentalController@create');
$router -> post('films/:id/location','RentalController@store');

//running router
$router->run();

// $movies = new MovieController();
// $auth = new AuthController();
// $rental = new RentalController();
// $category = new CategoryController();

// if(empty($_GET['target']))
// {
//     require('./views/login.php');
// }
// else 
// {
//     if ($_GET['target'] === 'login')
//     {
//         $auth -> store($_POST);
//     }
//     // else if ($_GET['target'] === 'films')
//     // {
//     //     if(isset($_GET['action']))
//     //     {
//     //         if($_GET['action'] === 'search')
//     //         {
//     //             $movies ->search();
//     //         }
//     //         else if ($_GET['action'] === 'categorie')
//     //         {
//     //             $movies -> filterByCategory();
//     //         }
//     //         else if($_GET['action'] === 'single')
//     //         {
//     //             $movies -> show();
//     //         }
//     //         else if ($_GET['action'] === 'store' )
//     //         {
//     //             $movies -> filterByStore();
//     //         }
//     //         else if ($_GET['action'] === 'location')
//     //         {
//     //             $rental ->create();
//     //         }
//     //     }
//     //     else
//     //     {
//     //         $movies -> index();
//     //     }
//     // }
//     // else if($_GET['target'] === 'location')
//     // {
//     //     if(isset($_GET['action']))
//     //     {
//     //         if($_GET['action'] === 'create')
//     //         {
//     //             $rental ->create();
//     //         }
//     //         else if($_GET['action'] === 'store')
//     //         {
//     //             $rental -> store();
//     //         }
//     //     }
//     // }
//     else if ($_GET['target'] === 'test')
//     {
//         $category -> index();
//     }
//     else if ($_GET['target'] === 'logout')
//     {
//         $auth -> logout();
//     }
//     else if ($_GET['target'] === 'dashboard')
//     {
//         require('./views/dashboard.php');
//     }
// }
