<?php


namespace Engine\Core\Model;


abstract class Model
{
    private $di;
    private $db;
    private $config;

    public function __construct(\Engine\DI\DI $di)
    {

        $this->di = $di;
        $this->db = $this->di->get('database');
        $this->config = $this->di->get('config');
    }

}