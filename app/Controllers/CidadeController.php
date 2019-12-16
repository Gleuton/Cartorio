<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Controllers;

use App\Models\Cidade;

class CidadeController
{
    private $cidade;

    public function __construct()
    {
        $this->cidade = new Cidade();
    }

    public function index(): array
    {
        return $this->cidade->all();
    }

    public function byUf(string $uf)
    {
        return $this->cidade->all("WHERE estado_uf = '{$uf}'");
    }
}