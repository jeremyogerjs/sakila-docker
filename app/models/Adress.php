<?php
require_once('Model.php');
class Adress extends Model
{
    protected $table = 'address';
    
    public function all (array $columns = ['*'] )
    {
        return parent::all();
    }
}