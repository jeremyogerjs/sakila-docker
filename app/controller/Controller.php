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
        return $this->db;
    }

    /**
     * 
     * return view file in folder views
     * @param string  $file name of view
     * @param array|null $params value u want to pass in view
     * @return view -- your html  
     * 
     * 
     */
    protected function render(string $file, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $file);
        require_once(VIEWS . $path . '.php');

        $content = ob_get_clean();

        require_once(VIEWS . 'layout.php');
    }

    /**
     * 
     * verify if you are login
     * 
     * 
     */
    protected function isAuth()
    {
        if (!isset($_SESSION['username'])) {
            $this->render('user.login');
            exit();
        }
    }
}
