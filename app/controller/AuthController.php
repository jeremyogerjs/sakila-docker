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
            $error = 'Email ou mot de passe incorrect';
            require('./views/login.php');
        }
        else
        {
            header('location:index.php?target=dashboard');
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