<?php

function __autoload($className)
{
    $className = preg_replace("/\\\\/", "/", $className);
    include_once ($className . '.php');
}

include_once 'router.php';