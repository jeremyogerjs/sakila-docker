<?php
require_once('./database/DbConnection.php');

class Controller 
{
    protected $db;

    public function __construct(Database $db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->db = $db;
    }

    protected function getDB()
    {
        return $this -> db;
    }

    protected function render(string $file,array $params = null)
    {
        ob_start();

        require(VIEWS . $file . '.php');

        $content = ob_get_clean();

        require(VIEWS . 'layout.php');
    }
}