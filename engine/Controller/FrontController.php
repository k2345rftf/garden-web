<?php

use Engine\Controller;
use Engine\DI\DI;

class FrontController extends Controller
{
    public function __construct(DI $di)
    {
        parent::__construct($di,);
    }

    public function run()
    {

    }
}