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
     * @return array results
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
     * @param string $query SQL request
     * @param array $params for sql request
     * @param bool $single if you want multiple result or single
     * @return object|array result
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
}