<?php
/**
 * Author: gleuton.pereira
 */

namespace App\Controllers;

use App\Models\Cartorio;

class CartorioController
{
    private $cartorio;

    public function __construct()
    {
        $this->cartorio = new Cartorio();
    }

    public function index(): ?string
    {
        return json_encode($this->cartorio->all());
    }
}