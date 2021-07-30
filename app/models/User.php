<?php

require_once('Model.php');

class User extends Model {

    protected $email;
    protected $password;

    public function __construct(array $data)
    {
        foreach ($data as $key => $value)
        {
            $this -> $key = $value;
        }
    }

    public function store()
    {
        $query = 'SELECT * FROM users WHERE (email = :email)';

        $values = [':email' => $this -> email];
        
        try 
        {
            $res = $this -> db -> getPDO() -> prepare($query);
            $res->execute($values);
    
            $row = $res->fetch();
    
            $isPasswordCorrect = password_verify($this -> password, $row['password']);
    
            if($isPasswordCorrect) {
    
                //start session
                session_start ();
    
                // on enregistre les paramètres de notre visiteur comme variables de session ($login et $password) 
                $_SESSION['username'] = $row['first_name'];
                $_SESSION['password'] = $_POST['password'];
    
                header("location:index.php?target=admin&action=home");
            }
            else
            {
                echo '<script type="text/javascript">alert("Your login or your password is incorrect!");
                </script>';
    
                header("location:index.php?target=admin&action=auth");
            }
    
        }
        catch (PDOException $e)
        {
            echo 'Query error.';
            die();
        }
    }
    
}