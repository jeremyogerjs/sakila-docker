<?php
require_once('Model.php');

class User extends Model {

    //data for login
    protected $email;
    protected $password;

    //data for profil and register
    protected $firstName;
    protected $lastName;
    protected $addrese;
    protected $picture;
    protected $store;
    protected $active;
    protected $username;


    public function __construct(array $data)
    {
        parent::__construct();
        foreach ($data as $key => $value)
        {
            $this -> $key = $value;
        }
    }
    public function create()
    {
        $sql = 'INSERT INTO staff 
        (first_name,last_name,address_id,email,store_id,username,password)
        VALUES (:first_name,:last_name,:address_id,:email,:store_id,:username,:password);';

        $res = $this -> db -> getPDO() -> prepare($sql);

        $res -> execute([
            ':first_name' => $this -> firstName,
            ':last_name' => $this -> lastName,
            ':address_id' => $this -> addrese,
            ':email' => $this -> email,
            ':store_id' => $this -> store,
            ':username' => $this -> username,
            ':password' => md5($this -> password) //a tester
        ]); 


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
            
            var_dump($isPasswordCorrect);
            die();
            if($isPasswordCorrect) {
    
                //start session
                session_start ();
    
                // on enregistre les paramètres de notre visiteur comme variables de session ($login et $password) 
                $_SESSION['username'] = $row -> first_name;
                $_SESSION['password'] = $_POST['password'];
    
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