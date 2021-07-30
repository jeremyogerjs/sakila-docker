<?php
require_once('Model.php');

class Movie extends Model
{
    public function all()
    {
        $sql = 'SELECT * FROM film';

        $res = $this -> db -> getPDO() -> prepare($sql);

        $res ->execute();

        return $data = $res -> fetchAll();
    }
}