<?php
/**
 * Author: gleuton.pereira
 */

namespace Cartorio;


class Response
{
    public function __invoke($action, $params)
    {
        header('Content-Type: application/json');
        if (is_string($action)) {
            $action = explode('@', $action);
            $class = '\\App\Controllers\\' . $action[0];
            $action[0] = new $class;
        }
        $response = call_user_func_array($action, $params);
        if (is_array($response) || is_object($response)) {
            $response = json_encode($response);
        }
        echo $response;
    }
}