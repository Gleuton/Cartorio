<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Controllers;

use App\Models\Estado;

class EstadoController
{
    private $cartorio;

    public function __construct()
    {
        $this->cartorio = new Estado();
    }

    public function index(): array
    {
        return $this->cartorio->all();
    }
}