<?php
require('./app/models/User.php');
require('./app/models/Adress.php');
require('./app/models/Store.php');

class AuthController {

    public function index()
    {
        require('../../views/login.php');
    }

    public function store(array $data)
    {
        $user = new User($data);

        $login = $user ->auth();
        
        if(!$login)
        {
            require('./views/login.php');
        }
        else
        {
            require('./views/dashboard.php');
        }
    }
    public function create(array $data)
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $user = new User($data);
            $user -> create();
            require('./views/login.php');
        }
        else
        {
            $adress = new Adress();
            $address = $adress -> all();
            
            $store = new Store();
            $stores = $store -> all();
            require('./views/register.php');
        }
    }

    public function logout()
    {
        session_start ();
        // On démarre la session
    
        // On détruit les variables de notre session
        // On détruit notre session
        session_unset ();
        if(isset($_SESSION)) {
            session_destroy ();
        }
    
        // On redirige le visiteur vers la page de connexion
        header ('location:index.php');
    }
}