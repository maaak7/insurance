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
        $param = null;

        if (preg_match('/\{([^"]+)}/', $args[0], $p)) {
            $args_cut_number = strlen($p[0]) + 1;
            $uri_cut_number = strlen($p[1]);
            $uri_arr = explode('/', $uri);
            $param = $uri_arr[count($uri_arr)-1];
            $args[0] = substr($args[0], 0, -abs($args_cut_number));
            $uri = substr($uri, 0, -abs($uri_cut_number));
        }

        if ($args[0] === $uri) {
            $callParams = explode('@', $args[1]);
            $className = '\\app\\Controllers\\'.$callParams[0];
            $methodName = $callParams[1];

            $my_obj = new $className();
            $my_obj->$methodName($param);
        }
    }
}