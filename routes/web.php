<?php
/**
 * Author: gleuton.dutra
 */

use Cartorio\View;
/**
 * index
 */
$router->add('get', '/', function () {
    return View::render('layouts');
});
