<?php
require_once('Model.php');
class Adress extends Model
{
    protected $table = 'address';
    
    public function all ()
    {
        return parent::all();
    }
}