<?php

namespace Engine\Core\Router;
class RouterDispatched
{
    private $controller;
    private $action;
    private $params;

    public function __construct($controller, $action, $params=null)
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

}