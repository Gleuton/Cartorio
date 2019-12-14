<?php
/**
 * Author: gleuton.dutra
 */

/**
 * cartorio
 */
$router->add('get', '/cartorio', 'CartorioController@index');
$router->add('get', '/cartorio/(\d+)','CartorioController@show');
$router->add('post', '/cartorio','CartorioController@storage');
$router->add('post', '/cartorio/(\d+)','CartorioController@update');

/**
 * tabelião
 */

$router->add('get', '/tabeliao', 'TabeliaoController@index');
$router->add('get', '/tabeliao/(\d+)','TabeliaoController@show');
$router->add('post', '/tabeliao','TabeliaoController@storage');
$router->add('post', '/tabeliao/(\d+)','TabeliaoController@update');
