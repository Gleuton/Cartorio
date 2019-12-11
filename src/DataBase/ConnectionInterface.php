<?php
/**
 * Author: gleuton.pereira
 */

namespace Cartorio\DataBase;

use PDO;

interface ConnectionInterface
{
    public function connect(): PDO;
}