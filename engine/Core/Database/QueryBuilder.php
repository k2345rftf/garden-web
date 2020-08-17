<?php


namespace Engine\Core\Database;
use Engine\Core\Database\Database;

class QueryBuilder
{

    private $db;
    private $sql = [];
    private $params = [];

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function select($column = '*', ... $columns )
    {
        $cols = $column;

        foreach (func_get_args() as $col){
            $cols .= ','.$col;
        }
        $this->sql['select'] = $cols;
        return $this;
    }

    /**
     * @param $table
     * @param mixed ...$tabels
     * @return $this
     */
    public function from($table, ... $tabels)
    {
        $tbls = $table;

        foreach (func_get_args() as $tbl){
            $tbls .= ','.$tbl;
        }
        $this->sql['from'] = $tbls;
        return $this;
    }
    public function where($param, $value, $operator = '=')
    {
        $this->sql['where'] ="{$param} {$operator} ?";
        $this->params[] = $value;
        return $this;
    }

    public function operator($name = 'AND')
    {
        $this->sql[]=$name;
    }


    private function isSelectQuery(){
        return isset($this->sql['select']);
    }

    private function getSql()
    {
        foreach ($this->sql as $key=>$value){

        }
    }

    public function getQuery()
    {
        if(!empty($this->params)){
            $query =  $this->db->query($this->getSql());
        }else{
            $query =  $this->db->query($this->getSql(), $this->params);
        }


        if ($this->isSelectQuery()){
            return $query->fetchAll();
        }
        return $query;
    }


}