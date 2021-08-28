<?php
require_once('Model.php');

class Actor extends Model
{

    public $table = 'actor';

    public function all(array $columns = ['*'])
    {
        return parent::all();
    }

    public function findBy($id)
    {
        return $this->query("SELECT a.first_name,a.last_name FROM film_actor as fc LEFT join actor as a on fc.actor_id = a.actor_id WHERE fc.film_id = ?", [$id], false);
    }
}
