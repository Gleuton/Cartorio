<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Controllers;

use App\Models\Tabeliao;
use App\Requests\Tabeliao\Request;

class TabeliaoController
{
    private $tabeliao;

    public function __construct()
    {
        $this->tabeliao = new Tabeliao();
    }

    public function index(): array
    {
        return $this->tabeliao->all();
    }

    public function show(string $id)
    {
        return $this->tabeliao->find($id);
    }

    /**
     * @return bool|mixed
     */
    public function storage()
    {
        $dataForm = (new Request())->post();
        if (isset($dataForm['errors'])) {
            return $dataForm;
        }

        return $this->tabeliao->insert($dataForm);
    }

    public function update(string $id)
    {
        $dataForm = (new Request())->post();
        if (isset($dataForm['errors'])){
            return $dataForm;
        }
        return $this->tabeliao->update($id, $dataForm);
    }
}