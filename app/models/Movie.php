<?php
require_once('Model.php');

class Movie extends Model
{
    protected $table = 'film';

    public function all(array $columns = ['*'])
    {

        return $this->query("SELECT count(*) as nbrFilmTot,f.film_id,f.title,c.name, f.length,
        f.replacement_cost, f.rental_rate,s.store_id,i.inventory_id,
        count((select r.inventory_id from rental as r where r.inventory_id = i.inventory_id and r.return_date is null group by i.film_id limit 1)) as nbrFilmLoc
        from inventory as i
        LEFT JOIN film AS f ON i.film_id = f.film_id
        LEFT JOIN store AS s ON i.store_id = s.store_id
        LEFT JOIN film_category AS fc ON f.film_id = fc.film_id
        LEFT JOIN category AS c ON fc.category_id = c.category_id
        group by film_id;
        LIMIT 20", [], false);
    }
    public function show($id)
    {
        return $this->query("SELECT count(*) as nbrFilmTot,f.film_id,f.title,c.name, f.length,
        f.replacement_cost, f.rental_rate,s.store_id,i.inventory_id,f.description,f.special_features,
        count((select r.inventory_id from rental as r where r.inventory_id = i.inventory_id and r.return_date is null group by i.film_id limit 1)) as nbrFilmLoc
            from inventory as i
            LEFT JOIN film AS f ON i.film_id = f.film_id
            LEFT JOIN store AS s ON i.store_id = s.store_id
            LEFT JOIN film_category AS fc ON f.film_id = fc.film_id
            LEFT JOIN category AS c ON fc.category_id = c.category_id
            WHERE i.inventory_id = ?
        group by i.film_id
        ", [$id], false);
    }
    /**
     * 
     * @param string $query value of search bar
     * @param string $idCategory value of category column
     * @param string $operator1 operator for category column
     * 
     */
    public function searchBy(string $query, string $idCategory, string $operator1)
    {

        return $this->query("SELECT count(*) as nbrFilmTot,f.film_id,f.title,c.name, f.length,
            f.replacement_cost, f.rental_rate,s.store_id,i.inventory_id,
            count((select r.inventory_id from rental as r where r.inventory_id = i.inventory_id and r.return_date is null group by i.film_id limit 1)) as nbrFilmLoc
            from inventory as i
            LEFT JOIN film AS f ON i.film_id = f.film_id
            LEFT JOIN store AS s ON i.store_id = s.store_id
            LEFT JOIN film_category AS fc ON f.film_id = fc.film_id
            LEFT JOIN category AS c ON fc.category_id = c.category_id
        WHERE lower(f.title) LIKE lower(?) AND fc.category_id $operator1 ? 
        GROUP BY film_id LIMIT 20", ["%$query%", $idCategory], false);
    }
}
