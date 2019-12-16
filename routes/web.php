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

$router->add('get','/tabeliao/formCad', function () {
    return View::render('tabeliao/formCad');
});

$router->add('get','/contato/formCad', function () {
    return View::render('contato/formCad');
});

$router->add('get','/endereco/formCad', function () {
    return View::render('endereco/formCad');
});