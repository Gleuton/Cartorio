<?php


namespace Cartorio;


use Cartorio\Exceptions\HttpException;

class View
{
    /**
     * @param string $file
     * @param string $path
     *
     * @return string
     * @throws HttpException
     */
    public static function render(string $file, $path = __DIR__ . '/../views/')
    {
        header("Content-Type: text/html");
        $htmlPath = $path . $file . '.html';
        if (file_exists($htmlPath)) {
            return file_get_contents($htmlPath);
        }
        throw new HttpException('page not found', 404);
    }
}