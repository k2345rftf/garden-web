<?php
return array(
    'type'=>'mysql',
    'name'=>'test_g_base',
    'host'=>'localhost',
    'login'=>'root',
    'password'=>'',
    'options'=>array(
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false
    )
);