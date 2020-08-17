<?php


namespace Engine\Core\View;


class View
{
    public static function render($template, $params = []){
        $tmpPath = ROOT_DIR.'/content/pages/'.$template.'.php';
        extract($params);
        try{
            ob_start();
            ob_implicit_flush(0);

            require $tmpPath;

            echo ob_get_flush();
        }catch (\Exception $e){
            ob_get_clean();
            die($e->getMessage());
        }
    }
}