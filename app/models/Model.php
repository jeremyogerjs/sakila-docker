<?php

require_once('./database/DbConnection.php');

class Model {

    protected $table;
    protected $db;

    public function __construct(Database $db)
    {
        $this -> db = $db;
    }

    /**
     * 
     * 
     * @return array all elements
     * 
     */
    public function all(array $columns= ['*'])
    {
        $columns = implode(',',$columns);
        $sql = "SELECT $columns FROM ". $this -> table;

        $res = $this -> db -> getPDO() -> prepare($sql);

        $res ->execute();

        return $res -> fetchAll();
    }

    /**
     * 
     * @param string your SQL request
     * @param array params for sql request
     * @return object multiple elements
     * 
     */
    public function query(string $query, array $params = [],bool $single)
    {
        $sql = $query;
        $res = $this -> db -> getPDO() -> prepare($sql);

        $res ->execute($params);


        if($single)
        {
            return $res -> fetch();
        }
        else
        {
            return $res -> fetchAll();
        }
    }

    public function create(string $query, array $params)
    {
        $sql = $query;
        $res = $this -> db -> getPDO() -> prepare($sql);

        $res ->execute($params);

        return $res;
    }
}