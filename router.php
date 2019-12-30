<?php

$router = new \app\Router;

$router->get('', 'MainController@index');
$router->get('home', 'MainController@home');