<?php


namespace Engine\Core\Router;


class UriDispatcher
{
    private $routes = [
        'GET'=>[],
        'POST'=>[]
    ];

    private $pattern = [
        'int'=>'[0-9]+',
        'str'=>'[a-zA-Z\.\-_%]+',
        'any'=>'[a-zA-Z0-9\.\-_%]+'
    ];

    public function register($pattern, $controller, $method)
    {
        $convert_pattern = $this->convertPattern($pattern);
        $this->routes[$method][$convert_pattern] = $controller;
    }

    private function convertPattern($pattern)
    {
        if(strpos('{')){
            preg_replace_callback('{(\w+):(\w+)}',[$this, 'patternReplace'], $pattern);
        }
        return $pattern;
    }

    private function patternReplace($matches)
    {
        return '(?<'.$matches[1].'>'.strtr($matches[2],$this->patterns).')';
    }

    public function dispatch($method, $uri)
    {
        $routes = $this->routes($method);
        foreach ($routes as $pattern=>$controller){
            if(preg_match($pattern, $uri, $params))
            {
                list($controller, $action) = explode(':',$controller);
                return new RouterDispatched($controller, $action, $params);
            }
        }

        return new RouterDispatched('ErrorController', 'page404');
    }

    private function routes($method)
    {
        return (isset($this->routes[$method]))?$this->routes[$method]:null;
    }



}