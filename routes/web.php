<?php
/**
 * Author: gleuton.dutra
 */

use Cartorio\View;

$router->add('get', '/', function () {
    return View::render('layout');
});

$router->add('get','/listCartorio', function () {
    return View::render('cartorio/list');
});

$router->add('get','/modal', function () {
    return View::render('modal');
});

$router->add('get','/dtlEndereco', function () {
    return View::render('endereco/show');
});

$router->add('get','/dtlContato', function () {
    return View::render('contato/show');
});

$router->add('get','/cartorio/formCad', function () {
    return View::render('cartorio/formCad');
});