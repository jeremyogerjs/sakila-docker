<?php
require_once('Model.php');

class Rental extends Model
{

    protected $table = 'rental';

    //all columns of table 
    protected $rental_date;
    protected $inventory_id;
    protected $customer_id;
    protected $return_date;
    protected $staff_id;
    protected $last_update;

    public function __construct(array $data = [], $db)
    {
        foreach ($data as $key => $value) {
            $this->$key = htmlspecialchars($value);
        }
        parent::__construct($db);
    }

    /**
     * 
     * @param array -- 
     * @return object|array 
     * 
     */
    public function all(array $columns = ['*'])
    {
        return $this->query("SELECT r.rental_id,r.customer_id,r.rental_date,r.return_date,r.inventory_id,r.staff_id,c.first_name as customerFirstName,
        c.last_name as customerLastName,c.email,s.first_name,s.last_name,f.title 
        FROM rental AS r 
        LEFT JOIN inventory AS i ON r.inventory_id = i.inventory_id
        LEFT JOIN customer AS c ON r.customer_id = c.customer_id
        LEFT JOIN film AS f ON i.film_id = f.film_id
        LEFT JOIN staff AS s ON r.staff_id = s.staff_id ORDER BY r.rental_date DESC LIMIT 20", [], false);
    }
    /**
     * 
     * @param string $id 
     * @param string $column 
     * @param bool $single  true = single result, false = multiple result
     * @return object|array
     * 
     */
    public function findBy($id, string $column, bool $single)
    {
        return $this->query("SELECT r.rental_id,r.rental_date,r.return_date,r.inventory_id,r.customer_id,r.staff_id,c.first_name as customerFirstName,
            c.last_name as customerLastName,c.email,s.first_name,s.last_name,f.title,f.rental_rate 
            FROM rental AS r 
            LEFT JOIN inventory AS i ON r.inventory_id = i.inventory_id
            LEFT JOIN customer AS c ON r.customer_id = c.customer_id
            LEFT JOIN staff AS s ON r.staff_id = s.staff_id
            LEFT JOIN film AS f ON i.film_id = f.film_id
        WHERE $column ? ORDER BY r.rental_date DESC LIMIT 20", [$id], $single);
    }
    /**
     * 
     * @param string $query value of search bar
     * @return object|array
     * 
     */
    public function searchBy(string $query)
    {
        return $this->query("SELECT r.rental_id,r.rental_date,r.return_date,r.inventory_id,r.customer_id,r.staff_id,c.first_name as customerFirstName,
            c.last_name as customerLastName,c.email,s.first_name,s.last_name,f.title,f.rental_rate 
            FROM rental AS r 
            LEFT JOIN inventory AS i ON r.inventory_id = i.inventory_id
            LEFT JOIN customer AS c ON r.customer_id = c.customer_id
            LEFT JOIN staff AS s ON r.staff_id = s.staff_id
            LEFT JOIN film AS f ON i.film_id = f.film_id
        WHERE lower(c.last_name) LIKE lower(?) OR lower(c.first_name) LIKE lower(?) OR lower(f.title) LIKE lower(?) ORDER BY rental_date DESC LIMIT 20", ["%$query%", "%$query%", "%$query%"], false);
    }
    /**
     * 
     * @param int -- id of movie
     * @return bool
     * 
     * 
     */
    public function store($id)
    {
        $this->inventory_id = htmlspecialchars($id);

        return $this->query("INSERT INTO rental (rental_date,inventory_id,customer_id,return_date,staff_id)
        VALUES (?,?,?,?,?);
        ", [$this->rental_date, $this->inventory_id, $this->customer_id, $this->return_date, $this->staff_id], true);
    }
    /**
     * 
     * 
     * @param int -- id of rental
     * @return bool 
     * 
     * 
     */
    public function update($idRental)
    {
        return $this->query("UPDATE rental SET return_date = ? WHERE rental_id = ? ",[$this->return_date, $idRental], true);
    }
}
