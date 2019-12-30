<?php

namespace app;

class Router
{
    private $allowedMethods = ['get', 'post'];

    public function __call($name, $args)
    {
        if (!in_array($name, $this->allowedMethods)) {
            return 'Method not allowed';
        }

        $uri = trim($_SERVER['REQUEST_URI'], '/');

        if ($args[0] === $uri) {
            $callParams = explode('@', $args[1]);
            $className = '\\app\\Controllers\\'.$callParams[0];
            $methodName = $callParams[1];

            $my_obj = new $className();
            $my_obj->$methodName();
        }
    }
}