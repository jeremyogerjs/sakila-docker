<?php
require_once('Model.php');

class User extends Model {

    //data for login
    protected $email;
    protected $password;

    //data for profil
    public $first_name;
    protected $last_name;
    protected $addrese;
    protected $picture;
    protected $store;
    protected $active;
    protected $username;

    protected $table = 'staff';

    public function __construct(array $data = [],Database $db)
    {
        foreach ($data as $key => $value)
        {
            $this -> $key = $value;
        }
        parent::__construct($db);
    }
    public function auth()
    {
        try 
        {

            $row = $this -> query("SELECT * FROM staff WHERE email = ?",[$this -> email],true);

            $isPasswordCorrect = password_verify($this -> password, $row -> password);

            if($isPasswordCorrect) {   

                // on enregistre les paramètres de notre visiteur comme variables de session ($nom d'utilisateur) 
                $this -> first_name = $row -> first_name;
                $_SESSION['username'] = $this -> first_name;               
                return true;
            }
            else
            {
                echo '<script type="text/javascript">alert("Your login or your password is incorrect!");
                </script>';
                return false;

            }
    
        }
        catch (PDOException $e)
        {
            echo 'Query error.';
            die();
        }
    }
    
}