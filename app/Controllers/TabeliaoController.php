<?php
/**
 * Author: gleuton.pereira
 */

namespace App\Controllers;

use App\Models\Cartorio;
use App\Requests\Tabeliao\InsertRequest;

class TabeliaoController
{
    private $tabeliao;

    public function __construct()
    {
        $this->tabeliao = new Cartorio();
    }

    public function index(): ?string
    {
        return json_encode($this->tabeliao->all());
    }

    public function find(string $id)
    {
        return json_encode($this->tabeliao->find($id));
    }

    public function storage()
    {
        $dataForm = (new InsertRequest())->post();
        if (isset($dataForm['errors'])){
            return json_encode($dataForm['errors']);
        }

        $this->tabeliao->insert($dataForm);

        return true;
    }
}