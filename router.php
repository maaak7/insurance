<?php

$router = new \app\Router;

$router->get('my', 'MainController@index');
$router->get('my/home', 'MainController@home');