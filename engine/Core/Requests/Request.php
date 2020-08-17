<?php


namespace Engine\Core\Request;


class Request
{

    public function get($name_param){
        return (isset($_GET[$name_param]))?$_GET[$name_param]:null;
    }

    public function post($name_param){
        return (isset($_POST[$name_param]))?$_POST[$name_param]:null;
    }

}