<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Controllers;

use App\Models\Contato;
use App\Requests\Contato\UpdateRequest;
use App\Requests\Contato\InsertRequest;

class ContatoController
{
    private $contato;

    public function __construct()
    {
        $this->contato = new Contato();
    }

    public function index(): array
    {
        return $this->contato->all();
    }

    public function show(string $id)
    {
        return $this->contato->find($id);
    }

    /**
     * @return bool|mixed
     */
    public function storage()
    {
        $dataForm = (new InsertRequest())->post();
        if (isset($dataForm['errors'])) {
            return $dataForm['errors'];
        }

        return $this->contato->insert($dataForm);
    }

    public function update(string $id)
    {
        $dataForm = (new UpdateRequest())->post();
        if (isset($dataForm['errors'])){
            return $dataForm['errors'];
        }
        return $this->contato->update($id, $dataForm);
    }
}