<?php


namespace Engine\DI;
use Engine\Services\IService;

class DI
{
    private $container = [];

    public function set($name_service, IService $service){
        $this->container[$name_service] = $service;
        return $this;
    }
    public function get($name_service){
        return (isset($this->container[$name_service]))??$this->container[$name_service];
    }
}