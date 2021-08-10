<?php
require_once('Model.php');

class Category extends Model{

    public $table = 'category';

    public function all(array $columns = ['*'])
    {
        return parent::all($columns);
    }
}