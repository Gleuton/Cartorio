<?php
/**
 * Author: gleuton.dutra
 */


namespace Cartorio\DataBase;

use PDO;

class Connection implements ConnectionInterface
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
     * @return PDO
     */
    public function connect(): PDO
    {
        $conn = "{$this->config->connection}:";
        $conn .= "host={$this->config->host};";
        $conn .= "dbname={$this->config->dbname};";

        return new PDO(
            $conn,
            $this->config->user,
            $this->config->password,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
        );
    }
}