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
    /**
     * 
     * @param string $query value of searchbar
     * @param string $idCategory value of category column
     * @param string $operator1 operator for category column
     * @param string $returnDate value of return Date column
     * @param string $operator2 operator for return column
     * 
     * 
     */
    public function searchBy(string $query,string $idCategory,string $operator1,$returnDate,string $operator2)
    {

        return $this -> query("SELECT DISTINCT f.film_id,f.title, c.name, f.length, f.replacement_cost, f.rental_rate
        FROM inventory AS i 
            LEFT JOIN film AS f ON i.film_id = f.film_id
            LEFT JOIN store AS s ON i.store_id = s.store_id
            LEFT JOIN film_category AS fc ON f.film_id = fc.film_id
            LEFT JOIN category AS c ON fc.category_id = c.category_id
            LEFT JOIN rental AS r ON r.inventory_id = i.inventory_id
        WHERE lower(f.title) LIKE lower(?) AND fc.category_id $operator1 ?  AND r.return_date $operator2 ? LIMIT 20",["%$query%",$idCategory,$returnDate],false);
    }

}