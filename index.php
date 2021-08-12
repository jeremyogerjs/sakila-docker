<?php
require('./routes/Router.php');

define('VIEWS',dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ecf-6' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('CONTROLLER',dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ecf-6' . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR);
define('MODEL',dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ecf-6' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR);

$router = new Router($_SERVER['REQUEST_URI']);


// page connexion default
$router -> get('','AuthController@index');

// create user for test
$router -> get('admin','AuthController@createAdmin');

// auth user
$router -> get('login','AuthController@index');
$router -> post('login','AuthController@store');
$router -> get('logout','AuthController@logout');
$router -> get('dashboard','AuthController@welcome');

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

// customer
$router -> get('clients','CustomerController@index');
$router -> get('clients/:id','CustomerController@show');
$router -> post('clients/search','CustomerController@find');


//running router
$router->run();
