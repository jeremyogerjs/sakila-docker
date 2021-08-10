<?php
require_once('Model.php');

class Movie extends Model
{
    protected $table = 'film';
    
    public function all(array $columns =['*'])
    {
        return $this -> query("SELECT DISTINCT f.film_id,f.title, c.name, f.length, f.replacement_cost, f.rental_rate
        FROM inventory AS i 
        LEFT JOIN film AS f ON i.film_id = f.film_id
        LEFT JOIN store AS s ON i.store_id = s.store_id
        LEFT JOIN film_category AS fc ON f.film_id = fc.film_id
        LEFT JOIN category AS c ON fc.category_id = c.category_id LIMIT 20",[],false);
    }

    public function whereBy($id,string $column )
    {
        return $this -> query("SELECT DISTINCT f.film_id,f.title, c.name, f.length, f.replacement_cost, f.rental_rate
        FROM inventory AS i 
        LEFT JOIN film AS f ON i.film_id = f.film_id
        LEFT JOIN store AS s ON i.store_id = s.store_id
        LEFT JOIN film_category AS fc ON f.film_id = fc.film_id
        LEFT JOIN category AS c ON fc.category_id = c.category_id
        WHERE $column = ? LIMIT 20",[$id],false);
    }

    public function show($id)
    {
        return $this -> query("SELECT DISTINCT f.film_id,f.title, c.name, f.length, f.replacement_cost, f.rental_rate,f.description,
        f.special_features,a.first_name,a.last_name,i.inventory_id
        FROM inventory AS i
        LEFT JOIN film AS f ON i.film_id = f.film_id
        LEFT JOIN film_category AS fc ON f.film_id = fc.film_id
        LEFT JOIN category AS c ON fc.category_id = c.category_id
        LEFT JOIN film_actor AS fa ON fa.film_id = f.film_id
        LEFT JOIN actor AS a ON fa.actor_id = a.actor_id
        WHERE f.film_id = ? LIMIT 20",[$id],false);
    }
    public function findBy(string $query)
    {
        return $this -> query("SELECT DISTINCT f.film_id,f.title, c.name, f.length, f.replacement_cost, f.rental_rate
        FROM inventory AS i 
        LEFT JOIN film AS f ON i.film_id = f.film_id
        LEFT JOIN store AS s ON i.store_id = s.store_id
        LEFT JOIN film_category AS fc ON f.film_id = fc.film_id
        LEFT JOIN category AS c ON fc.category_id = c.category_id
        WHERE lower(f.title) LIKE lower(?) LIMIT 20",["%$query%"],false);
    }
}