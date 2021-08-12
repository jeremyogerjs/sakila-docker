<?php
require_once('Model.php');

class Customer extends Model{

    protected $table = 'customer';

    public function all(array $columns = ['*'])
    {
        return parent::all();
    }

    /**
     * 
     * @param int id of customer
     * @return object|array
     * 
     */
    public function findBy($id)
    {
        return $this -> query("SELECT c.first_name,c.last_name,c.email, a.address,a.district,a.postal_code,a.phone,ct.city,cn.country
        FROM customer AS c 
        LEFT JOIN address AS a ON c.address_id = a.address_id
        LEFT JOIN city AS ct ON a.city_id = ct.city_id
        LEFT JOIN country AS cn ON ct.country_id = cn.country_id
        WHERE c.customer_id = ?",[$id],true);
    }

    public function search($query)
    {
        return $this ->query("SELECT * FROM customer WHERE lower(first_name) OR lower(last_name) LIKE lower(?)",["%$query%"],false);
    }
}