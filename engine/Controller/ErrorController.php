<?php


namespace Engine\Controller;




class ErrorController
{
    public function page404()
    {
        $params = ['error_msg'=>'Error 404: Page not found!!!!'];
        \Engine\Core\View\View::render('error',$params);
    }
}