<?php
require_once('./app/controller/AuthController.php');
require_once('./app/controller/MovieController.php');
require_once('./app/controller/RentalController.php');
require_once('./app/controller/CategoryController.php');
require_once('./app/controller/CustomerController.php');

require_once('./database/DbConnection.php');
class Route

{
    public $path;
    public $action;
    public $matches;


    public function __construct($path, $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    public function matches(string $url)
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";

        if (preg_match_all($pathToMatch, $url, $matches)) {

            $this->matches = $matches;
            return true;
        } else {
            return false;
        }
    }

    public function execute()
    {
        $params = explode('@', $this->action);
        $controller = new $params[0](new Database(DB_NAME, DB_HOST, DB_USER, DB_PWD));

        $method = $params[1];

        if (isset($this->matches[1])) {
            if (count($this->matches) > 2) {
                $param = array_merge($this->matches[1], $this->matches[2]);

                return $controller->$method($param[0], $param[1]);
            } else {
                $param = array_merge($this->matches[1]);

                return isset($this->matches[1]) ? $controller->$method($param[0]) : $controller->$method();
            }
        } else {
            return $controller->$method();
        }
    }
}
