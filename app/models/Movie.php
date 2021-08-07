<?php
require_once('Model.php');

class Movie extends Model
{
    protected $table = 'film';
    
    public function all()
    {
        return parent::all();
    }

    public function whereBy($id)
    {
        return $this -> query("SELECT * FROM inventory AS i 
        LEFT JOIN film AS f ON i.film_id = f.film_id 
        LEFT JOIN store AS s ON i.store_id = s.store_id
        WHERE i.store_id = ? LIMIT 20",[$id]);
    }

    public function findBy($store, string $query)
    {
        return $this -> query("SELECT * FROM inventory AS i 
        LEFT JOIN film AS f ON i.film_id = f.film_id 
        LEFT JOIN store AS s ON i.store_id = s.store_id
        WHERE i.store_id = ? 
        AND lower(f.title) LIKE lower(?) LIMIT 20",[$store,"%$query%"]);
    }
}