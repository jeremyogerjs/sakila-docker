<?php
require_once('Model.php');

class Actor extends Model{

    public $table = 'actor';

    public function all(array $columns = ['*'])
    {
        return parent::all();
    }
}