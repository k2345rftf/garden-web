<?php


namespace Engine\Core\Database;

class Database
{

    private $config;
    private $db;

    public function __construct()
    {
        $this->config = require_once 'config/db_config.php';
    }

    public function connect()
    {
        $dsn = $this->config['type'].':dbname='.$this->config['name'].';host='.$this->config['host'].';charset='.$this->config['charset'];
        $login = $this->config['login'];
        $password = $this->config['password'];
        $options = $this->config['options'];

        $this->db = new PDO($dsn, $login,$password,$options);
    }

}