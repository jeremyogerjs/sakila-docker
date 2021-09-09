<?php
require('./routes/Router.php');


// définition des constantes pour le path des divers fichiers
define('VIEWS', 'views' . DIRECTORY_SEPARATOR);

$router = new Router($_SERVER['REQUEST_URI']);
echo "running docker php etc etc...";
phpinfo();
// page connexion default
$router->get('', 'AuthController@index');

// create user for test   ----------------DELETE THIS IN PRODUCTION------------------------------------
$router->get('admin', 'AuthController@createAdmin');

// auth user
$router->get('login', 'AuthController@index');
$router->get('logout', 'AuthController@logout');
$router->get('dashboard', 'AuthController@welcome');
$router->post('login', 'AuthController@store');

// movies
$router->get('films', 'MovieController@index');
$router->get('films/:id', 'MovieController@show');
$router->post('films/search', 'MovieController@search');

// rental
$router->get('locations', 'RentalController@index');
$router->get('locations/:id', 'RentalController@show');
$router->post('locations/search', 'RentalController@search');

//create location
$router->get('location/film/:id', 'RentalController@create');
$router->post('film/:id/location', 'RentalController@store');

// finish location
$router->get('locations/:id/edit', 'RentalController@edit');
$router->post('locations/:id/edit', 'RentalController@update');

// customer
$router->get('clients', 'CustomerController@index');
$router->get('clients/:id', 'CustomerController@show');
$router->get('test/:id/film/:id', 'CustomerController@test');
$router->post('clients/search', 'CustomerController@search');

//running router
$router->run();
