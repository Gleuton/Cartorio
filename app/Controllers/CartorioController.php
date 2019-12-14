<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Controllers;

use App\Models\Cartorio;
use App\Requests\Cartorio\InsertRequest;
use App\Requests\Cartorio\UpdateRequest;

class CartorioController
{
    private $cartorio;

    public function __construct()
    {
        $this->cartorio = new Cartorio();
    }

    public function index(): array
    {
        return $this->cartorio->all();
    }

    public function show(string $id)
    {
        return $this->cartorio->find($id);
    }

    public function storage()
    {
        $dataForm = (new InsertRequest())->post();
        if (isset($dataForm['errors'])){
            return $dataForm['errors'];
        }

        return $this->cartorio->insert($dataForm);
    }

    public function update(string $id)
    {
        $dataForm = (new UpdateRequest())->post();
        if (isset($dataForm['errors'])){
            return $dataForm['errors'];
        }
        return $this->cartorio->update($id, $dataForm);
    }
}