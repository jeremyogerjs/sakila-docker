<?php
require_once('Model.php');

class User extends Model {

    //data for login
    protected $email;
    protected $password;

    //data for profil
    protected $firstName;
    protected $lastName;
    protected $addrese;
    protected $picture;
    protected $store;
    protected $active;
    protected $username;

    protected $table = 'staff';

    public function __construct(array $data)
    {
        parent::__construct();
        foreach ($data as $key => $value)
        {
            $this -> $key = $value;
        }
    }
    public function auth()
    {
        $query = 'SELECT * FROM staff WHERE (email = :email)';

        $values = [':email' => $this -> email];

        try 
        {

            $res = $this -> db -> getPDO() -> prepare($query);

            $res->execute($values);

            $row = $res->fetch();

            $isPasswordCorrect = password_verify($this -> password, $row -> password);
            

            if($isPasswordCorrect) {
    
                //start session
                session_start ();
    
                // on enregistre les paramètres de notre visiteur comme variables de session ($nom d'utilisateur) 
                $_SESSION['username'] = $row -> first_name;
    
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