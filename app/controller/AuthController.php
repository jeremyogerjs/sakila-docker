<?php
require('./app/models/User.php');
require_once('./app/controller/Controller.php');

class AuthController extends Controller
{
    public function welcome()
    {
        $user = new User([],$this -> getDB());
        $data = $user -> findBy($_SESSION['id']);

        $this -> render('user.dashboard',compact('data'));
    }
    public function store()
    {
        $user = new User($_POST,$this -> getDB());

        $login = $user ->auth();

        if(!$login)
        {
            $error = 'Email ou mot de passe incorrect';
            $this -> render('user.login');
        }
        else
        {
            header('Location: /dashboard');
        }
    }
    public function index()
    {
        if(empty($_SESSION))
        {
            $this -> render('user.login');
        }
        else{
            header('Location: /dashboard');
        }
    }
    public function logout()
    {
        // On détruit les variables de notre session
        // On détruit notre session
        session_unset ();
        if(isset($_SESSION)) {
            session_destroy ();
        }

        // On redirige le visiteur vers la page de connexion
        $this -> render('user.login');
        
    }

    /**
     * create new user in database for test
     * setup your account in user model store method
     * DELETE THIS IN PRODUCTION
     */
    public function createAdmin()
    {
        $user = new User([],$this -> getDB());

        $user ->store();
    }
}
