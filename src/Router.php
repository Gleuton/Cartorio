<?php
/**
 * Author: gleuton.pereira
 */

namespace Cartorio;

use Cartorio\Exceptions\HttpException;

class Router
{
    private $routes = [];

    public function add(string $method, string $pattern, $callback)
    {
        $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
        $this->routes[strtolower($method)][$pattern] = $callback;
    }

    /**
     * @return array
     * @throws HttpException
     */
    public function run(): array
    {
        $method = $this->getMethod();
        if (!empty($this->routes[$method])) {
            return $this->forEachRoute($method);
        }
        throw new HttpException('Page not found', 404);
    }

    private function getMethod(): string
    {
        $method = filter_input(
            INPUT_SERVER,
            'REQUEST_METHOD',
            FILTER_SANITIZE_STRING
        );
        return strtolower($method);
    }

    private function getCurrentUrl(): string
    {
        $url = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING)
            ?? '/';
        if (strlen($url) > 1) {
            $url = rtrim($url, '/');
        }
        return $url;
    }

    /**
     * @param $method
     *
     * @return array
     * @throws HttpException
     */
    private function forEachRoute($method)
    {
        $url = $this->getCurrentUrl();
        foreach ($this->routes[$method] as $route => $action) {
            if (preg_match($route, $url, $params)) {
                unset($params[0]);
                return compact('action', 'params');
            }
        }
        throw new HttpException('Page not found', 404);
    }
}