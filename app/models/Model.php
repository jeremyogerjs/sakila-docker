<?php

require_once('./database/DbConnection.php');

class Model {

    protected $table;
    protected $db;

    public function __construct()
    {
        $this -> db = new Database(DB_NAME,DB_HOST,DB_USER,DB_PWD);
    }

    public function all()
    {
        $sql = "SELECT * FROM ". $this -> table;

        $res = $this -> db -> getPDO() -> prepare($sql);

        $res ->execute();

        return $data = $res -> fetchAll();
    }

    public function query(string $query, array $params)
    {
        $sql = $query;
        $res = $this -> db -> getPDO() -> prepare($sql);

        $res ->execute($params);

        return $data = $res -> fetchAll();
    }
}