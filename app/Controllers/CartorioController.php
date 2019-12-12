<?php
/**
 * Author: gleuton.pereira
 */

namespace App\Controllers;

use App\Models\Cartorio;
use App\Requests\Cartorio\InsertRequest;

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

    public function find(string $id)
    {
        return json_encode($this->cartorio->find($id));
    }

    public function storage()
    {
        $dataForm = (new InsertRequest())->post();
        if (isset($dataForm['errors'])){
            return json_encode($dataForm['errors']);
        }

    }
}