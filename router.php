<?php

$router = new \app\Router;

$router->get('', 'MainController@index');
$router->get('home', 'MainController@home');
$router->get('insurances/get', 'InsuranceController@get');
$router->get('insurances/get_info/{id}', 'InsuranceController@getInfo');
$router->post('insurances/create', 'InsuranceController@create');
