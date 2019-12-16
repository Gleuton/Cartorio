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

/**
 * contato
 */
$router->add('get', '/contato', 'ContatoController@index');
$router->add('get', '/contato/cartorio/(\d+)', 'ContatoController@contatoCartorio');
$router->add('get', '/contato/(\d+)','ContatoController@show');
$router->add('post', '/contato','ContatoController@storage');
$router->add('post', '/contato/(\d+)','ContatoController@update');

/**
* endereco
*/
$router->add('get', '/endereco', 'EnderecoController@index');
$router->add('get', '/endereco/cartorio/(\d+)', 'EnderecoController@enderecoCartorio');
$router->add('get', '/endereco/(\d+)','EnderecoController@show');
$router->add('post', '/endereco','EnderecoController@storage');
$router->add('post', '/endereco/(\d+)','EnderecoController@update');

/**
 * uf
 */
$router->add('get', '/uf', 'EstadoController@index');
/**
 * cidade
 */
$router->add('get', '/cidade/uf/(\w+)', 'CidadeController@byUf');

$router->add('post','/xml','ImportController@xml');