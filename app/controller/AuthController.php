<?php
require('./app/models/User.php');
require_once('./app/controller/Controller.php');

class AuthController extends Controller 
{
    public function welcome()
    {
        $this -> render('dashboard');
    }
    public function store()
    {
        $user = new User($_POST,$this -> getDB());

        $login = $user ->auth();
        
        if(!$login)
        {
            $error = 'Email ou mot de passe incorrect';
            $this -> render('login');
        }
        else
        {
            $this -> render('dashboard');
        }
    }
    public function index()
    {
        $this -> render('login');
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
        $this -> render('login');
    }

    /**
     * create new user in database for test
     * setup your account in user model store method
     */
    public function createAdmin()
    {
        $user = new User([],$this -> getDB());

        $user ->store();
    }
}