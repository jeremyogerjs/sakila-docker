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
                $_SESSION['id'] = $row -> staff_id;              
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
    public function findBy($id)
    {
        return $this -> query('SELECT s.first_name as prenom ,s.last_name as nom,s.email,
            a.address as addresse,a.district,a.postal_code as codepostal,a.phone as telephone,c.city as ville,cn.country as pays
            FROM staff AS s 
            LEFT JOIN address AS a ON s.address_id = a.address_id 
            LEFT JOIN city AS c ON a.city_id = c.city_id
            LEFT JOIN country AS cn ON c.country_id = cn.country_id
        WHERE s.staff_id = ?',[$id],true);
    }





    // create user for test DELETE THIS IN PRODUCTION
    public function store()
    {
        $sql = 'INSERT INTO staff 
        (first_name,last_name,address_id,email,store_id,username,password)
        VALUES (:first_name,:last_name,:address_id,:email,:store_id,:username,:password);';

        $res = $this -> db -> getPDO() -> prepare($sql);

        $res -> execute([
            ':first_name' => "John",
            ':last_name' => "Doe",
            ':address_id' => "5",
            ':email' => "test@test.com",
            ':store_id' => 2,
            ':username' => "jonnhy",
            ':password' => password_hash("test",PASSWORD_DEFAULT)
        ]); 


    }
    
}