<?php
/**
 * Author: gleuton.dutra
 */

$router->add('get', '/', 'CartorioController@index');
$router->add('get', '/(\d+)','CartorioController@find');
$router->add('post', '/lavai','CartorioController@storage');