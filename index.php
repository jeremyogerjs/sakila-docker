<?php
require('./routes/Router.php');


// définition des constantes pour le path des divers fichiers
define('VIEWS',dirname(__DIR__) . DIRECTORY_SEPARATOR . 'ecf-6' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

$router = new Router($_SERVER['REQUEST_URI']);


// page connexion default
$router -> get('','AuthController@index');

// create user for test   ----------------DELETE THIS IN PRODUCTION------------------------------------
$router -> get('admin','AuthController@createAdmin');

// auth user
$router -> get('login','AuthController@index');
$router -> get('logout','AuthController@logout');
$router -> get('dashboard','AuthController@welcome');
$router -> post('login','AuthController@store');

// movies
$router -> get('films','MovieController@index');
$router -> get('films/:id/location/:id','MovieController@show');
$router -> post('films/search','MovieController@search');
$router -> post('films/:id/location/:id','MovieController@store');

// rental
$router -> get('locations','RentalController@index');
$router -> get('locations/:id','RentalController@show');
$router -> post('locations/search','RentalController@search');

//create location
$router -> get('location/:id/film/:id','RentalController@create');
$router -> post('films/:id/location','RentalController@store');

// finish location
$router -> get('locations/:id/edit','RentalController@edit');
$router -> post('locations/:id/edit','RentalController@update');

// customer
$router -> get('clients','CustomerController@index');
$router -> get('clients/:id','CustomerController@show');
$router -> get('test/:id/film/:id','CustomerController@test');
$router -> post('clients/search','CustomerController@search');

//running router
$router->run();
