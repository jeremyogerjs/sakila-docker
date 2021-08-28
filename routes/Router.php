<?php


define('DB_NAME', 'sakila');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PWD', 'secret123');

require_once('./database/DbConnection.php');
require_once('./routes/Route.php');

class Router extends Route
{
    protected $url;
    protected $routes = [];
    public function __construct($url)
    {
        $this->url = trim($url, '/');
    }

    public function get(string $path, string $action)
    {

        $this->routes['GET'][] = new Route($path, $action);
    }
    public function post(string $path, string $action)
    {
        $this->routes['POST'][] = new Route($path, $action);
    }
    public function run()
    {
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                return $route->execute();
            }
        }
    }
}
