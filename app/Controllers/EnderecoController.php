<?php
/**
 * Author: gleuton.dutra
 */

namespace App\Controllers;

use App\Models\Endereco;
use App\Requests\Endereco\Request;

class EnderecoController
{
    private $endereco;

    public function __construct()
    {
        $this->endereco = new Endereco();
    }

    public function index(): array
    {
        return $this->endereco->all();
    }

    public function show(string $id)
    {
        return $this->endereco->find($id);
    }

    public function enderecoCartorio(string $cnpj)
    {
        return $this->endereco->findByCartorio($cnpj);
    }

    public function storage()
    {
        $dataForm = (new Request())->post();
        if (isset($dataForm['errors'])){
            return $dataForm['errors'];
        }

        return $this->endereco->insert($dataForm);
    }

    public function update(string $id)
    {
        $dataForm = (new Request())->post();
        if (isset($dataForm['errors'])){
            return $dataForm['errors'];
        }
        return $this->endereco->update($id, $dataForm);
    }
}