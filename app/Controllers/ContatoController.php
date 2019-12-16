<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Controllers;

use App\Models\Contato;
use App\Requests\Contato\Request;

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
        $dataForm = (new Request())->post();
        if (isset($dataForm['errors'])) {
            return $dataForm;
        }

        return $this->contato->insert($dataForm);
    }

    public function update(string $id)
    {
        $dataForm = (new Request())->post();
        if (isset($dataForm['errors'])){
            return $dataForm;
        }
        return $this->contato->update($id, $dataForm);
    }

    public function contatoCartorio($cnpj)
    {

        return $this->contato->findByCartorio($cnpj);
    }
}