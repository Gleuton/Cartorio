<?php
/**
 * Author: gleuton.dutra
 */


namespace Cartorio;

use mysqli;

class Connection
{
    private $config;

    public function __construct(string $path)
    {
        $file = file_get_contents($path);
        $this->config = json_decode(
            $file
        );
    }

    /**
     * @return mysqli
     */
    public function connect(): mysqli
    {
        return new mysqli(
            $this->config->host,
            $this->config->user,
            $this->config->password,
            $this->config->dbname
        );
    }
}