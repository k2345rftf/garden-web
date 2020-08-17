<?php


namespace Engine\Services;


class Service implements IService
{
    private $di;

    public function __construct($di)
    {
        $this->di = $di;
    }

    public function init()
    {
        $services = require_once 'config/dependencies.php';
        foreach ($services as $name_service=>$service){
            $this->di->set($name_service, new $service());
        }
    }
}