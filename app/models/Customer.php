<?php
require_once('Model.php');

class Customer extends Model{

    public $table = 'customer';

    public function all(array $columns = ['*'])
    {
        return parent::all();
    }
}