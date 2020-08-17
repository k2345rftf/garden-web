<?php


namespace Engine;
use Engine\DI\DI;

abstract class Controller
{
    private $di;
    private $request;
    private $router;
    private $config;

    public function __construct(DI $di)
    {
        $this->di = $di;
        $this->router = $this->di->get('router');
        $this->config = $this->di->get('config');
        $this->request = $this->di->get('request');
    }
}