<?php
namespace Engine\Core\Router;

class Router
{
    private $routes;
    private $dispatcher;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function dispatch($method,$uri)
    {
        if(empty($this->dispatcher)){
            $this->dispatcher = new UriDispatcher();
            foreach ($this->routes as $route){
                $this->dispatcher->register($route['pattern'], $route['controller'],$route['method']);
            }
        }

        return $this->dispatcher->dispatch($method,$uri);
    }

    public function addRoute($key,$pattern,$controller,$method='GET'){
        $this->routes[$key]=[
            'pattern'=>$pattern,
            'controller'=>$controller,
            'method'=>$method
        ];
    }

}