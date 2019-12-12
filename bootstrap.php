<?php
/**
 * Author: gleuton.dutra
 */


use Cartorio\Router;
use Cartorio\Exceptions\HttpException;
use Cartorio\Response;

require_once __DIR__ . '/vendor/autoload.php';
$router = new Router();
require_once __DIR__ . '/routes/web.php';

try {
    $result = $router->run();
    $app = new Response();
    $app($result['action'], $result['params']);
} catch (HttpException $e) {
    echo json_encode(
        [
            'error' => $e->getMessage(),
            'code'  => $e->getCode()
        ]
    );
}